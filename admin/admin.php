<!-- <?php
	include 'function.php';
?>
<?php 
	
	if (!isset($_SESSION['email'])) {
		
		header("Location: ../index.php");
	}
 ?> 

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/sinco.css">
	<link rel="stylesheet" type="text/css" href="css/mediaquery.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="web-fonts-css/css/fontawesome-all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta charset="utf-8">
</head>
<body>
<header id="menu">
	<div id="logo_name"></div>
	<div id="hamburger"><img src="img/hamb.png" class="hamburg_img"></div>
</header>
<aside id="sidebar">
	<img src="img/close.png" id="close">
	<li id="dash_li">
		<span><img src="img/dashboard_small.png" class="dash_img"></span><a href="admin/admin.php">Dashboard</a>
	</li>

	<li id="zone_li">
		<span><img src="img/umbrella_small.png" class="umb_img"></span><a href="zone.php">Zones</a>
	</li>

	<li id="lga_li">
		<span><img src="img/lga_small.png" class="lga_img"></span><a href="lga.php">LGAs</a>
	</li>

	<li id="ward_li">
		<span><img src="img/ward_small.png" class="ward_img"></span><a href="ward.php">Wards</a>
	</li>

	<li id="polling_li">
		<span><img src="img/polling_unit_small.png" class="polling_img"></span><a href="pollingunit.php">Polling Units</a>
	</li>

	<li id="contact_li">
		<span><img src="img/contact_small.png" class="con_img"></span><a href="contact.php">Contact People</a>
	</li>
	
</aside>
<section id="container">
	<div id="dash_con">
		<h1>
		DASHBOARD
		</h1>
	</div>

	<a href="zone.php">
		<article id="zone">

			<div id="sub_zone">
				<div class="zone_num">
					<h2><?php total_zone_count(); ?></h2>
					<p>ZONES</p>				
				</div>
				<div class="zone_icon">

					<img src="img/umbrella.png">
				</div>
			
			</div>

			<div id="view_detail">

				<div class="view_detail_letter">
					<p>
					View Details
					</p>
					
				</div>
				<div class="view_detail_icon">
					<img src="img/arrow.png">
				</div>
			
			</div>
		
		</article>
	</a>

	<a href="lga.php">
		<article id="lga">

			<div id="sub_lga">

				<div class="lga_num">
					<h2><?php total_lga_count(); ?></h2>
					<p>LGAS</p>
				</div>
				<div class="lga_icon">
					<img src="img/lga.png">
				</div>
			
			</div>

			<div id="view_detail">

				<div class="view_detail_letter">
					<p>
					View Details
					</p>
				</div>
				<div class="view_detail_icon">
					<img src="img/arrow.png">
				</div>
			
			</div>
		
		</article>
	</a>

	<a href="ward.php">
		<article id="ward">

			<div id="sub_ward">

				<div class="ward_num">
					<h2><?php total_ward_count(); ?></h2>
					<p>WARDS</p>
				
				</div>
				<div class="ward_icon">
					<img src="img/ward.png">
				</div>
			
			</div>

			<div id="view_detail">

				<div class="view_detail_letter">
					<p>
					View Details
					</p>
				</div>
				<div class="view_detail_icon">
					<img src="img/arrow.png">
				</div>
			
			</div>
		
		</article>
	</a>

	<a href="pollingunit.php">
		<article id="polling_units">

			<div id="sub_polling_units">

				<div class="polling_units_num">
					<h2><?php total_pollingunit_count(); ?></h2>
					<p>POLLING UNITS</p>
				</div>
				<div class="polling_units_icon">
					<img src="img/polling_unit.png">
				</div>
			
			</div>

			<div id="view_detail">

				<div class="view_detail_letter_p">
					<p>
					View Details
					</p>	
				</div>
				<div class="view_detail_icon_p">
					<img src="img/arrow.png">	
				</div>
			
			</div>
		
		</article>
	</a>

	<a href="contact.php">
		<article id="contact_people">

			<div id="sub_contact_people">

				<div class="contact_people_num">
					<h2><?php total_contact_count(); ?></h2>
					<p>CONTACT PEOPLE</p>
				</div>
				<div class="contact_people_icon">
					<img src="img/contact.png">
				</div>
			
			</div>

			<div id="view_detail">

				<div class="view_detail_letter_p">
					<p>
					View Details
					</p>	
				</div>
				<div class="view_detail_icon_p">
					<img src="img/arrow.png">
				</div>
			
			</div>
		
		</article>
	</a>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html> -->