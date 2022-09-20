<?php
	include './include/header.php';
?>
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
</html>