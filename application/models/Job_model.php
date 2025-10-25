<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

    // Get all jobs
    public function get_all_jobs() {
        // Use existing 'job' table in this project
        return $this->db->get('job')->result_array();
    }

    // Get user details
    public function get_user($user_id) {
        // In this project, public profiles are stored in 'publicreg' with foreign key loginid
        // Join login to fetch name/email conveniently
        $this->db->select('publicreg.*, login.email, login.id as login_id');
        $this->db->from('publicreg');
        $this->db->join('login', 'login.id = publicreg.loginid', 'inner');
        $this->db->where('publicreg.loginid', $user_id);
        $row = $this->db->get()->row_array();
        if ($row) {
            // Normalize expected keys used by recommender
            if (!isset($row['name']) && isset($row['email'])) {
                $row['name'] = $row['email'];
            }
        }
        return $row;
    }

    // Calculate skill similarity between two comma-separated skill strings (Jaccard index)
    private function skill_similarity($skills1, $skills2) {
        $skills1 = array_filter(array_map('trim', explode(',', strtolower((string)$skills1))));
        $skills2 = array_filter(array_map('trim', explode(',', strtolower((string)$skills2))));

        if (empty($skills1) && empty($skills2)) {
            return 0;
        }

        $intersection = count(array_intersect($skills1, $skills2));
        $union = count(array_unique(array_merge($skills1, $skills2)));

        return $union > 0 ? ($intersection / $union) : 0;
    }

    // Calculate TF-IDF weight for skills (Term Frequency-Inverse Document Frequency)
    private function calculate_skill_tfidf($user_skills, $job_skills, $all_jobs_skills) {
        $user_skills = array_map('strtolower', array_map('trim', explode(',', $user_skills)));
        $job_skills = array_map('strtolower', array_map('trim', explode(',', $job_skills)));
        
        if (empty($user_skills) || empty($job_skills)) {
            return 0;
        }
        
        // Calculate TF (Term Frequency) - how often a skill appears in job requirements
        $tf = count(array_intersect($user_skills, $job_skills)) / count($job_skills);
        
        // Calculate IDF (Inverse Document Frequency) - how rare a skill is across all jobs
        $idf = 0;
        foreach ($user_skills as $skill) {
            $doc_count = 0;
            foreach ($all_jobs_skills as $job_skills_str) {
                $job_skills_arr = array_map('strtolower', array_map('trim', explode(',', $job_skills_str)));
                if (in_array($skill, $job_skills_arr)) {
                    $doc_count++;
                }
            }
            $idf += log((count($all_jobs_skills) / max(1, $doc_count)) + 1);
        }
        
        return $tf * $idf;
    }

    // Calculate experience level similarity (0-1)
    private function experience_similarity($user_exp, $job_exp) {
        if ($user_exp >= $job_exp) {
            // User has more than required experience - full score
            return 1.0;
        } else {
            // Partial score based on how close user's experience is to required
            return max(0.1, $user_exp / max(1, $job_exp));
        }
    }

    // KNN job recommendation with enhanced similarity metrics
    public function recommend_jobs($user_id, $k = 5) {
        $user = $this->get_user($user_id);
        if (!$user) {
            return [];
        }

        $jobs = $this->get_all_jobs();
        $distances = [];
        
        // Pre-fetch all job skills for TF-IDF calculation
        $all_jobs_skills = array_map(function($job) {
            return isset($job['required_skills']) ? $job['required_skills'] : '';
        }, $jobs);

        foreach ($jobs as $job) {
            // 1. Skill Matching with TF-IDF (35% weight)
            $skill_sim = $this->calculate_skill_tfidf(
                $user['skills'] ?? '', 
                $job['required_skills'] ?? '',
                $all_jobs_skills
            );
            
            // 2. Experience Matching (25% weight)
            $user_exp = isset($user['experience']) ? (int)$user['experience'] : 0;
            $job_exp = isset($job['experience_required']) ? (int)$job['experience_required'] : 0;
            $exp_sim = $this->experience_similarity($user_exp, $job_exp);
            
            // 3. Qualification Matching (20% weight)
            $qual_sim = (isset($user['qualification'], $job['qualification']) && 
                         strtolower($user['qualification']) === strtolower($job['qualification'])) ? 1 : 0;
            
            // 4. Domain/Category Matching (15% weight)
            $domain_sim = 0;
            if (isset($user['domain'], $job['jobcategory'])) {
                similar_text(strtolower($user['domain']), strtolower($job['jobcategory']), $domain_sim);
                $domain_sim = $domain_sim / 100; // Convert to 0-1 range
            }
            
            // 5. Location Matching (5% weight)
            $location_sim = 0;
            if (!empty($user['city']) && !empty($job['location'])) {
                similar_text(strtolower($user['city']), strtolower($job['location']), $city_sim);
                if ($city_sim > 80) { // If city names are >80% similar
                    $location_sim = 1;
                } elseif (!empty($user['district']) && stripos($job['location'], $user['district']) !== false) {
                    $location_sim = 0.5;
                }
            }

            // Calculate weighted similarity score
            $similarity = (0.35 * $skill_sim) + 
                         (0.25 * $exp_sim) + 
                         (0.20 * $qual_sim) + 
                         (0.15 * $domain_sim) + 
                         (0.05 * $location_sim);
            
            // Add job details to results
            $distances[] = [
                'job_id' => $job['jobid'] ?? $job['id'] ?? null,
                'title' => $job['jobname'] ?? $job['title'] ?? 'Job',
                'company' => $job['company_name'] ?? 'Company',
                'similarity' => min(1.0, max(0.0, $similarity)), // Ensure 0-1 range
                'skills' => $job['required_skills'] ?? '',
                'domain' => $job['jobcategory'] ?? $job['domain'] ?? '',
                'location' => $job['location'] ?? 'Not specified',
                'experience_required' => $job_exp,
                'match_details' => [
                    'skills' => round($skill_sim * 100, 1) . '%',
                    'experience' => round($exp_sim * 100, 1) . '%',
                    'qualification' => $qual_sim * 100 . '%',
                    'domain' => round($domain_sim * 100, 1) . '%',
                    'location' => $location_sim * 100 . '%'
                ]
            ];
        }

        // Sort by similarity score (descending)
        usort($distances, function($a, $b) {
            // First sort by similarity
            if ($a['similarity'] != $b['similarity']) {
                return $b['similarity'] <=> $a['similarity'];
            }
            // If similarity is equal, prefer jobs requiring less experience
            return ($a['experience_required'] ?? 0) <=> ($b['experience_required'] ?? 0);
        });

        // Filter out low-similarity jobs (below 20% match)
        $filtered_distances = array_filter($distances, function($job) {
            return $job['similarity'] >= 0.2;
        });

        // Return top K recommendations with match details
        return array_slice($filtered_distances, 0, $k);
    }
}
