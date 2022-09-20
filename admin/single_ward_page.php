<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1 id="zone_title">
		<?php get_lga_title(); ?> <span>LGA</span>
		</h1>
	</div>

	<div id="zone_units">
			<a href="ward.php"><li class="zone_unit_2">Wards:<span><?php ward_individual_count_ward_page() ?></span></li></a>
			<a href="pollingunit.php"><li class="zone_unit_3">Polling Units:<span><?php pollingunit_individual_count_ward_page(); ?></span></li></a>
	</div>
	<p id="zone_title"><?php get_lga_title(); ?> <span>WARDS</span></p>

		<?php 
		if ($_SESSION['user_role'] === 'admin') {
			get_ward_children(); 
		}else{
			get_ward_children_subscriber(); 
		}
	?>
	
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>