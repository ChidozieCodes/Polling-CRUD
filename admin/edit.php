<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
	
	</div>

	<article id="add_lga_container">

		<?php editzone(); editlga(); editward(); editpollingunit(); ?>
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