<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment | Sea Port Portal</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/anchor-icon.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a5f7a;
            --primary-dark: #0d3b5a;
            --secondary: #28a0a0;
            --accent: #ff7e5f;
            --success: #4bb543;
            --danger: #f44336;
            --light: #f0f8ff;
            --dark: #0a2e36;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 8px;
            --box-shadow: 0 5px 15px rgba(10, 46, 54, 0.1);
            --transition: all 0.3s ease;
            --wave-pattern: url("data:image/svg+xml,%3Csvg width='100' height='20' viewBox='0 0 100 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 10C20 0 40 20 60 10S100 20 100 10L100 20L0 20Z' fill='%231a5f7a' fill-opacity='0.05'/%3E%3C/svg%3E");
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--wave-pattern);
            background-size: 100% 200px;
            background-repeat: repeat-x;
            opacity: 0.3;
            z-index: -1;
            animation: wave 20s linear infinite;
        }

        @keyframes wave {
            0% { background-position: 0 0; }
            100% { background-position: 100% 0; }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .payment-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            max-width: 1000px;
            margin: 2rem auto;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .payment-header h1 {
            color: var(--primary);
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .payment-header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--accent);
            border-radius: 3px;
        }

        .payment-header p {
            color: var(--gray);
            font-size: 1rem;
        }

        .payment-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .payment-tabs {
            display: flex;
            border-bottom: 1px solid var(--light-gray);
            background: white;
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
        }

        .tab-btn {
            flex: 1;
            padding: 1.2rem;
            text-align: center;
            background: none;
            border: none;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            outline: none;
        }

        .tab-btn i {
            margin-right: 8px;
            font-size: 1.2rem;
            vertical-align: middle;
        }

        .tab-btn.active {
            color: var(--primary);
            font-weight: 600;
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 3px 3px 0 0;
        }

        .tab-content {
            display: none;
            padding: 2rem;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            outline: none;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-col {
            flex: 1;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 4px 15px rgba(26, 95, 122, 0.2);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--accent);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .btn:hover::before {
            width: 100%;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: rgba(67, 97, 238, 0.05);
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .payment-method {
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            padding: 1.5rem 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .payment-method::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: transparent;
            transition: all 0.3s ease;
        }

        .payment-method:hover::before {
            background: var(--accent);
        }

        .payment-method:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .payment-method.active {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }

        .payment-method i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .payment-method span {
            display: block;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .order-summary {
            background: #f8f9fa;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .order-summary h3 {
            margin-bottom: 1rem;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .summary-item.total {
            font-weight: 600;
            font-size: 1.1rem;
            padding-top: 0.75rem;
            border-top: 1px solid #ddd;
            margin-top: 0.75rem;
        }

        .secure-payment {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            background: rgba(26, 95, 122, 0.05);
            padding: 0.75rem;
            border-radius: var(--border-radius);
            border: 1px dashed rgba(26, 95, 122, 0.2);
        }

        .secure-payment i {
            color: var(--success);
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 1rem;
            }
            
            .payment-tabs {
                flex-direction: column;
            }
            
            .tab-btn {
                padding: 1rem 0.5rem;
                font-size: 0.85rem;
            }
            
            .tab-btn i {
                display: block;
                margin: 0 auto 0.3rem;
                font-size: 1.5rem;
            }
            
            .payment-methods {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Custom checkbox */
        .custom-checkbox {
            display: flex;
            align-items: center;
            margin: 1rem 0;
            cursor: pointer;
        }

        .custom-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            position: relative;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
            transition: var(--transition);
        }

        .custom-checkbox input:checked ~ .checkmark {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 7px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        /* Card preview */
        .card-preview {
            background: linear-gradient(135deg, #1a5f7a, #0d3b5a);
            color: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(10, 46, 54, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform-style: preserve-3d;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-preview:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(10, 46, 54, 0.2);
        }

        .card-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
            transition: all 0.5s ease;
        }

        .card-preview:hover::before {
            transform: scale(1.5);
            opacity: 0.2;
        }

        .card-type {
            text-align: right;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .card-number {
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            letter-spacing: 1px;
            margin: 1.5rem 0;
            word-spacing: 8px;
            position: relative;
            z-index: 1;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .card-name {
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-expiry {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="payment-container">
            <div class="payment-header">
                <h1><i class="fas fa-anchor" style="margin-right: 10px; color: var(--accent);"></i> Secure Payment</h1>
                <p>Complete your payment securely with our 256-bit SSL encryption</p>
                <div class="secure-payment" style="margin-top: 1rem; max-width: 500px; margin-left: auto; margin-right: auto;">
                    <i class="fas fa-shield-alt" style="color: var(--success); margin-right: 8px;"></i>
                    <span>Your transaction is protected with bank-level security</span>
                </div>
            </div>

            <div class="payment-card">
                <!-- Payment Tabs -->
                <div class="payment-tabs">
                    <button class="tab-btn active" data-tab="credit-card">
                        <i class="fas fa-credit-card"></i>
                        <span>Card</span>
                    </button>
                    <button class="tab-btn" data-tab="net-banking">
                        <i class="fas fa-university"></i>
                        <span>Net Banking</span>
                    </button>
                    <button class="tab-btn" data-tab="paypal">
                        <i class="fab fa-cc-paypal"></i>
                        <span>PayPal</span>
                    </button>
                </div>

                <!-- Credit Card Tab -->
                <div class="tab-content active" id="credit-card">
                    <form action="<?php echo base_url();?>Welcome/process_payment" method="post" id="payment-form">
                        <input type="hidden" name="loginid" value="<?php echo $loginid;?>">
                        
                        <!-- SVM Card Element will be inserted here -->
                        <div id="svm-element"></div>
                        
                        <div class="form-group">
                            <label class="form-label" for="payment-amount">Payment Amount (₹) <span class="text-danger">*</span></label>
                            <div class="input-with-icon">
                                <i class="fas fa-rupee-sign"></i>
                                <input type="number" class="form-control" id="payment-amount" name="amount" 
                                       value="<?php echo is_numeric($amount) ? number_format($amount, 2, '.', '') : '0.00'; ?>" 
                                       min="1" step="0.01" required 
                                       oninput="formatAmount(this)">
                            </div>
                        </div>
                        
                        <!-- Card Preview -->
                        <div class="card-preview">
                            <div class="card-type">
                                <i class="fab fa-cc-visa fa-2x"></i>
                            </div>
                            <div class="card-number" id="card-number-preview">•••• •••• •••• ••••</div>
                            <div class="card-details">
                                <div class="card-name" id="card-name-preview">YOUR NAME</div>
                                <div class="card-expiry" id="card-expiry-preview">MM/YY</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="card-holder">Cardholder Name <span class="text-danger">*</span></label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" class="form-control" id="card-holder" name="noc" placeholder="John Smith" required 
                                       pattern="[A-Za-z\s]{3,}" title="Please enter a valid name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="card-number">Card Number <span class="text-danger">*</span></label>
                            <div class="input-with-icon">
                                <i class="far fa-credit-card"></i>
                                <input type="text" id="card-number" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" oninput="formatCardNumber(this)" required>
                            </div>
                            <span id="card-number-error" class="error-message"></span>
                            <div class="card-icons" style="margin-top: 10px; display: flex; gap: 10px;">
                                <i class="fab fa-cc-visa card-type-icon" data-type="visa" style="font-size: 1.8rem; color: #1a1f71; opacity: 0.3; transition: all 0.3s ease;"></i>
                                <i class="fab fa-cc-mastercard card-type-icon" data-type="mastercard" style="font-size: 1.8rem; color: #eb001b; opacity: 0.3; transition: all 0.3s ease;"></i>
                                <i class="fab fa-cc-amex card-type-icon" data-type="amex" style="font-size: 1.8rem; color: #006fcf; opacity: 0.3; transition: all 0.3s ease;"></i>
                                <i class="fab fa-cc-discover card-type-icon" data-type="discover" style="font-size: 1.8rem; color: #ff6600; opacity: 0.3; transition: all 0.3s ease;"></i>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label" for="expiry-date">Expiry Date <span class="text-danger">*</span></label>
                                <div class="input-with-icon">
                                    <i class="far fa-calendar-alt"></i>
                                    <input type="text" id="expiry-date" name="expiry_date" class="form-control" placeholder="MM/YY" maxlength="5" oninput="formatExpiryDate(this)" required>
                                </div>
                                <small class="text-muted">MM/YY format</small>
                            </div>
                            <div class="form-col">
                                <label class="form-label" for="cvv">CVV <span class="text-danger">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="text" id="cvv" name="cvv" class="form-control" inputmode="numeric" pattern="[0-9]{3,4}" placeholder="•••" title="3 or 4 digit security code" required>
                                    <i class="fas fa-question-circle cvv-tooltip" title="3 or 4 digit code on the back of your card"></i>
                                </div>
                                <small class="text-muted">3 or 4 digits</small>
                            </div>
                        </div>

                        <button type="submit" class="btn" style="margin-top: 1.5rem;">
                            <i class="fas fa-lock"></i> Pay Securely ₹<?php echo number_format($amount, 2); ?>
                        </button>
                    </form>
                </div>

                <!-- Net Banking Tab -->
                <div class="tab-content" id="net-banking">
                    <h3>Select Your Bank</h3>
                    <p>You will be redirected to your bank's secure payment page</p>
                    
                    <div class="payment-methods">
                        <div class="payment-method">
                            <i class="fas fa-university"></i>
                            <span>SBI</span>
                        </div>
                        <div class="payment-method">
                            <i class="fas fa-university"></i>
                            <span>HDFC</span>
                        </div>
                        <div class="payment-method">
                            <i class="fas fa-university"></i>
                            <span>ICICI</span>
                        </div>
                        <div class="payment-method">
                            <i class="fas fa-university"></i>
                            <span>Axis</span>
                        </div>
                        <div class="payment-method">
                            <i class="fas fa-university"></i>
                            <span>Kotak</span>
                        </div>
                        <div class="payment-method">
                            <i class="fas fa-university"></i>
                            <span>Other</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Select Bank</label>
                        <select class="form-control">
                            <option value="">-- Select Bank --</option>
                            <option value="SBI">State Bank of India</option>
                            <option value="HDFC">HDFC Bank</option>
                            <option value="ICICI">ICICI Bank</option>
                            <option value="AXIS">Axis Bank</option>
                            <option value="KOTAK">Kotak Mahindra Bank</option>
                            <option value="OTHER">Other Banks</option>
                        </select>
                    </div>

                    <button type="button" class="btn">Proceed to Net Banking</button>

                    <div class="secure-payment">
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure 256-bit SSL encryption</span>
                    </div>
                </div>

                <!-- PayPal Tab -->
                <div class="tab-content" id="paypal">
                    <div style="text-align: center; padding: 2rem 0;">
                        <i class="fab fa-cc-paypal" style="font-size: 4rem; color: #003087; margin-bottom: 1rem;"></i>
                        <h3>Pay with PayPal</h3>
                        <p>You will be redirected to PayPal to complete your purchase securely.</p>
                        
                        <div style="max-width: 300px; margin: 2rem auto;">
                            <div class="order-summary">
                                <h3>Order Summary</h3>
                                <div class="summary-item">
                                    <span>Amount:</span>
                                    <span>₹<?php echo number_format($amount, 2); ?></span>
                                </div>
                                <div class="summary-item">
                                    <span>Fee:</span>
                                    <span>₹0.00</span>
                                </div>
                                <div class="summary-item total">
                                    <span>Total:</span>
                                    <span>₹<?php echo number_format($amount, 2); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn" style="background: #003087; max-width: 300px; margin: 0 auto;">
                            <i class="fab fa-paypal"></i> Checkout with PayPal
                        </button>
                        
                        <div class="secure-payment">
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure payment powered by PayPal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .input-with-icon {
            position: relative;
        }
        .input-with-icon i:first-child {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            z-index: 2;
        }
        .input-with-icon .form-control {
            padding-left: 45px;
        }
        .cvv-tooltip {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            cursor: help;
            z-index: 2;
        }
        .card-type-icon.active {
            opacity: 1 !important;
            transform: scale(1.1);
        }
        .text-danger {
            color: var(--danger) !important;
        }
        .text-primary {
            color: var(--primary) !important;
        }
        .text-muted {
            color: var(--gray) !important;
            font-size: 0.8rem;
            display: block;
            margin-top: 5px;
        }
    </style>

    <script>
        // Format amount input
        function formatAmount(input) {
            // Remove any non-digit characters except decimal point
            let value = input.value.replace(/[^\d.]/g, '');
            
            // Ensure only one decimal point
            const decimalCount = (value.match(/\./g) || []).length;
            if (decimalCount > 1) {
                value = value.substring(0, value.lastIndexOf('.'));
            }
            
            // Format to 2 decimal places
            if (value.includes('.')) {
                const parts = value.split('.');
                if (parts[1].length > 2) {
                    value = parts[0] + '.' + parts[1].substring(0, 2);
                }
            }
            
            // Update the input value
            input.value = value;
            
            // Update the payment button text
            const payButton = document.querySelector('button[type="submit"]');
            if (payButton && value) {
                const amount = parseFloat(value).toFixed(2);
                payButton.innerHTML = `<i class="fas fa-lock"></i> Pay Securely ₹${amount}`;
            }
        }
        
        // Format card number with spaces
        function formatCardNumber(input) {
            // Remove all non-digit characters
            let value = input.value.replace(/\D/g, '');
            
            // Add space after every 4 digits
            value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
            
            // Update the input value
            input.value = value;
            
            // Validate card number
            validateCardNumber(value);
        }
        
        // Format expiry date as MM/YY
        function formatExpiryDate(input) {
            let value = input.value;
            
            // Remove all non-digit characters
            value = value.replace(/\D/g, '');
            
            // Add slash after 2 digits if not already present
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            
            // Update the input value
            input.value = value;
            
            // Validate expiry date
            validateExpiryDate(value);
        }
        
        // Validate card number using Luhn algorithm
        function validateCardNumber(cardNumber) {
            const cardNumberError = document.getElementById('card-number-error');
            const cleanedCardNumber = cardNumber.replace(/\s+/g, '');
            
            if (!luhnCheck(cleanedCardNumber)) {
                cardNumberError.textContent = 'Please enter a valid card number';
                return false;
            } else {
                cardNumberError.textContent = '';
                return true;
            }
        }
        
        // Validate expiry date
        function validateExpiryDate(expiryDate) {
            const expiryError = document.getElementById('expiry-error');
            const [month, year] = expiryDate.split('/');
            
            if (!month || !year || month.length !== 2 || year.length !== 2) {
                expiryError.textContent = 'Invalid expiry date format (MM/YY)';
            
            // Validate amount
            if (isNaN(amount) || amount <= 0) {
                alert('Please enter a valid payment amount');
                return false;
            }
            
            // Validate card holder name
            if (!/^[a-zA-Z\s]{3,}$/.test(cardHolder)) {
                alert('Please enter a valid cardholder name');
                return false;
            }
            
            // Let SVM handle the card validation
            return new Promise((resolve) => {
                // The actual validation is handled by SVM's real-time validation
                resolve(true);
            });
            
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            
            // Simulate API call (replace with actual payment processing)
            return true;
        }
        
        // Luhn algorithm for card validation
        function luhnCheck(cardNumber) {
            let sum = 0;
            let shouldDouble = false;
            
            for (let i = cardNumber.length - 1; i >= 0; i--) {
                let digit = parseInt(cardNumber.charAt(i));
                
                if (shouldDouble) {
                    digit *= 2;
                    if (digit > 9) {
                        digit = (digit % 10) + 1;
                    }
                }
                
                sum += digit;
                shouldDouble = !shouldDouble;
            }
            
            return sum % 10 === 0;
        }
        
        // Validate expiry date
        function validateExpiryDate(expiryDate) {
            if (!expiryDate || !/^(0[1-9]|1[0-2])\s*\/\s*([0-9]{2})$/.test(expiryDate)) {
                return false;
            }
            
            const [_, month, year] = expiryDate.match(/(\d{1,2})\s*\/\s*(\d{2})/);
            const expiry = new Date(2000 + parseInt(year), parseInt(month), 0);
            const currentDate = new Date();
            
            // Set to last day of the month for comparison
            expiry.setMonth(expiry.getMonth() + 1);
            expiry.setDate(0);
            
            return expiry > currentDate;
        }

        // Tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding content
                    button.classList.add('active');
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Card number formatting
            const cardNumberInput = document.getElementById('card-number');
            const cardNumberPreview = document.getElementById('card-number-preview');
            const cardTypeInput = document.getElementById('card-type-input');
            const cardTypeText = document.getElementById('card-type-text');
            
            cardNumberInput.addEventListener('input', function(e) {
                // Remove all non-digits
                let value = e.target.value.replace(/\D/g, '');
                
                // Add space after every 4 digits
                value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
                
                // Update input value
                e.target.value = value.trim();
                
                // Update preview
                cardNumberPreview.textContent = value || '•••• •••• •••• ••••';
                
                // Update card type
                const cardType = getCardType(value);
                updateCardTypeIcon(cardType);
                
                // Update hidden input for server-side validation
                cardTypeInput.value = cardType;
                
                // Show card type text
                if (cardType !== 'unknown' && value.length > 0) {
                    cardTypeText.textContent = cardType.charAt(0).toUpperCase() + cardType.slice(1) + ' Card';
                } else {
                    cardTypeText.textContent = '';
                }
            });

            // Cardholder name formatting
            const cardNameInput = document.getElementById('card-holder');
            const cardNamePreview = document.getElementById('card-name-preview');
            
            cardNameInput.addEventListener('input', function(e) {
                cardNamePreview.textContent = e.target.value.toUpperCase() || 'YOUR NAME';
            });

            // Expiry date formatting
            const expiryDateInput = document.getElementById('expiry-date');
            const expiryDatePreview = document.getElementById('card-expiry-preview');
            
            expiryDateInput.addEventListener('input', function(e) {
                let value = e.target.value;
                
                // Add slash after 2 digits
                if (value.length === 2 && !value.includes('/')) {
                    value += '/';
                    e.target.value = value;
                }
                
                // Update preview
                expiryDatePreview.textContent = value || 'MM/YY';
            });

            // CVV hover effect
            const cvvInput = document.getElementById('cvv');
            
            cvvInput.addEventListener('focus', function() {
                document.querySelector('.card-preview').style.transform = 'rotateY(180deg)';
            });
            
            cvvInput.addEventListener('blur', function() {
                document.querySelector('.card-preview').style.transform = 'rotateY(0)';
            });

            // Helper function to detect card type
            function getCardType(cardNumber) {
                const cardNumberStr = cardNumber.replace(/\s+/g, '');
                
                // Visa
                if (/^4/.test(cardNumberStr)) {
                    return 'visa';
                }
                // Mastercard
                else if (/^5[1-5]/.test(cardNumberStr)) {
                    return 'mastercard';
                }
                // American Express
                else if (/^3[47]/.test(cardNumberStr)) {
                    return 'amex';
                }
                // Discover
                else if (/^(6011|65|64[4-9]|622)/.test(cardNumberStr)) {
                    return 'discover';
                }
                
                return 'unknown';
            }
            
            // Update card type icon
            function updateCardTypeIcon(cardType) {
                // Reset all icons
                document.querySelectorAll('.card-type-icon').forEach(icon => {
                    icon.classList.remove('active');
                });
                
                // Activate the matching card type
                const activeIcon = document.querySelector(`.card-type-icon[data-type="${cardType}"]`);
                if (activeIcon) {
                    activeIcon.classList.add('active');
                }
                
                // Update card preview icon
                const cardTypeIcons = {
                    'visa': 'fa-cc-visa',
                    'mastercard': 'fa-cc-mastercard',
                    'amex': 'fa-cc-amex',
                    'discover': 'fa-cc-discover',
                    'default': 'fa-credit-card'
                };
                
                const cardTypeElement = document.querySelector('.card-type i');
                if (cardTypeElement) {
                    cardTypeElement.className = 'fab ' + (cardTypeIcons[cardType] || cardTypeIcons['default']) + ' fa-2x';
                }
            }

            // Form submission
            const paymentForm = document.getElementById('payment-form');
            if (paymentForm) {
                paymentForm.addEventListener('submit', function(e) {
                    // Add your form validation here
                    // e.preventDefault(); // Uncomment to prevent form submission for demo
                });
            }
        });
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SVM Integration -->
    <script src="https://js.safevault.com/v1/"></script>
    <style>
        #svm-element {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px 15px;
            margin: 10px 0;
            background: white;
            height: 44px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        #svm-element.svm-complete {
            border-color: #28a745;
        }
        #svm-element.svm-error {
            border-color: #dc3545;
        }
    </style>
    <!-- Custom Scripts -->
    <script>
        // Any additional scripts can be added here
    </script>
</body>
</html>