<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password | Vizhinjam Port</title>
  <link href="<?php echo base_url();?>login/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root { --primary:#0d6efd; --muted:#6b7280; }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      background: url('<?php echo base_url(); ?>user/images/ship3.jpg') center center / cover no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      color: #0f172a;
    }

    .login-container {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 0;
      border-radius: 20px;
      width: 100%;
      max-width: 420px;
      text-align: center;
      box-shadow: 0 18px 48px rgba(6,36,67,0.18);
      animation: fadeIn 1s ease-in-out;
    }

    .card-accent { 
      position:absolute; 
      top:0; 
      left:0; 
      right:0; 
      height:6px; 
      border-top-left-radius:20px; 
      border-top-right-radius:20px; 
      background: linear-gradient(90deg,#0d6efd,#6610f2); 
    }

    .login-inner { 
      padding: 32px 28px; 
      text-align: center; 
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
      width: 100%;
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px 12px 40px;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
      background: #f8fafc;
      color: #0f172a;
      transition: 0.3s;
      box-sizing: border-box;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #64748b;
    }

    .btn {
      width: 100%;
      background: linear-gradient(90deg, #0d6efd, #6610f2);
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
      box-shadow: 0 8px 24px rgba(13,110,253,0.25);
    }

    .btn:hover {
      background: linear-gradient(90deg, #0b5ed7, #520dc2);
      transform: scale(1.03);
    }

    .back-to-login {
      margin-top: 20px;
    }

    .back-to-login a {
      color: #0d6efd;
      text-decoration: none;
    }

    .back-to-login a:hover {
      text-decoration: underline;
    }

    .alert {
      padding: 12px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .alert-success {
      background-color: #d1fae5;
      color: #065f46;
      border: 1px solid #a7f3d0;
    }

    .alert-danger {
      background-color: #fee2e2;
      color: #b91c1c;
      border: 1px solid #fecaca;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="card-accent"></div>
    <div class="login-inner">
      <h2>Reset Password</h2>
      
      <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>

      <?php echo form_open('Welcome/process_forgot_password'); ?>
        <div class="input-group">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Enter your email address" required>
        </div>
        <button type="submit" class="btn">Reset Password</button>
      <?php echo form_close(); ?>

      <div class="back-to-login">
        <a href="<?php echo base_url('Welcome/login'); ?>">Back to Login</a>
      </div>
    </div>
  </div>
</body>
</html>
