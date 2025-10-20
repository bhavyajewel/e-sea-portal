<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Vizhinjam Port</title>
  <link href="<?php echo base_url();?>login/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Firebase for Google Sign-In -->
  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/12.2.1/firebase-app.js";
    import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/12.2.1/firebase-auth.js";

    const firebaseConfig = {
      apiKey: "AIzaSyA3LXnOp51Qlmgtz-8XXYds6yTNglzQIZ0",
      authDomain: "e-sea-portal2025.firebaseapp.com",
      projectId: "e-sea-portal2025",
      storageBucket: "e-sea-portal2025.firebasestorage.app",
      messagingSenderId: "788447107498",
      appId: "1:788447107498:web:aa47816be52f7e936ff3d3",
      measurementId: "G-RCPYXZPLY6"
    };

    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);
    const provider = new GoogleAuthProvider();

    async function signInWithGoogle() {
      try {
        const result = await signInWithPopup(auth, provider);
        const user = result.user;
        const idToken = await user.getIdToken();

        const response = await fetch('<?php echo base_url("Welcome/google_login"); ?>', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ idToken })
        });

        const data = await response.json();
        if (data.success) {
          window.location.href = data.redirectUrl || '<?php echo base_url("Welcome/companyhome"); ?>';
        } else {
          alert('Google sign-in failed: ' + (data.message || 'Unknown error'));
        }
      } catch (error) {
        console.error('Error during Google sign-in:', error);
        alert('Google sign-in error: ' + error.message);
      }
    }

    window.signInWithGoogle = signInWithGoogle;
  </script>

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

    .input-group input {
      width: 100%;
      padding: 12px 15px 12px 40px;
      border: none;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
      background: #f8fafc;
      color: #0f172a;
      transition: 0.3s;
      box-sizing: border-box;
    }

    .login-container {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 0; /* moved to inner wrapper */
      border-radius: 20px;
      width: 100%;
      max-width: 420px;
      text-align: center;
      box-shadow: 0 18px 48px rgba(6,36,67,0.18);
      animation: fadeIn 1s ease-in-out;
    }
    .card-accent { position:absolute; top:0; left:0; right:0; height:6px; border-top-left-radius:20px; border-top-right-radius:20px; background: linear-gradient(90deg,#0d6efd,#6610f2); }
    .login-inner { padding: 32px 28px; text-align: left; }
    @media (max-width: 480px) {
      .login-container { max-width: 92%; }
    }

    .login-container h2 {
      font-size: 28px;
      color: #0f172a;
      margin-bottom: 25px;
      font-weight: 600;
      text-align: center;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #64748b;
    }

    .input-group input::placeholder {
      color: #94a3b8;
    }

    .input-group input:focus {
      background: #eef2f7;
      box-shadow: 0 0 0 4px rgba(13,110,253,0.15);
    }

    .login-btn {
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

    .login-btn:hover {
      background: linear-gradient(90deg, #0b5ed7, #520dc2);
      transform: scale(1.03);
    }

    .forgot-password {
      margin: 15px 0;
    }

    .forgot-password a {
      font-size: 14px;
      text-decoration: none;
      color: #0f172a;
      transition: 0.3s;
    }

    .forgot-password a:hover {
      text-decoration: underline;
      color: #0b5ed7;
    }

    /* Center Google Login button */
    .google-login {
      margin-top: 15px;
      display: flex;
      justify-content: center;
    }

    .google-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      border-radius: 10px;
      padding: 12px 20px;
      font-size: 14px;
      font-weight: bold;
      background: #fff;
      color: #444;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      transition: 0.3s;
      cursor: pointer;
    }

    .google-btn:hover {
      background: #f5f5f5;
      transform: scale(1.02);
    }

    .google-btn img {
      width: 20px;
      margin-right: 10px;
    }

    .signup-text {
      margin-top: 18px;
      font-size: 14px;
      color: #0f172a;
    }

    .signup-text a {
      color: #0b5ed7;
      font-weight: bold;
      text-decoration: none;
    }

    .signup-text a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Dark Mode */
    body.dark { color:#e5e7eb; }
    body.dark .login-container { background: rgba(15,23,42,0.85); }
    body.dark .login-container h2 { color:#e5e7eb; }
    body.dark .input-group input { background:#0f172a; color:#e5e7eb; }
    body.dark .input-group input::placeholder { color:#9fb3c8; }
    body.dark .input-group i { color:#93a4b8; }
    body.dark .forgot-password a, body.dark .signup-text { color:#c9d5e3; }
    body.dark .signup-text a { color:#93c5fd; }
    .theme-toggle { position: fixed; top:16px; right:16px; z-index:1000; }
  </style>
</head>
<body>
  <button id="themeToggle" class="btn btn-sm btn-outline-secondary theme-toggle" type="button"><i class="fa fa-moon"></i></button>

  <div class="login-container">
    <div class="card-accent"></div>
    <div class="login-inner">
    <h2>Welcome to Vizhinjam Portal</h2>
    <form action="<?php echo base_url();?>/Welcome/login_program" method="post">
      <div class="input-group">
        <i class="fa fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="input-group">
        <i class="fa fa-key"></i>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="forgot-password">
      <a href="<?php echo base_url('Welcome/forgotpassword'); ?>">Forgot password?</a>
    </div>

  <div class="google-login">
    <button class="google-btn" type="button" onclick="window.signInWithGoogle()">
      <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo">
      Sign in with Google
    </button>
  </div>

    <div class="signup-text">
      Don’t have an account? <a href="<?php echo base_url('Welcome/userreg'); ?>">Sign up</a>
    </div>
  </div>

  <script>
    (function(){
      var toggle = document.getElementById('themeToggle');
      try { var saved = localStorage.getItem('theme'); if(saved==='dark'){ document.body.classList.add('dark'); if(toggle) toggle.innerHTML = '<i class="fa fa-sun"></i>'; } } catch(e) {}
      if(toggle){
        toggle.addEventListener('click', function(){
          var isDark = document.body.classList.toggle('dark');
          this.innerHTML = isDark ? '<i class="fa fa-sun"></i>' : '<i class="fa fa-moon"></i>';
          try { localStorage.setItem('theme', isDark ? 'dark' : 'light'); } catch(e) {}
        });
      }
    })();
  </script>
</body>
</html>
