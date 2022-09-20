<?php
	include './include/header.php';
?>

<section id="container">
	<header id="new_contact">ADD NEW CONTACT</header>

	<form id="new_contact_form" method="POST" enctype="multipart/form-data">
		<?php addContact();  ?>
		<div class="personal_info">Personal Info</div><br><br>

		<label>Full Name</label><br><br>
		<input type="text" name="FullName" placeholder="Enter Full Name" required><br><br>
		<label>Phone Number</label><br><br>
		<input type="text" name="phonenumber" placeholder="Enter Phone Number" required><br><br><br>
		<label>Voter's Card Number</label><br><br>
		<input type="text" name="votenumber" placeholder="Enter Voter's Card Number" required><br><br><br>
		<div class="connections">Connections</div><br><br><br>
		<label>Zone</label><br><br>
		<select name="zone" id="zonelist">
			<option>- Select Zone -</option>
			<?php get_all_zone(); ?>
		</select><br><br>

		<label>Local Goverment</label><br><br>
		<select name="lga" required id="lgalist">
			<option>- Select LGA -</option>
		</select><br><br>

		<label>Ward</label><br><br>
		<select name="ward" required id="wardlist">
			<option>- Select Ward -</option>
		</select><br><br>

		<label>Polling Unit</label><br><br>
		<select name="polling" required id="pollinglist">
			<option>- Select Polling Unit -</option>
		</select><br><br>

		<label>Group/Organization</label><br><br>
		<select name="groupOrg" required>
			<option>- Select Group/Organization -</option>
			<option value="anchor legs">anchor legs</option>
			<option value="foca">foca</option>
			<option value="like minds">like minds</option>
		</select><br><br>

		<div class="position">Position</div><br><br>

		<!-- <label>Position/Office</label><br><br>
		<select name="positionOffice" required>
			<option>- Select Position/Office -</option>
			<option value="assistant chairman">assistant chairman</option>
			<option value="assistant financial secretary">assistant financial secretary</option>
			<option value="assistant public secretary">assistant public secretary</option>
			<option value="assistant secretary">assistant secretary</option>
			<option value="assistant treasurer">assistant treasurer</option>
			<option value="assistant organising secretary">assistant organising secretary</option>
			<option value="auditor">auditor</option>
			<option value="chairman">chairman</option>
			<option value="coordinator">coordinator</option>
			<option value="deputy woman leader">deputy woman leader</option>
			<option value="deputy youth leader">deputy youth leader</option>
			<option value="ex officio">ex officio</option>
			<option value="financial secretary">financial secretary</option>
			<option value="legal adviser">legal adviser</option>
			<option value="local government representative">local government representative</option>
			<option value="member">member</option>
			<option value="organizing secretary">organizing secretary</option>
			<option value="polling agent">polling agent</option>
		</select><br><br> -->

		<label>Position/Office</label><br><br>
		<select name="DelegatePosition" required>
			<option>- Select Position/Office -</option>
			<option value="assistant chairman">assistant chairman</option>
			<option value="assistant financial secretary">assistant financial secretary</option>
			<option value="assistant public secretary">assistant public secretary</option>
			<option value="assistant secretary">assistant secretary</option>
			<option value="assistant treasurer">assistant treasurer</option>
			<option value="assistant organising secretary">assistant organising secretary</option>
			<option value="auditor">auditor</option>
			<option value="chairman">chairman</option>
			<option value="coordinator">coordinator</option>
			<option value="deputy woman leader">deputy woman leader</option>
			<option value="deputy youth leader">deputy youth leader</option>
			<option value="ex officio">ex officio</option>
			<option value="financial secretary">financial secretary</option>
			<option value="legal adviser">legal adviser</option>
			<option value="local government representative">local government representative</option>
			<option value="member">member</option>
			<option value="organizing secretary">organizing secretary</option>
			<option value="polling agent">polling agent</option>
		</select><br><br>
		<div class="position">Is Contact a Delegate?</div><br><br>
		<div id="checkbox_delegate">
			<div class="chekbx"><input type="checkbox" name="checkboxdelegate" value="Am a Delegate"></div>
			<p class="contact_a_delegate">Contact is a Delegate</p>
		</div><br>
		<button id="add_contact" name="addcontact">Add Contact</button>
	</form>
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>