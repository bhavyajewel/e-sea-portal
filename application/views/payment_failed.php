<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed - Sea Port Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a5f7a;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7ff;
            color: var(--dark);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .error-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        
        .error-icon {
            font-size: 60px;
            color: var(--danger);
            margin-bottom: 20px;
        }
        
        h1 {
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .error-message {
            background: #fff5f5;
            border-left: 4px solid var(--danger);
            padding: 15px;
            margin: 25px 0;
            text-align: left;
            color: #721c24;
        }
        
        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 10px 5px;
        }
        
        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn:hover {
            background: #0d3b5a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 95, 122, 0.3);
        }
        
        .btn-outline:hover {
            background: #f8f9fa;
            color: #0d3b5a;
        }
        
        .btn i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <h1>Payment Failed</h1>
        
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <p><strong>Error:</strong> <?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php else: ?>
            <p>We're sorry, but there was an error processing your payment.</p>
        <?php endif; ?>
        
        <p>Please try again or contact our support team if the problem persists.</p>
        
        <div style="margin-top: 30px;">
            <a href="<?php echo base_url('payment'); ?>" class="btn">
                <i class="fas fa-credit-card"></i> Try Again
            </a>
            <a href="<?php echo base_url('contact'); ?>" class="btn btn-outline">
                <i class="fas fa-headset"></i> Contact Support
            </a>
        </div>
        
        <div style="margin-top: 30px; font-size: 14px; color: #6c757d;">
            <p>Reference: TXN-<?php echo strtoupper(substr(md5(uniqid()), 0, 8)); ?></p>
        </div>
    </div>
</body>
</html>
