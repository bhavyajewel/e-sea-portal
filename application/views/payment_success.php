<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Sea Port Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a5f7a;
            --success: #28a745;
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
        
        .success-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        
        .success-icon {
            font-size: 60px;
            color: var(--success);
            margin-bottom: 20px;
        }
        
        h1 {
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .transaction-details {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: left;
        }
        
        .transaction-details p {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
        }
        
        .transaction-details span:last-child {
            font-weight: 600;
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
            margin-top: 20px;
        }
        
        .btn:hover {
            background: #0d3b5a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 95, 122, 0.3);
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your transaction has been completed successfully.</p>
        
        <div class="transaction-details">
            <p>
                <span>Transaction ID:</span>
                <span><?php echo htmlspecialchars($transaction_id ?? 'N/A'); ?></span>
            </p>
            <p>
                <span>Amount Paid:</span>
                <span>₹<?php echo number_format($amount ?? 0, 2); ?></span>
            </p>
            <p>
                <span>Date:</span>
                <span><?php echo date('Y-m-d H:i:s'); ?></span>
            </p>
            <p>
                <span>Status:</span>
                <span style="color: var(--success);">Completed</span>
            </p>
        </div>
        
        <p>An email receipt has been sent to your registered email address.</p>
        
        <a href="<?php echo base_url(); ?>" class="btn">
            <i class="fas fa-home"></i> Return to Home
        </a>
    </div>
</body>
</html>
