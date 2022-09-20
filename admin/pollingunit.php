<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1>
		ALL POLLING UNITS
		</h1>

	</div>

	<?php 
		if ($_SESSION['user_role'] === 'admin') {
			pollingUnitsearch(); 
		}else{
			pollingUnitsearch_subscribe(); 
		}
	?>
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>