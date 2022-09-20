<?php
	include 'function.php';


function error_message_zone(){
	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];

		echo '<img src="img/deleteicon.png">
		<p id="areu">Are You Sure?</p>
		<p id="dou">Do you really want to delete this record? This process cannot be undone.</p>
		<div id="cancel">Cancel</div>
		<div id="delete" data-id="'.$id.'">Delete</div>';
	}
}
error_message_zone();

function error_message_lga(){
	if (isset($_REQUEST['errorlgaid'])) {
		$id = $_REQUEST['errorlgaid'];

		echo '<img src="img/deleteicon.png">
		<p id="areu">Are You Sure?</p>
		<p id="dou">Do you really want to delete this record? This process cannot be undone.</p>
		<div id="cancel">Cancel</div>
		<div id="delete_lga" data-id="'.$id.'">Delete</div>';
	}
}
error_message_lga();

function error_message_ward(){
	if (isset($_REQUEST['errorwardid'])) {
		$id = $_REQUEST['errorwardid'];

		echo '<img src="img/deleteicon.png">
		<p id="areu">Are You Sure?</p>
		<p id="dou">Do you really want to delete this record? This process cannot be undone.</p>
		<div id="cancel">Cancel</div>
		<div id="delete_ward" data-id="'.$id.'">Delete</div>';
	}
}
error_message_ward();

function error_message_pollingunit(){
	if (isset($_REQUEST['errorpollingid'])) {
		$id = $_REQUEST['errorpollingid'];

		echo '<img src="img/deleteicon.png">
		<p id="areu">Are You Sure?</p>
		<p id="dou">Do you really want to delete this record? This process cannot be undone.</p>
		<div id="cancel">Cancel</div>
		<div id="delete_polling" data-id="'.$id.'">Delete</div>';
	}
}
error_message_pollingunit();

function deletezone2() {
	global $conn;

	if (isset($_REQUEST['deletezoneid'])) {
		$id = $_REQUEST['deletezoneid'];
		$sql = "DELETE  FROM zone WHERE `id` = $id";
		$result = $conn->query($sql);
	}
}
deletezone2();

function deletelga2() {
	global $conn;

	if (isset($_REQUEST['deletelgaid'])) {
		$id = $_REQUEST['deletelgaid'];
		$sql = "DELETE  FROM lga WHERE `id` = $id";
		$result = $conn->query($sql);

	}
}
deletelga2();

function deleteward2() {
	global $conn;

	if (isset($_REQUEST['deletewardid'])) {
		$id = $_REQUEST['deletewardid'];
		$sql = "DELETE  FROM ward WHERE `id` = $id";
		$result = $conn->query($sql);

	}
}
deleteward2();

function deletepollingunit2() {
	global $conn;

	if (isset($_REQUEST['deletepollingid'])) {
		$id = $_REQUEST['deletepollingid'];
		$sql = "DELETE  FROM pollingunit WHERE `id` = $id";
		$result = $conn->query($sql);

	}
}
deletepollingunit2();

function deleteLga_zone(){
	global $conn;
	if (isset($_REQUEST['delLgaZoneid'])) {
		$id = $_REQUEST['delLgaZoneid'];
		$sql = "DELETE  FROM lga WHERE `zone_id` = $id";
		$result = $conn->query($sql);

	}
}
deleteLga_zone();

function deleteward_zone(){
	global $conn;
	if (isset($_REQUEST['delWardZoneid'])) {
		$id = $_REQUEST['delWardZoneid'];
		$sql = "DELETE  FROM ward WHERE `zone_id` = $id";
		$result = $conn->query($sql);

	}
}
deleteward_zone();

function deletepollingunit_zone(){
	global $conn;
	if (isset($_REQUEST['delpollingunitZoneid'])) {
		$id = $_REQUEST['delpollingunitZoneid'];
		$sql = "DELETE  FROM pollingunit WHERE `zone_id` = $id";
		$result = $conn->query($sql);

	}
}
deletepollingunit_zone();

function loadContactLga() {
	global $conn;

	if (isset($_REQUEST['zonelistId'])) {

		$zoneid = $_REQUEST['zonelistId'];
		$sql = "SELECT * FROM lga WHERE `zone_id` = '$zoneid'";
		$result = $conn->query($sql);?>
		<option>- Select LGA -</option>
		<?php

		foreach ($result as $value){
			$id = $value['id'];
			$lga_name = $value['lga_name'];
			$zone_id = $value['zone_id'];

			echo '<option value="'.$id.'">'.$lga_name.'</option>';
		}

	}
}
loadContactLga();

function loadContactward() {
	global $conn;

	if (isset($_REQUEST['lgalistId'])) {

		$lgaid = $_REQUEST['lgalistId'];
		$sql = "SELECT * FROM ward WHERE `lga_id` = '$lgaid'";
		$result = $conn->query($sql);?>

		<option>- Select Ward -</option>
		<?php

		foreach ($result as $value){
			$id = $value['id'];
			$ward_name = $value['ward_name'];

			echo '
			<option value="'.$id.'">'.$ward_name.'</option>';
		}

	}
}
loadContactward();

function loadContactpolling() {
	global $conn;

	if (isset($_REQUEST['wardlistId'])) {

		$wardid = $_REQUEST['wardlistId'];
		$sql = "SELECT * FROM pollingunit WHERE `ward_id` = '$wardid'";
		$result = $conn->query($sql);?>

		<option>- Select Polling Unit -</option>
		<?php

		foreach ($result as $value){
			$id = $value['id'];
			$polling_name = $value['pollingunit_name'];

			echo '
			<option value="'.$id.'">'.$polling_name.'</option>';
		}

	}
}
loadContactpolling();














?>
