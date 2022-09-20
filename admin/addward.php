<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1>
		ADD WARD on <span id="zone_title"><?php get_lga_title(); ?></span>
		</h1>

	</div>

	<article id="add_lga_container">
	<?php get_lgaId_addwardPage(); ?>
		<!-- <form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="addward" placeholder="NAME OF WARD"><br><br>
			<input type="text" name="addward" value="hi"><br><br>
			<button>ADD WARD</button>
		</form> -->
	</article>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>