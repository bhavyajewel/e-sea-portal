<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contractor Registration</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/fontawesome-all.css" />
  <style>
    :root { --primary:#0d6efd; --ink:#0b1d36; --muted:#6b7280; --bg:#f7f9fc; }
    body { background:var(--bg); color:#17202a; }
    .page { min-height: 100vh; display:flex; align-items:center; justify-content:center; padding: 32px 12px; background: linear-gradient(120deg, rgba(6,36,67,.75), rgba(13,110,253,.45)), url('<?php echo base_url(); ?>user/images/ship4.jpg') center center / cover no-repeat; }
    .card { position:relative; border:1px solid #e6ebf1; border-radius:20px; box-shadow: 0 24px 60px rgba(6,36,67,.18); background: rgba(255,255,255,.92); backdrop-filter: blur(12px); }
    .card-accent { position:absolute; top:0; left:0; right:0; height:6px; border-top-left-radius:20px; border-top-right-radius:20px; background: linear-gradient(90deg,#0d6efd,#6610f2); }
    .styled-card { padding: 28px 24px; }
    .brand { color:var(--ink); font-weight:700; }
    label { font-weight:600; color:#334155; }
    .help { font-size:.85rem; color:#dc3545; }
    body.dark { background:#0b1220; color:#e5e7eb; }
    body.dark .page { background: linear-gradient(120deg, rgba(6,36,67,.85), rgba(13,110,253,.55)), url('<?php echo base_url(); ?>user/images/ship4.jpg') center center / cover no-repeat; }
    body.dark .card { background:rgba(15,23,42,.78); border-color:#0b1220; box-shadow: 0 18px 48px rgba(0,0,0,.35); }
    body.dark label { color:#e5e7eb; }
    .theme-toggle { position: fixed; top:16px; right:16px; z-index:1000; }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script>
    var app = angular.module('myApp', []);
    app.controller('cntrl', function($scope) {});
  </script>
</head>
<body>
  <button id="themeToggle" class="btn btn-sm btn-outline-secondary theme-toggle" type="button"><i class="fas fa-moon"></i></button>
  <div class="page" ng-controller="cntrl">
    <div class="container" style="max-width: 820px;">
      <div class="card styled-card p-md-5">
        <div class="card-accent"></div>
        <div class="mb-4">
          <h3 class="brand mb-1"><i class="fas fa-handshake mr-2"></i>Contractor Registration</h3>
          <p class="text-muted mb-0">Register as a contractor to manage jobs.</p>
        </div>
        <form name="SaveForm" action="<?php echo base_url();?>Welcome/contractregister" method="post" novalidate>
          <input type="hidden" name="hide" class="form-control" value="h">

          <div class="form-group">
            <label for="name">Contract Name</label>
            <input id="name" type="text" name="name" maxlength="60" ng-pattern="/^[a-zA-Z. ]*[a-zA-Z]{1,60}$/" ng-model="name" class="form-control" placeholder="Enter full name" required>
            <div class="help" ng-show="SaveForm.name.$dirty && SaveForm.name.$invalid">Please enter a valid name.</div>
          </div>

          <div class="form-group">
            <label for="regid">Contract Reg</label>
            <textarea id="regid" name="regid" class="form-control" rows="3" placeholder="Registration details"></textarea>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="age">Age</label>
              <textarea id="age" name="age" class="form-control" rows="1" placeholder="Age"></textarea>
            </div>
            <div class="form-group col-md-6">
              <label>Gender</label>
              <div class="d-flex align-items-center" style="gap:16px;">
                <label class="mb-0"><input type="radio" name="gender" value="male" required> Male</label>
                <label class="mb-0"><input type="radio" name="gender" value="female" required> Female</label>
                <label class="mb-0"><input type="radio" name="gender" value="other" required> Other</label>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact">Contact Number</label>
              <input id="contact" type="text" name="contact" ng-pattern="/^[6-9][0-9]{9}$/" ng-model="contact_number" class="form-control" placeholder="10-digit mobile" required>
              <div class="help" ng-show="SaveForm.contact_number.$dirty && SaveForm.contact_number.$invalid">Please enter a valid mobile number.</div>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input id="email" type="email" name="email" ng-pattern="/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,30}$/" ng-model="email" class="form-control" placeholder="you@example.com" required>
              <div class="help" ng-show="SaveForm.email.$dirty && SaveForm.email.$invalid">Please enter a valid email.</div>
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="Create a password" required>
          </div>

          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" ng-disabled="SaveForm.$invalid">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    (function(){
      var toggle = document.getElementById('themeToggle');
      try { var saved = localStorage.getItem('theme'); if(saved==='dark'){ document.body.classList.add('dark'); if(toggle) toggle.innerHTML = '<i class="fas fa-sun"></i>'; } } catch(e) {}
      if(toggle){
        toggle.addEventListener('click', function(){
          var isDark = document.body.classList.toggle('dark');
          this.innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
          try { localStorage.setItem('theme', isDark ? 'dark' : 'light'); } catch(e) {}
        });
      }
    })();
  </script>
</body>
</html>