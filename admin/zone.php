<?php
	include './include/header.php';
?>
<section id="container">
	<div id="dash_con">
		<h1>
		ALL ZONES
		</h1>

	</div>

		
		 <?php 
			if ($_SESSION['user_role'] == 'admin') {
				zonesearch(); 
			}else{
				zonesearch_subscriber();
		}
	?>

	<article id="success_fail_holder">
		<?php  add_zone();?>

	</article>

	
	<div id="add_zone">
		<?php 

		if ($_SESSION['user_role'] == 'admin') {
				add_zone_form(); 
			}
		 ?>
	</div>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>