<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1 id="zone_title">
		<?php get_ward_title(); ?> <span>WARD</span>
		</h1>
	</div>

	<div id="zone_units">
			<a href="pollingunit.php"><li class="zone_unit_3">Polling Units:<span><?php pollingunit_individual_count_polling_page(); ?></span></li></a>
	</div>
	<p id="zone_title"><?php get_ward_title(); ?> <span>POLLING UNITS</span></p>

		<?php 
		if ($_SESSION['user_role'] === 'admin') {
			get_polling_unit_children(); 
		}else{
			get_polling_unit_children_subscriber(); 
		}
	?>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>