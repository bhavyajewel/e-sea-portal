<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>e SEA PORTAL | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>user/css/fontawesome-all.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #f7f9fc;
			color: #333;
		}

		/* Navbar */
		.navbar {
			background: rgba(0, 60, 100, 0.85);
			backdrop-filter: blur(8px);
		}
		.navbar .nav-link {
			color: white !important;
			font-weight: 500;
			transition: color 0.3s ease;
		}
		.navbar .nav-link:hover {
			color: #ffcc00 !important;
		}
		.navbar-brand {
			color: white !important;
			font-weight: 700;
			letter-spacing: 1px;
		}

		/* Carousel */
		.carousel-item {
			height: 100vh;
			background-size: cover;
			background-position: center;
			position: relative;
		}
		.carousel-item::before {
			content: "";
			position: absolute;
			top: 0; left: 0; right: 0; bottom: 0;
			background: rgba(0,0,0,0.5);
		}
		.slider-text {
			position: relative;
			z-index: 2;
			color: #fff;
			text-shadow: 0px 3px 8px rgba(0,0,0,0.6);
		}
		.slider-text h3 {
			font-size: 3rem;
			font-weight: 700;
		}

		/* Section Headings */
		.title {
			font-size: 2.2rem;
			font-weight: 600;
			color: #003c64;
		}
		.title span {
			color: #ffcc00;
		}

		/* Vehicle Fleets */
		.owl-carousel .item {
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}
		.owl-carousel .item:hover {
			transform: translateY(-10px);
			box-shadow: 0 8px 20px rgba(0,0,0,0.2);
		}
		.owl-carousel img {
			border-radius: 15px;
		}

		/* Feature Section */
		.wthree-services-right h3 {
			color: #003c64;
			font-weight: 700;
		}
		.services-bottom-icon {
			background: #003c64;
			color: #fff;
			width: 50px; height: 50px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 20px;
		}

		/* Footer */
		footer {
			background: #00263d;
			color: white;
		}
		footer h1, footer h5 {
			color: #ffcc00;
		}
		footer a {
			color: white;
			transition: 0.3s;
		}
		footer a:hover {
			color: #ffcc00;
		}
	</style>
</head>

<body>
	<!-- Header -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="#">
				<i class="fas fa-ship mr-2"></i>e SEA PORTAL
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto text-center">
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Welcome/contractupdation_view">Profile</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Welcome/tendercontractviews">Tenders</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Welcome/tenderapprovedview">Tender Approve</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Welcome/logout">Logout</a></li>
				</ul>
			</div>
		</nav>

		<!-- Carousel -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active" style="background-image:url('<?php echo base_url();?>user/images/ship1.jpg');">
					<div class="container h-100 d-flex align-items-center">
						<div class="slider-text">
							<h6>Transport your goods</h6>
							<h3>Tender Portal</h3>
							<p>Efficient service and trustworthy transactions for global cargo movement.</p>
						</div>
					</div>
				</div>
				<div class="carousel-item" style="background-image:url('<?php echo base_url();?>user/images/ship2.jpg');">
					<div class="container h-100 d-flex align-items-center">
						<div class="slider-text">
							<h6>With our modern fleet</h6>
							<h3>Tender Portal</h3>
						</div>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</header>

	<!-- Vehicle Fleets -->
	<section class="w3agile-spldishes py-5">
		<div class="container">
			<h3 class="title text-center mb-5"><span>V</span>ehicle <span>F</span>leets</h3>
			<div class="owl-carousel owl-theme">
				<div class="item"><img src="<?php echo base_url();?>user/images/ship1.jpg" class="img-fluid"></div>
				<div class="item"><img src="<?php echo base_url();?>user/images/ship2.jpg" class="img-fluid"></div>
				<div class="item"><img src="<?php echo base_url();?>user/images/ship3.jpg" class="img-fluid"></div>
				<div class="item"><img src="<?php echo base_url();?>user/images/ship5.jpg" class="img-fluid"></div>
			</div>
		</div>
	</section>

	<!-- Feature Section -->
	<section class="spe-w3l py-5 bg-light">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<img src="<?php echo base_url();?>user/images/logi.jpg" class="img-fluid rounded shadow">
				</div>
				<div class="col-lg-6">
					<h3 class="title mb-4"><span>W</span>e <span>T</span>ransports</h3>
					<div class="mb-4 d-flex align-items-center">
						<div class="services-bottom-icon"><i class="fab fa-apple"></i></div>
						<div class="ml-3"><h5>Food & Beverage</h5></div>
					</div>
					<div class="mb-4 d-flex align-items-center">
						<div class="services-bottom-icon"><i class="fab fa-docker"></i></div>
						<div class="ml-3"><h5>Energy Oil & Gas</h5></div>
					</div>
					<div class="d-flex align-items-center">
						<div class="services-bottom-icon"><i class="fas fa-dolly"></i></div>
						<div class="ml-3"><h5>Retail Package Goods</h5></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="py-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<h5>World wide Transport within 24 hours</h5>
				</div>
				<div class="col-md-6 text-md-right">
					<a href="#"><i class="fab fa-facebook-f mr-2"></i>Facebook</a> | 
					<a href="#"><i class="fab fa-twitter mr-2"></i>Twitter</a>
				</div>
			</div>
		</div>
	</footer>

	<!-- JS -->
	<script src="<?php echo base_url();?>user/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url();?>user/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>user/js/owl.carousel.js"></script>
	<script>
		$(".owl-carousel").owlCarousel({
			loop:true,
			margin:15,
			autoplay:true,
			autoplayTimeout:2000,
			responsive:{0:{items:1},600:{items:2},1000:{items:3}}
		});
	</script>
</body>
</html>
