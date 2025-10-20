<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>e SEA PORTAL</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/style.css">
    <style>
        :root { --primary:#0d6efd; --primary-2:#6610f2; --dark:#0b1d36; --ink:#0b1d36; --muted:#576174; --bg:#f7f9fc; --card:#ffffff; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans"; background:var(--bg); color:#17202a; line-height:1.6; }
        .navbar { box-shadow: 0 2px 12px rgba(0,0,0,.06); }
        .navbar-brand { font-weight:700; color:var(--ink); }
        .navbar .nav-link { color:#334155; }
        .navbar .nav-link:hover { color:var(--primary); }
        .hero { position: relative; display:flex; align-items:center; min-height:100vh; color:#fff; background: url('<?php echo base_url(); ?>user/images/ship5.jpg') center center / cover no-repeat; }
        .hero h1 { font-weight:800; letter-spacing:.3px; }
        .hero .lead { color:#f3f6fa; max-width:800px; }
        .hero .text-wrap { background: rgba(0,0,0,.35); border-radius:16px; padding: 24px; box-shadow: 0 10px 24px rgba(0,0,0,.15); }
        body.dark .hero .text-wrap { background: rgba(0,0,0,.5); }
        .btn-gradient { background-image: linear-gradient(90deg, var(--primary), var(--primary-2)); color:#fff; border:0; box-shadow: 0 8px 24px rgba(13,110,253,.25); }
        .btn-gradient:hover { filter: brightness(.95); color:#fff; }
        .feature-icon { width:56px; height:56px; display:inline-flex; align-items:center; justify-content:center; border-radius:14px; background:#0d6efd15; color:var(--primary); font-size:22px; transition: transform .2s ease; }
        .feature-card { border: 1px solid #edf1f5; background:rgba(255,255,255,.75); backdrop-filter: blur(8px); border-radius:16px; transition: transform .2s ease, box-shadow .2s ease; }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 16px 42px rgba(6,36,67,.12); }
        .stat { text-align:center; }
        .stat h3 { font-weight:800; color:var(--ink); }
        .stat p { color:var(--muted); margin:0; }
        .showcase-card { border-radius:16px; overflow:hidden; position:relative; box-shadow: 0 10px 30px rgba(6,36,67,.1); }
        .showcase-card img { width:100%; height:260px; object-fit:cover; }
        .showcase-card .overlay { position:absolute; inset:0; background: linear-gradient(to top, rgba(11,29,54,.7), transparent 60%); color:#fff; display:flex; align-items:flex-end; padding:16px; }
        .pill { display:inline-block; padding:4px 10px; border-radius:999px; font-size:.8rem; background:#0d6efd12; color:var(--primary); }
        .footer { background:#0b1d36; color:#c9d5e3; }
        .footer a { color:#c9d5e3; }
        /* futuristic top bar */
        .topbar { position: sticky; top:0; z-index: 100; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); background: rgba(255,255,255,.65); padding: 10px 0; border-bottom:1px solid #e6ebf1; }
        .topwrap { max-width: 1200px; margin: 0 auto; padding: 0 16px; display:flex; align-items:center; gap:18px; }
        .brand { display:flex; align-items:center; gap:10px; font-weight:800; letter-spacing:.3px; color:#0b1d36; }
        .brand i { width:32px; height:32px; display:inline-flex; align-items:center; justify-content:center; border-radius:10px; background: linear-gradient(135deg,#0d6efd,#6610f2); color:#fff; }
        .link { color:#0b1d36; font-weight:600; text-decoration:none; padding:8px 10px; border-radius:10px; transition: all .15s ease; }
        .link:hover { color:#0d6efd; background:#f1f5fb; }
        .spacer { flex: 1 1 auto; }
        .btn-cta { display:inline-block; padding:8px 14px; border-radius:999px; background: linear-gradient(90deg,#0d6efd,#6610f2); color:#fff !important; box-shadow:0 10px 24px rgba(13,110,253,.25); text-decoration:none; font-weight:700; }
        .btn-cta:hover { filter:brightness(.95); }
        .theme-toggle { margin-left:10px; border:1px solid #e6ebf1; background:transparent; color:#0b1d36; border-radius:999px; padding:6px 10px; }
        .theme-toggle i { pointer-events:none; }
        body.dark .theme-toggle { border-color:#1f2a3b; color:#e5e7eb; }
        /* dropdown */
        .dd { position: relative; display:inline-block; }
        .dd-toggle { cursor: pointer; user-select:none; }
        .dd-menu { position:absolute; top:100%; left:0; min-width:300px; background: rgba(255,255,255,.97); border:1px solid #e6ebf1; border-radius:14px; box-shadow:0 24px 60px rgba(6,36,67,.15); padding:10px; display:none; }
        /* open on hover and keyboard focus */
        .dd:hover .dd-menu, .dd:focus-within .dd-menu { display:block; }
        .dd-header { padding: 8px 10px 10px 10px; border-bottom:1px solid #eef2f7; margin-bottom:8px; }
        .dd-title { font-weight:700; color:#0b1d36; }
        .dd-subtitle { font-size:.85rem; color:#64748b; }
        .dd-item { display:flex; align-items:flex-start; gap:10px; padding:10px 12px; border-radius:10px; color:#0b1d36; text-decoration:none; }
        .dd-item:hover { background:#f1f5fb; color:#0d6efd; }
        .dd-item i { width:28px; height:28px; border-radius:8px; display:inline-flex; align-items:center; justify-content:center; background:#0d6efd12; color:#0d6efd; margin-top:2px; }
        .dd-item .label { font-weight:600; }
        .dd-item .note { font-size:.85rem; color:#64748b; margin-top:2px; }
        body.dark .topbar { background: rgba(15,23,42,.6); }
        body.dark .topbar a { color:#e5e7eb; }
        body.dark .dd-menu { background: rgba(15,23,42,.95); border-color:#0b1220; }
        body.dark .dd-title { color:#e5e7eb; }
        body.dark .dd-subtitle { color:#94a3b8; }
        body.dark .dd-item { color:#e5e7eb; }
        body.dark .dd-item:hover { background:#1f2a3b; color:#93c5fd; }
        body.dark .dd-item i { background:#1e293b; color:#93c5fd; }
        /* Dark mode */
        body.dark { --bg:#0b1220; --card:#0f172a; --ink:#e5e7eb; --muted:#94a3b8; color:#e5e7eb; }
        body.dark .navbar { background:#0f172a !important; }
        body.dark .navbar .nav-link, body.dark .navbar-brand { color:#e5e7eb !important; }
        body.dark .navbar .nav-link:hover { color:#93c5fd !important; }
        body.dark .card, body.dark .feature-card { background:rgba(15,23,42,.65); border-color:#0b1220; }
        body.dark .stat h3 { color:#e5e7eb; }
        body.dark .text-muted { color:#9fb3c8 !important; }
        /* Dropdown styling */
        .navbar .dropdown:hover .dropdown-menu { display:block; margin-top:0; }
        .dropdown-menu-custom { min-width: 320px; border: 1px solid #edf1f5; background: rgba(255,255,255,.9); backdrop-filter: blur(10px); border-radius: 16px; box-shadow: 0 20px 48px rgba(6,36,67,.15); padding: 12px; }
        .dropdown-item-custom { border-radius:12px; padding:12px; transition: all .15s ease; display:flex; align-items:flex-start; }
        .dropdown-item-custom i { width:36px; height:36px; border-radius:10px; display:inline-flex; align-items:center; justify-content:center; background:#0d6efd12; color:var(--primary); margin-right:12px; font-size:16px; }
        .dropdown-item-custom .title { font-weight:600; color:#0b1d36; line-height:1.2; }
        .dropdown-item-custom .desc { font-size:.85rem; color:#6b7280; }
        .dropdown-item.dropdown-item-custom:hover { background: linear-gradient(90deg,#f2f7ff,#ffffff); transform: translateX(2px); }
        body.dark .dropdown-menu-custom { background: rgba(15,23,42,.9); border-color:#0b1220; }
        body.dark .dropdown-item-custom i { background:#1e293b; color:#93c5fd; }
        body.dark .dropdown-item-custom .title { color:#e5e7eb; }
        body.dark .dropdown-item-custom .desc { color:#9fb3c8; }
    </style>
</head>

<body>
    <!-- header -->
    <header>
        <!-- minimal top links (no nav/div wrappers) -->
        <section class="topbar">
          <div class="topwrap">
            <a class="brand link" href="<?php echo base_url();?>Welcome/indexhome"><i class="fas fa-ship"></i><span>e SEA PORTAL</span></a>
            <a class="link" href="<?php echo base_url();?>Welcome/indexhome">Home</a>
            <div class="dd">
                <a class="dd-toggle link">Registrations ▾</a>
                <div class="dd-menu">
                    <div class="dd-header">
                        <div class="dd-title">Registrations</div>
                        <div class="dd-subtitle">Choose an account type</div>
                    </div>
                    <a class="dd-item" href="<?php echo base_url();?>Welcome/companyreg">
                        <i class="fas fa-building"></i>
                        <div>
                            <div class="label">Company</div>
                            <div class="note">For organizations that ship cargo</div>
                        </div>
                    </a>
                    <a class="dd-item" href="<?php echo base_url();?>Welcome/contractreg">
                        <i class="fas fa-handshake"></i>
                        <div>
                            <div class="label">Contractor</div>
                            <div class="note">Join the contractor network</div>
                        </div>
                    </a>
                    <a class="dd-item" href="<?php echo base_url();?>Welcome/userreg">
                        <i class="fas fa-user"></i>
                        <div>
                            <div class="label">User</div>
                            <div class="note">Track and manage your shipments</div>
                        </div>
                    </a>
                </div>
            </div>
            <span class="spacer"></span>
            <a class="btn-cta" href="<?php echo base_url();?>Welcome/login">Login</a>
            <button id="themeToggle" class="theme-toggle"><i class="fas fa-moon"></i></button>
          </div>
        </section>
        <!-- hero -->
        <section class="hero">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="text-wrap">
                          <h1 class="display-4 mb-3">Move cargo with confidence</h1>
                          <p class="lead mb-4">Efficient services, transparent tracking, and trusted partners across global sea routes.</p>
                          <div class="d-flex flex-wrap">
                              <a href="<?php echo base_url(); ?>Welcome/companyreg" class="btn btn-gradient btn-lg mr-2 mb-2">Register Company</a>
                              <a href="<?php echo base_url(); ?>Welcome/login" class="btn btn-outline-light btn-lg mb-2">Login</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //hero -->
    </header>
    <!-- //header -->

    <!-- features -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-8">
                    <h2 class="h1">Why choose us</h2>
                    <p class="text-muted mb-0">Modern logistics platform to book, track, and manage sea shipments with ease.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="fas fa-globe"></i></div>
                        <h5>Global coverage</h5>
                        <p class="text-muted mb-0">Reliable partners across major ports ensuring on-time delivery.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="fas fa-shield-alt"></i></div>
                        <h5>Secure handling</h5>
                        <p class="text-muted mb-0">End-to-end visibility and safe cargo handling.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="far fa-thumbs-up"></i></div>
                        <h5>Trusted by teams</h5>
                        <p class="text-muted mb-0">Transparent pricing and trusted transactions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- solutions (react-like cards) -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-8">
                    <h2 class="h1">Solutions</h2>
                    <p class="text-muted mb-0">Composable modules to manage every step of your sea logistics.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-card h-100 p-4">
                        <span class="pill mb-2">Tracking</span>
                        <h5 class="mt-2">Live shipment tracking</h5>
                        <p class="text-muted">Real-time updates and notifications for each milestone.</p>
                        <a href="#" class="text-primary">Learn more <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-card h-100 p-4">
                        <span class="pill mb-2">Documents</span>
                        <h5 class="mt-2">Paperless workflows</h5>
                        <p class="text-muted">Manage bills of lading, invoices, and compliance online.</p>
                        <a href="#" class="text-primary">Learn more <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-card h-100 p-4">
                        <span class="pill mb-2">Analytics</span>
                        <h5 class="mt-2">Smart analytics</h5>
                        <p class="text-muted">KPIs and insights to improve your supply chain.</p>
                        <a href="#" class="text-primary">Learn more <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- quick links -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-lg-8">
                    <h2 class="h1">Get started</h2>
                    <p class="text-muted mb-0">Create your account and start managing shipments today.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a class="feature-card h-100 p-4 text-decoration-none d-block" href="<?php echo base_url(); ?>Welcome/companyreg">
                        <div class="feature-icon mb-3"><i class="fas fa-building"></i></div>
                        <h5 class="mb-1">Company Registration</h5>
                        <p class="text-muted mb-0">Sign up your organization.</p>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="feature-card h-100 p-4 text-decoration-none d-block" href="<?php echo base_url(); ?>Welcome/contractreg">
                        <div class="feature-icon mb-3"><i class="fas fa-handshake"></i></div>
                        <h5 class="mb-1">Contractor Registration</h5>
                        <p class="text-muted mb-0">Join our contractor network.</p>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a class="feature-card h-100 p-4 text-decoration-none d-block" href="<?php echo base_url(); ?>Welcome/userreg">
                        <div class="feature-icon mb-3"><i class="fas fa-user"></i></div>
                        <h5 class="mb-1">User Registration</h5>
                        <p class="text-muted mb-0">Create your personal account.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- showcase -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-8">
                    <h2 class="h1">Showcase</h2>
                    <p class="text-muted mb-0">A glimpse of our global routes and facilities.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="showcase-card">
                        <img src="<?php echo base_url(); ?>user/images/ship1.jpg" alt="route" />
                        <div class="overlay"><strong>Atlantic Route</strong></div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="showcase-card">
                        <img src="<?php echo base_url(); ?>user/images/ship3.jpg" alt="port" />
                        <div class="overlay"><strong>Singapore Port</strong></div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="showcase-card">
                        <img src="<?php echo base_url(); ?>user/images/ship4.jpg" alt="dock" />
                        <div class="overlay"><strong>Dock Operations</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- stats -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3 mb-4 stat">
                    <h3>120+</h3>
                    <p>Ports</p>
                </div>
                <div class="col-6 col-md-3 mb-4 stat">
                    <h3>8k+</h3>
                    <p>Shipments</p>
                </div>
                <div class="col-6 col-md-3 mb-4 stat">
                    <h3>99.2%</h3>
                    <p>On-time</p>
                </div>
                <div class="col-6 col-md-3 mb-4 stat">
                    <h3>24/7</h3>
                    <p>Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5" style="background: linear-gradient(90deg,#0b1d36,#0d6efd);">
        <div class="container py-4 text-center text-white">
            <h2 class="mb-3">Reach your destination sure and safe</h2>
            <p class="mb-4">Start by creating an account or logging in to continue.</p>
            <a href="<?php echo base_url(); ?>Welcome/userreg" class="btn btn-light mr-2">Create account</a>
            <a href="<?php echo base_url(); ?>Welcome/login" class="btn btn-outline-light">Login</a>
        </div>
    </section>

    <!-- footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="mb-0"><i class="fas fa-ship mr-2"></i>e SEA PORTAL</h5>
                </div>
                <div class="col-md-8 text-md-right">
                    <a href="<?php echo base_url(); ?>Welcome/indexhome" class="mr-3">Home</a>
                    <a href="<?php echo base_url(); ?>Welcome/companyreg" class="mr-3">Company</a>
                    <a href="<?php echo base_url(); ?>Welcome/contractreg" class="mr-3">Contractor</a>
                    <a href="<?php echo base_url(); ?>Welcome/userreg" class="mr-3">User</a>
                    <a href="<?php echo base_url(); ?>Welcome/login">Login</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>user/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>user/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>user/js/search.js"></script>
    <script>
        (function(){
            var toggle = document.getElementById('themeToggle');
            // apply saved theme
            try {
              var saved = localStorage.getItem('theme');
              if(saved === 'dark') { document.body.classList.add('dark'); if(toggle) toggle.innerHTML = '<i class="fas fa-sun"></i>'; }
            } catch(e) {}
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