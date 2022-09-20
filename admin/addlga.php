<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1>
		ADD LGA on <span id="zone_title"><?php get_zone_title(); ?></span>
		</h1>

	</div>

	<article id="add_lga_container">

		<?php get_zoneId_addlgaPage(); ?>
		<!-- <form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="addlga" placeholder="NAME OF LGA"><br><br>
			<input type="text" name="addlga" value="hi"><br><br>
			<button>ADD LGA</button>
		</form> -->
	</article>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>

</body>
</html>