<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Transports Transportation Category Bootstrap Responsive Web Template | Home :: W3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Transports Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/owl.carousel.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/owl.theme.default.min.css" type="text/css" media="all" />
	<!-- Owl-Carousel-CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="<?php echo base_url();?>user/fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
	<!-- //Web-Fonts -->

	<style>
      :root { --primary:#0d6efd; --accent:#6610f2; --ink:#0b1d36; --muted:#6b7280; --bg:#f7f9fc; --card:#ffffff; }
      body { background:var(--bg); color:#17202a; font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif; }
      .dash { display:grid; grid-template-columns: 250px 1fr; min-height:100vh; }
      .dash-aside { background: linear-gradient(180deg, rgba(6,36,67,.85), rgba(13,110,253,.65)), url('<?php echo base_url(); ?>user/images/logi.jpg') center/cover no-repeat; color:#fff; padding:20px 16px; position:sticky; top:0; height:100vh; }
      .brand { display:flex; align-items:center; gap:10px; font-weight:800; margin-bottom:20px; }
      .brand i { width:32px; height:32px; display:inline-flex; align-items:center; justify-content:center; border-radius:10px; background: linear-gradient(135deg,#0d6efd,#6610f2); }
      .navlink { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; color:#e8eef7; text-decoration:none; font-weight:600; }
      .navlink:hover, .navlink.active { background: rgba(255,255,255,.14); color:#fff; }
      .dash-main { display:flex; flex-direction:column; min-height:100vh; }
      .dash-top { backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); background: rgba(255,255,255,.7); border-bottom:1px solid #e6ebf1; padding:10px 16px; display:flex; align-items:center; gap:12px; position:sticky; top:0; z-index:10; }
      .dash-top h2 { margin:0; font-weight:800; color:var(--ink); }
      .spacer { flex:1; }
      .theme-toggle { border:1px solid #e6ebf1; background:transparent; color:#0b1d36; border-radius:999px; padding:6px 10px; }
      .theme-toggle i { pointer-events:none; }
      .dash-content { padding:20px; }
      .cards { display:grid; grid-template-columns: repeat(4, minmax(200px,1fr)); gap:18px; }
      .card { position:relative; border:1px solid #e6ebf1; background:#fff; border-radius:14px; padding:18px; box-shadow: 0 10px 28px rgba(6,36,67,.07); overflow:hidden; }
      .card .icon { width:38px; height:38px; border-radius:10px; display:inline-flex; align-items:center; justify-content:center; background:#0d6efd15; color:#0d6efd; margin-bottom:10px; }
      .card h4 { margin:0 0 6px; font-weight:800; color:var(--ink); }
      .card p { margin:0; color:var(--muted); }
      .panel { margin-top:20px; border:1px solid #edf1f5; border-radius:14px; overflow:hidden; background:#fff; box-shadow: 0 8px 18px rgba(6,36,67,.06); }
      .panel-header { padding:12px 16px; font-weight:700; border-bottom:1px solid #edf1f5; display:flex; align-items:center; gap:8px; }
      .panel-body { padding:16px; }
      table { width:100%; border-collapse: collapse; }
      th, td { padding:10px; border-bottom:1px solid #edf1f5; text-align:left; }
      .status { padding:4px 10px; border-radius:999px; font-size:.85rem; }
      .status.ok { background:#dcfce7; color:#166534; }
      .status.pending { background:#fff7ed; color:#9a3412; }
      .status.alert { background:#fee2e2; color:#991b1b; }
      .countdown { font-weight:700; color:#0b1d36; }
      .jd { max-width:520px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
      body.dark .countdown { color:#e5e7eb; }
      /* Dark mode */
      body.dark { --bg:#0b1220; --card:#0f172a; color:#e5e7eb; }
      body.dark .dash-top { background: rgba(15,23,42,.6); border-color:#0b1220; }
      body.dark .card, body.dark .panel { background:rgba(15,23,42,.85); border-color:#0b1220; }
      body.dark .card h4 { color:#e5e7eb; }
      body.dark .theme-toggle { border-color:#1f2a3b; color:#e5e7eb; }
      @media (max-width: 1024px) { .cards { grid-template-columns: repeat(2,1fr);} .dash { grid-template-columns: 220px 1fr;} }
      @media (max-width: 720px) { .cards { grid-template-columns: 1fr;} .dash { grid-template-columns: 1fr;} .dash-aside{ position:static; height:auto; border-bottom:1px solid rgba(255,255,255,.2);} }
      /* hide legacy site below */
      .legacy { display:none; }
    </style>

</head>

<body>
    <!-- Company Dashboard (new) -->
    <div class="dash">
      <aside class="dash-aside">
        <div class="brand"><i class="fas fa-ship"></i> <span>e SEA PORTAL</span></div>
        <nav>
          <a class="navlink active" href="#"><i class="fas fa-home"></i> Dashboard</a>
          <a class="navlink" href="<?php echo base_url(); ?>Welcome/companyupdation_view"><i class="fas fa-user"></i> Profile</a>
          <div style="margin:8px 0; opacity:.7; font-size:.85rem;">Shipping</div>
          <a class="navlink" href="<?php echo base_url(); ?>Welcome/shipdetails"><i class="fas fa-plus"></i> Add Ship</a>
          <a class="navlink" href="<?php echo base_url(); ?>Welcome/shipview"><i class="fas fa-list"></i> View Ships</a>
          <div style="margin:8px 0; opacity:.7; font-size:.85rem;">Jobs</div>
          <a class="navlink" href="<?php echo base_url(); ?>Welcome/jobss"><i class="fas fa-briefcase"></i> Add Job</a>
          <a class="navlink" href="<?php echo base_url(); ?>Welcome/jobviewscompany"><i class="fas fa-clipboard-list"></i> View Jobs</a>
          <a class="navlink" href="<?php echo base_url(); ?>Welcome/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
      </aside>
      <main class="dash-main">
        <div class="dash-top">
          <h2>Company Dashboard</h2>
          <span class="spacer"></span>
          <button id="themeToggle" class="theme-toggle"><i class="fas fa-moon"></i></button>
        </div>
        <div class="dash-content">
          <div class="cards">
            <div class="card"><div class="icon"><i class="fas fa-ship"></i></div><h4>Total Ships</h4><p>12 active</p></div>
            <div class="card"><div class="icon"><i class="fas fa-briefcase"></i></div><h4>Open Jobs</h4><p>5 postings</p></div>
            <div class="card"><div class="icon"><i class="fas fa-box"></i></div><h4>Shipments</h4><p>218 this month</p></div>
            <div class="card"><div class="icon"><i class="fas fa-stopwatch"></i></div><h4>On-time Rate</h4><p>99.2%</p></div>
          </div>

          <div class="panel">
            <div class="panel-header"><i class="fas fa-anchor"></i> Recent Shipments</div>
            <div class="panel-body">
              <table>
                <thead><tr><th>Vessel</th><th>Route</th><th>ETA</th><th>Status</th></tr></thead>
                <tbody>
                  <tr><td>Carnival Magic</td><td>DXB → COK</td><td>12 Oct</td><td><span class="status ok">Arrived</span></td></tr>
                  <tr><td>MSC Portview</td><td>COK → BOM</td><td>14 Oct</td><td><span class="status pending">Pending</span></td></tr>
                  <tr><td>Ocean Star</td><td>MAA → COK</td><td>17 Oct</td><td><span class="status alert">Delayed</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel">
            <div class="panel-header"><i class="fas fa-tools"></i> Quick Actions</div>
            <div class="panel-body">
              <a href="<?php echo base_url(); ?>Welcome/shipdetails" class="btn btn-primary btn-sm mr-2">Add Ship</a>
              <a href="<?php echo base_url(); ?>Welcome/jobss" class="btn btn-primary btn-sm mr-2">Post Job</a>
              <a href="<?php echo base_url(); ?>Welcome/shipview" class="btn btn-outline-secondary btn-sm mr-2">View Ships</a>
              <a href="<?php echo base_url(); ?>Welcome/jobviewscompany" class="btn btn-outline-secondary btn-sm">View Jobs</a>
            </div>
          </div>

          <div class="panel">
            <div class="panel-header"><i class="fas fa-briefcase"></i> Open Job Positions</div>
            <div class="panel-body">
              <table>
                <thead>
                  <tr>
                    <th>Role</th>
                    <th>Age</th>
                    <th>Qualification</th>
                    <th>JD</th>
                    <th>Last date</th>
                    <th>Time left</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-deadline="2025-10-31T23:59:59+05:30">
                    <td>Port Operations Executive</td>
                    <td>22–35</td>
                    <td>BBA/Logistics</td>
                    <td class="jd" title="Coordinate berthing, documentation, and daily port ops; liaise with customs and shipping agents.">Coordinate berthing, documentation, and daily port ops; liaise with customs…</td>
                    <td>31 Oct 2025</td>
                    <td class="countdown">--</td>
                  </tr>
                  <tr data-deadline="2025-11-15T18:00:00+05:30">
                    <td>Fleet Maintenance Supervisor</td>
                    <td>25–40</td>
                    <td>Diploma/Mech</td>
                    <td class="jd" title="Plan preventive maintenance, supervise contractors, ensure safety compliance for yard equipment.">Plan preventive maintenance, supervise contractors…</td>
                    <td>15 Nov 2025</td>
                    <td class="countdown">--</td>
                  </tr>
                  <tr data-deadline="2025-12-01T10:00:00+05:30">
                    <td>Customs Documentation Officer</td>
                    <td>21–32</td>
                    <td>Any Graduate</td>
                    <td class="jd" title="Prepare BoE, verify HS codes, manage clearance SLAs with line agents and CHA.">Prepare BoE, verify HS codes, manage clearance SLAs…</td>
                    <td>01 Dec 2025</td>
                    <td class="countdown">--</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script>
      (function(){
        var toggle = document.getElementById('themeToggle');
        try { var saved = localStorage.getItem('theme'); if(saved==='dark'){ document.body.classList.add('dark'); if(toggle) toggle.innerHTML = '<i class="fas fa-sun"></i>'; } } catch(e) {}
        if(toggle){ toggle.addEventListener('click', function(){ var isDark = document.body.classList.toggle('dark'); this.innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>'; try { localStorage.setItem('theme', isDark ? 'dark' : 'light'); } catch(e) {} }); }

        function updateCountdowns(){
          var rows = document.querySelectorAll('table tbody tr[data-deadline]');
          var now = new Date();
          rows.forEach(function(row){
            var deadlineStr = row.getAttribute('data-deadline');
            var cdEl = row.querySelector('.countdown');
            if(!cdEl || !deadlineStr) return;
            var end = new Date(deadlineStr);
            var diff = end - now;
            if(diff <= 0){ cdEl.textContent = 'Closed'; cdEl.classList.add('status','alert'); return; }
            var d = Math.floor(diff/86400000);
            var h = Math.floor((diff%86400000)/3600000);
            var m = Math.floor((diff%3600000)/60000);
            var s = Math.floor((diff%60000)/1000);
            cdEl.textContent = d+'d '+h+'h '+m+'m '+s+'s';
          });
        }
        updateCountdowns();
        setInterval(updateCountdowns, 1000);
      })();
    </script>

</body>

</html>
			