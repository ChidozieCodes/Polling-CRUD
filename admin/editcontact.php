<?php
	include './include/header.php';
?>
<section id="container">
	<header id="new_contact">ADD NEW CONTACT</header>

		<?php delete_contact() ?>
		<?php

			if (isset($_REQUEST['id'])) {
			  	
			  	$id = $_REQUEST['id'];

			  	$sql = "SELECT * FROM contact WHERE `id` = '$id'";
 				$result = $conn->query($sql);

 				foreach ($result as $value){
 					$id = $value['id'];
					$fullname = $value['fullname'];
 					$phonenumber = $value['phonenumber'];
 					$positionoffice = $value['positionoffice'];
 					$lga = $value['lga'];
 					$ward = $value['ward'];
 					$zone = $value['zone'];
 					$polling = $value['pollingunit'];
 					$voters_card_number = $value['voters_card_number'];
 					$grouporg = $value['grouporg'];
 					$delegateposition = $value['delegateposition'];

 					?>
 		<form id="new_contact_form" method="POST" enctype="multipart/form-data">
		
		<div class="personal_info">Personal Info</div><br><br>

		<label>Full Name</label><br><br>
		<input type="text" name="FullName" placeholder="Enter FullName" required value="<?php echo $fullname;?>"><br><br>
		<label>Phone Number</label><br><br>
		<input type="text" name="phonenumber" placeholder="Enter Phone Number" required value="<?php echo $phonenumber;?>"><br><br><br>
		<label>Voter's Card Number</label><br><br>
		<input type="text" name="votenumber" placeholder="Enter Voter's Card Number" required value="<?php echo $voters_card_number;?>"><br><br><br>
		<div class="connections">Connections</div><br><br><br>

		<label>Zone</label><br><br>
		<select name="zone">
			<option value="<?php echo $zone?>"><?php echo $zone;?></option>
			<?php get_all_zone(); ?>
		</select><br><br>

		<label>Local Goverment</label><br><br>
		<select name="lga" required>
			<option value="<?php echo $lga?>"><?php echo $lga;?></option>
			<?php get_all_local_govt(); ?>
		</select><br><br>

		<label>Ward</label><br><br>
		<select name="ward" required>
			<option value="<?php echo $ward?>"><?php echo $ward;?></option>
			<?php get_all_ward(); ?>
		</select><br><br>

		<label>Polling Unit</label><br><br>
		<select name="polling" required>
			<option value="<?php echo $polling?>"><?php echo $polling;?></option>
		</select><br><br>

		<label>Group/Organization</label><br><br>
		<select name="groupOrg" required>
			<option value="<?php echo $grouporg;?>"><?php echo $grouporg;?></option>
			<option value="anchor legs">anchor legs</option>
			<option value="foca">foca</option>
			<option value="like minds">like minds</option>
		</select><br><br>

		<div class="position">Position</div><br><br>

		<!-- <label>Position/Office</label><br><br>
		<select name="positionOffice" required>
			<option value="<?php echo $positionoffice;?>"><?php echo $positionoffice;?></option>
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
			<option value="<?php echo $delegateposition;?>"><?php echo $delegateposition;?></option>
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
		<button id="add_contact" name="updatecontact">Update Contact</button>
	</form>

 					<?php
 				}
			  }  

		?>
			<?php 
			if (isset($_REQUEST['updatecontact'])) {

				$FullName = $_REQUEST['FullName'];
				$phonenumber = $_REQUEST['phonenumber'];
				$ward = $_REQUEST['ward'];
				$lga = $_REQUEST['lga'];
				$zone = $_REQUEST['zone'];
				$polling = $_REQUEST['polling'];
				$votenumber = $_REQUEST['votenumber'];
				$groupOrg = $_REQUEST['groupOrg'];
				$positionOffice = $_REQUEST['positionOffice'];
				$DelegatePosition = $_REQUEST['DelegatePosition'];
				$checkboxdelegate = (isset($_REQUEST['checkboxdelegate'])) ? $_REQUEST['checkboxdelegate'] : '';

				if (!empty($checkboxdelegate)) {
					$sql = "UPDATE contact SET `fullname` = '$FullName', `phonenumber` = '$phonenumber', `voters_card_number` = '$votenumber', `ward` = '$ward', `lga` = '$lga', `zone` = '$zone', `pollingunit` = '$polling', `grouporg` = '$groupOrg', `positionoffice` = '$positionOffice', `delegateposition` = '$DelegatePosition', `checkboxdelegate` = '$checkboxdelegate' WHERE `id`= '$id'";
				}else{
			
					$sql = "UPDATE contact SET `fullname` = '$FullName', `phonenumber` = '$phonenumber', `voters_card_number` = '$votenumber', `ward` = '$ward', `lga` = '$lga', `zone` = '$zone', `pollingunit` = '$polling', `grouporg` = '$groupOrg', `positionoffice` = '$positionOffice', `delegateposition` = '', `checkboxdelegate` = '' WHERE `id`= '$id'";
				}

				$result = $conn->query($sql);

				if ($result) {
					echo 'updated';
				}else{
					die("Query failed" . mysqli_error($conn));
				}
			}

				 

			?>
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>