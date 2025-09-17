<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Vizhinjam Port</title>
  <link href="<?php echo base_url();?>login/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Firebase App (the core Firebase SDK) -->
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

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);
    const provider = new GoogleAuthProvider();

    async function signInWithGoogle() {
      try {
        const result = await signInWithPopup(auth, provider);
        const user = result.user;
        const idToken = await user.getIdToken();

        // Send ID token to server for verification and login
        const response = await fetch('<?php echo base_url("Welcome/google_login"); ?>', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ idToken })
        });

        const data = await response.json();
        if (data.success) {
          // Redirect or reload page on successful login
          window.location.href = data.redirectUrl || '<?php echo base_url("Welcome/companyhome"); ?>';
        } else {
          alert('Google sign-in failed: ' + (data.message || 'Unknown error'));
        }
      } catch (error) {
        console.error('Error during Google sign-in:', error);
        alert('Google sign-in error: ' + error.message);
      }
    }

    // Make function globally available
    window.signInWithGoogle = signInWithGoogle;
  </script>

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      background: linear-gradient(135deg, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    /* Floating gradient circles in background */
    .background-shapes::before,
    .background-shapes::after {
      content: "";
      position: absolute;
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      filter: blur(100px);
      z-index: 0;
    }

    .background-shapes::before {
      top: -100px;
      left: -100px;
    }

    .background-shapes::after {
      bottom: -100px;
      right: -100px;
    }

    .input-group input {
  width: 100%;
  padding: 12px 15px 12px 40px; /* enough space for icon */
  border: none;
  border-radius: 10px;
  outline: none;
  font-size: 14px;
  background: rgba(255, 255, 255, 0.2);
  color: #fff;
  transition: 0.3s;
  box-sizing: border-box; /* prevents overflow */
}


    .login-container {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 40px 35px;
      border-radius: 20px;
      width: 100%;
      max-width: 400px;
      text-align: center;
      box-shadow: 0 8px 40px rgba(0,0,0,0.2);
      animation: fadeIn 1s ease-in-out;
    }

    .login-container h2 {
      font-size: 28px;
      color: #fff;
      margin-bottom: 25px;
      font-weight: 600;
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
      color: #888;
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px 12px 45px;
      border: none;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      transition: 0.3s;
    }

    .input-group input::placeholder {
      color: #ddd;
    }

    .input-group input:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 8px rgba(255,255,255,0.4);
    }

    .login-btn {
      width: 100%;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
      box-shadow: 0 4px 15px rgba(118,75,162,0.4);
    }

    .login-btn:hover {
      background: linear-gradient(135deg, #5a67d8, #6b46c1);
      transform: scale(1.03);
    }

    .forgot-password {
      margin: 15px 0;
    }

    .forgot-password a {
      font-size: 14px;
      text-decoration: none;
      color: #f1f1f1;
      transition: 0.3s;
    }

    .forgot-password a:hover {
      text-decoration: underline;
      color: #fff;
    }

    .google-login {
      margin-top: 15px;
    }

    .google-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      border-radius: 10px;
      padding: 12px;
      text-decoration: none;
      font-size: 14px;
      font-weight: bold;
      background: #fff;
      color: #444;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      transition: 0.3s;
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
      color: #eee;
    }

    .signup-text a {
      color: #fff;
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
  </style>
</head>
<body>

  <div class="background-shapes"></div>

  <div class="login-container">
    <h2>Welcome to Vizhinjam Portal </h2>
	<!-- <p>“Vizhinjam International Seaport is Kerala’s deepwater port, built to handle global trade with world-class facilities and connectivity.”</p> -->
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
      <a href="#">Forgot password?</a>
    </div>

    <div class="google-login">
      <button class="google-btn" onclick="signInWithGoogle()">
        <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo">
        Sign in with Google
      </button>
    </div>

    <div class="signup-text">
      Don’t have an account? <a href="#">Sign up</a>
    </div>
  </div>

</body>
</html>
