<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobRecommendation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Job_model');
        $this->load->helper('url');
    }

    // Optionally pass user id as segment: /JobRecommendation/index/5
    public function index($user_id = null) {
        // Prefer logged-in user id
        if ($this->session && $this->session->userdata('userid')) {
            $user_id = $this->session->userdata('userid');
        }
        if (empty($user_id)) {
            $user_id = 1; // fallback for direct access in dev
        }

        $data['user'] = $this->Job_model->get_user($user_id);
        $data['recommended_jobs'] = $this->Job_model->recommend_jobs($user_id, 3);
        $data['k'] = 3;
        $this->load->view('job_recommendation_view', $data);
    }
}
