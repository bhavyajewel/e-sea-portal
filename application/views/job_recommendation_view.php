<!DOCTYPE html>
<html>
<head>
    <title>Job Recommendations</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f9f9f9; }
        .container { max-width: 900px; margin: 0 auto; }
        .card { background: #fff; padding: 20px; margin: 10px 0; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
        .title { font-size: 20px; font-weight: bold; margin-bottom: 6px; }
        .muted { color: #666; font-size: 14px; }
        .score { font-weight: bold; color: #0a7; }
        .header { display: flex; align-items: center; justify-content: space-between; }
        a.btn { display: inline-block; padding: 8px 12px; background: #0a7; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; }
        a.btn:hover { background: #086; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Recommended Jobs for <?php echo isset($user['name']) ? htmlspecialchars($user['name']) : 'User'; ?><?php if (!empty($user['qualification'])) { echo ' ('.htmlspecialchars($user['qualification']).')'; } ?></h2>
        <a class="btn" href="<?php echo base_url(); ?>Welcome/jobviews">Back to Jobs</a>
    </div>

    <?php if (empty($recommended_jobs)) : ?>
        <div class="card">
            <div class="title">No recommendations yet</div>
            <p class="muted">We couldn't find matching jobs right now. Please update your profile skills, qualification, domain, and try again.</p>
        </div>
    <?php else: ?>
        <?php foreach ($recommended_jobs as $job): ?>
            <div class="card">
                <div class="title"><?php echo htmlspecialchars($job['title']); ?></div>
                <p class="muted">
                    <strong>Domain:</strong> <?php echo htmlspecialchars($job['domain']); ?>
                    <?php if (!empty($job['location'])): ?> | <strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?><?php endif; ?>
                </p>
                <p><strong>Required Skills:</strong> <?php echo htmlspecialchars($job['skills']); ?></p>
                <p><strong>Similarity Score:</strong> <span class="score"><?php echo round($job['similarity'] * 100, 2); ?>%</span></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>
