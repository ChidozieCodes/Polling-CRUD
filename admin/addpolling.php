<?php
	include 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/sinco.css">
	<link rel="stylesheet" type="text/css" href="css/zone.css">
	<link rel="stylesheet" type="text/css" href="css/lga.css">
	<link rel="stylesheet" type="text/css" href="css/mediaquery.css">
</head>
<body>
<header id="menu">
	<div id="logo_name"></div>
	<div id="hamburger"><img src="img/hamb.png" class="hamburg_img"></div>
</header>
<aside id="sidebar">
	<img src="img/close.png" id="close">
	<li id="dash_li">
		<span><img src="img/dashboard_small.png" class="dash_img"></span><a href="index.php">Dashboard</a>
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
		ADD POLLING UNIT on <span id="zone_title"><?php get_ward_title(); ?></span>
		</h1>

	</div>

	<article id="add_lga_container">
	<?php get_wardId_addpollingunitPage(); ?>
		
	</article>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>