<?php
	include './include/header.php';
?>
<section id="container">
	<div id="dash_con">
		<h1 id="zone_title">
		<?php get_zone_title(); ?> <span>ZONE</span>
		</h1>
	</div>

	<div id="zone_units">
			<a href="lga.php"><li class="zone_unit_1">LGAs:<span><?php lga_individual_count(); ?></span></li></a>
			<a href="ward.php"><li class="zone_unit_2">Wards:<span><?php ward_individual_count(); ?></span></li></a>
			<a href="pollingunit.php"><li class="zone_unit_3">Polling Units:<span><?php pollingunit_individual_count(); ?></span></li></a>
	</div>
	<p id="zone_title"><?php get_zone_title(); ?> <span>LGAs</span></p>

		<?php 
		if ($_SESSION['user_role'] === 'admin') {
			get_lga_children(); 
		}else{
			get_lga_children_subscriber(); 
		}
	?>
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>