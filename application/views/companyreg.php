<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Company Registration</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/fontawesome-all.css" />
  <style>
    :root { --primary:#0d6efd; --ink:#0b1d36; --muted:#6b7280; --bg:#f7f9fc; }
    body { background:var(--bg); color:#17202a; }
    .page { min-height: 100vh; display:flex; align-items:center; justify-content:center; padding: 32px 12px; background: linear-gradient(120deg, rgba(6,36,67,.75), rgba(13,110,253,.45)), url('<?php echo base_url(); ?>user/images/ship1.jpg') center center / cover no-repeat; }
    .card { position:relative; border:1px solid #e6ebf1; border-radius:20px; box-shadow: 0 24px 60px rgba(6,36,67,.18); background: rgba(255,255,255,.92); backdrop-filter: blur(12px); }
    .card-accent { position:absolute; top:0; left:0; right:0; height:6px; border-top-left-radius:20px; border-top-right-radius:20px; background: linear-gradient(90deg,#0d6efd,#6610f2); }
    .styled-card { padding: 28px 24px; }
    .brand { color:var(--ink); font-weight:700; }
    label { font-weight:600; color:#334155; }
    .help { font-size:.85rem; color:#dc3545; }
    /* Dark mode (optional if index toggles body.dark globally) */
    body.dark { background:#0b1220; color:#e5e7eb; }
    body.dark .page { background: linear-gradient(120deg, rgba(6,36,67,.85), rgba(13,110,253,.55)), url('<?php echo base_url(); ?>user/images/ship1.jpg') center center / cover no-repeat; }
    body.dark .card { background:rgba(15,23,42,.78); border-color:#0b1220; box-shadow: 0 18px 48px rgba(0,0,0,.35); }
    body.dark label { color:#e5e7eb; }
    /* theme toggle */
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
          <h3 class="brand mb-1"><i class="fas fa-building mr-2"></i>Company Registration</h3>
          <p class="text-muted mb-0">Create your company account to start shipping.</p>
        </div>
        <form name="SaveForm" action="<?php echo base_url();?>Welcome/companyregister" method="post" novalidate>
          <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" maxlength="60" ng-pattern="/^[a-zA-Z. ]*[a-zA-Z]{1,60}$/" ng-model="name" class="form-control" placeholder="Enter full name" required>
            <div class="help" ng-show="SaveForm.name.$dirty && SaveForm.name.$invalid">Please enter a valid name.</div>
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Company address"></textarea>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="state">State</label>
              <select id="state" name="state" class="form-control">
                <option>ANDHRA PRADESH</option>
                <option>ARUNACHAL PRADESH</option>
                <option>BIHAR</option>
                <option>CHATTISGARH</option>
                <option>GOA</option>
                <option>GUJARAT</option>
                <option>HARYANA</option>
                <option>JHARKHAND</option>
                <option>KARNATAKA</option>
                <option>KERALA</option>
                <option>MADHYA PRADESH</option>
                <option>PUNJAB</option>
                <option>TAMILNADU</option>
                <option>WEST BENGAL</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="district">District</label>
              <select id="district" name="district" class="form-control">
                <option>Thiruvananthapuram</option>
                <option>Kollam</option>
                <option>Pathanamthitta</option>
                <option>Alappuzha</option>
                <option>Kottayam</option>
                <option>Idukki</option>
                <option>Ernakulam</option>
                <option>Trissufr</option>
                <option>Palakad</option>
                <option>Malapuram</option>
                <option>Kozhikode</option>
                <option>Wayanad</option>
                <option>Kannur</option>
                <option>Kasargode</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contact_number">Contact Number</label>
              <input id="contact_number" type="text" name="contact_number" ng-pattern="/^[6-9][0-9]{9}$/" ng-model="contact_number" class="form-control" placeholder="10-digit mobile" required>
              <div class="help" ng-show="SaveForm.contact_number.$dirty && SaveForm.contact_number.$invalid">Please enter a valid mobile number.</div>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input id="email" type="email" name="email" ng-pattern="/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,30}$/" ng-model="email" class="form-control" placeholder="name@company.com" required>
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