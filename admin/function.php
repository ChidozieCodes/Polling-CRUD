<?php
ob_start();
session_start();
$conn = new mysqli('localhost','root','','sinco');
//$conn = new mysqli('localhost','eselwpql_georgeuser','nIxQCBp4wETo','eselwpql_georgedb');

if ($conn) {
	//echo "connected";
}

function register() {
	global $conn;

	if (isset($_REQUEST['register'])) {
	
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$password2 = $_REQUEST['password2'];

	$error = [];

	$sql = "SELECT * FROM registration WHERE `username` = '$username'";
	$result = $conn->query($sql);

	$res = mysqli_num_rows($result);
	if ($res > 0) {
		array_push($error, 'Username already exist, please try another one');
	}

	if ($password == $password2) {
		$sql2 = "INSERT INTO `registration`(`firstname`, `lastname`, `email`, `username`, `password`, `password2`) VALUES ('$firstname','$lastname','$email','$username','$password','$password2')";

		$result2 = $conn->query($sql2);
		if ($result) {
			echo '<div id="success">
					Registration successful
				</div>';
		}
	}else{
		echo '<div id="fail">
					Password does not match
				</div>';
	}

	


	}


}

function adduser() {
	global $conn;

	if (isset($_REQUEST['adduser'])) {
	
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$password2 = $_REQUEST['password2'];
	$user_role = $_REQUEST['user_role'];

	$error = [];

	$sql = "SELECT * FROM registration WHERE `username` = '$username'";
	$result = $conn->query($sql);

	$res = mysqli_num_rows($result);
	if ($res > 0) {
		array_push($error, 'Username already exist, please try another one');
	}

	if ($password == $password2) {
		$sql2 = "INSERT INTO `registration`(`firstname`, `lastname`, `email`, `username`, `password`, `password2`, `user_role`) VALUES ('$firstname','$lastname','$email','$username','$password','$password2','$user_role')";

		$result2 = $conn->query($sql2);
		if ($result) {
			echo '<div id="success">
					User Added Successful
				</div>';
		}
	}else{
		echo '<div id="fail">
					Password does not match
				</div>';
	}

	


	}


}


function update_user() {
	global $conn;

	if (isset($_REQUEST['updateuser'])) {


		if (isset($_REQUEST['edit'])) {

			$user_id = mysqli_real_escape_string($conn, $_REQUEST['edit']);

			$firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
			$lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
			$user_role = mysqli_real_escape_string($conn, $_REQUEST['user_role']);
			$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
			$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
			$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
			$password2 = mysqli_real_escape_string($conn, $_REQUEST['password2']);

			if ($password === $password2) {

				$sql = "UPDATE registration SET `firstname` = '$firstname', `lastname` = '$lastname', `user_role` = '$user_role', `username` = '$username', `email` = '$email', `password` = '$password', `password2` = '$password2' WHERE `id`= '$user_id'";

				$result = $conn->query($sql);

				if (!$result) {
					
					die("Query failed" . mysqli_error($conn));
				} else {
					echo '<div id="success">Updated Succefully!!!</div>';
				}
			}else {
				echo '<div id="fail">Password does not match</div>';
				die("Query failed" . mysqli_error($conn));
			} 
				
		}

	}
}

function delete_user() {
	global $conn;

	if (isset($_GET['deleteuser'])) {
		global $conn;
				
		$user_id = $_GET['deleteuser'];

		$sql = "DELETE FROM registration WHERE `id` = $user_id";
		$result = $conn->query($sql);

		header("Location: all_user.php");
	
	}
}

function delete_contact() {
	global $conn;

	if (isset($_GET['deleteid'])) {
		global $conn;
				
		$contact_id = $_GET['deleteid'];

		$sql = "DELETE FROM contact WHERE `id` = $contact_id";
		$result = $conn->query($sql);

		header("Location: contact.php");
	
	}
}

function change_to_admin() {
	global $conn;
	
	if (isset($_REQUEST['change_to_admin'])) {

		$user_id = mysqli_real_escape_string($conn, $_REQUEST['change_to_admin']);

		$sql = "UPDATE registration SET user_role = 'admin' WHERE `id`= '$user_id'";

		$result = $conn->query($sql);

		if (!$result) {
					
			die("Query failed" . mysqli_error($conn));

		}else {

			header("Location: all_user.php");

			// echo '<h2 class="green">User Role has changed to admin!!!</h2>';
		}
	}
}

function change_to_subscriber() {
	global $conn;
	
	if (isset($_REQUEST['change_to_subscriber'])) {

		$user_id = mysqli_real_escape_string($conn, $_REQUEST['change_to_subscriber']);

		$sql = "UPDATE registration SET user_role = 'subscriber' WHERE `id`= '$user_id'";

		$result = $conn->query($sql);

		if (!$result) {
					
			die("Query failed" . mysqli_error($conn));

		}else {
			header("Location: all_user.php");

			// echo '<h2 class="green">User Role has changed to admin!!!</h2>';

			

			
		}
	}
}

function sidebar() {
	echo '<img src="img/close.png" id="close">
	<li id="dash_li">
		<span><img src="img/dashboard_small.png" class="dash_img"></span><a href="index.php">Dashboard</a>
	</li>

	<li id="zone_li">
		<span><img src="img/umbrella_small.png" class="umb_img"></span><a href="zone.php">Zones</a>
	</li>

	<li id="lga_li">
		<span><img src="img/lga_small.png" class="lga_img"></span><a href="lga.php">LGAs</a>
	</li>

	<li id="ward_li">
		<span><img src="img/ward_small.png" class="ward_img"></span><a href="ward.php">Wards</a>
	</li>

	<li id="polling_li">
		<span><img src="img/polling_unit_small.png" class="polling_img"></span><a href="pollingunit.php">Polling Units</a>
	</li>

	<li id="contact_li">
		<span><img src="img/contact_small.png" class="con_img"></span><a href="contact.php">Contact People</a>
	</li>
	<li id="user_li">
		<span><img src="img/user_small.png" class="con_img"></span><a>Users</a><div class="arrow_left"><img src="img/arrow_left.png" class="arr"></div>
		<div id="sub_user_holder">
			<div id="user_sub">
				<a href="all_user.php">All Users</a>
			</div>
			<div id="user_sub">
				<a href="adduser.php">Add Users</a>
			</div>
		</div>
	</li>
	<li id="contact_li">
		<span><img src="img/logout.png" class="con_img"></span><a href="logout.php">Logout</a>
	</li>
	';
}

function sidebar2() {
	echo '<img src="img/close.png" id="close">
	<li id="dash_li">
		<span><img src="img/dashboard_small.png" class="dash_img"></span><a href="index.php">Dashboard</a>
	</li>

	<li id="zone_li">
		<span><img src="img/umbrella_small.png" class="umb_img"></span><a href="zone.php">Zones</a>
	</li>

	<li id="lga_li">
		<span><img src="img/lga_small.png" class="lga_img"></span><a href="lga.php">LGAs</a>
	</li>

	<li id="ward_li">
		<span><img src="img/ward_small.png" class="ward_img"></span><a href="ward.php">Wards</a>
	</li>

	<li id="polling_li">
		<span><img src="img/polling_unit_small.png" class="polling_img"></span><a href="pollingunit.php">Polling Units</a>
	</li>
	<li id="contact_li">
		<span><img src="img/logout.png" class="con_img"></span><a href="logout.php">Logout</a>
	</li>
	';
}

function login() {
	global $conn;

	if (isset($_REQUEST['login'])) {

		$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
		$password = mysqli_real_escape_string($conn, $_REQUEST['Password']);

		$sql = "SELECT * FROM registration WHERE `email` = '$email' and `password` = '$password' LIMIT 1";

		$result = $conn->query($sql);

		if (count($result) > 0) {
			foreach ($result as $value) {
				$userid = $value['id'];
				$email_db = $value['email'];
				$user_role = $value['user_role'];

				$_SESSION['user_id'] = $userid;
				$_SESSION['email'] = $email_db;
				$_SESSION['user_role'] = $user_role;


				header("Location: admin/index.php");
			}
		}else {
			header("Location: ../index.php");
		}
	}

}


function add_zone() {
	global $conn;

	if (isset($_REQUEST['add_zone'])) {
		$zoneName = $_REQUEST['zone_name'];


	  	$sql = "INSERT INTO zone (`zone_name`) VALUES ('$zoneName')";

		$result = $conn->query($sql);

		
		if ($result) {

			echo '<div id="success">you have successfully added '.$zoneName.'</div>';
			header("Location: zone.php");

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

		<a href="?deletezoneid='.$zone_id.'">
			<div id="delete_box">
				Delete
			</div>
		</a>
		
	</article>';
			}
		}elseif ($row > 1) {?>
				<form id="zone_form" method="GET" action="">
				<input type="text" name="zonesearch" value="<?php if (isset($_GET['zonesearch'])) {echo $_GET['zonesearch'];}?>" placeholder="Search for Zones" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>zones</strong> was found</div>
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
				<a href="edit.php?editzone='.$zone_id.'">Edit</a>
			</div>
		</a>
		<a href="?deletezoneid='.$zone_id.'">
			<div id="delete_box">
				Delete
			</div>
		</a>
		
	</article>';
			}
		}

	}else {
		get_zone();
	}
}


function zonesearch_subscriber() {
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
		
	</article>';
			}
		}elseif ($row > 1) {?>
				<form id="zone_form" method="GET" action="">
				<input type="text" name="zonesearch" value="<?php if (isset($_GET['zonesearch'])) {echo $_GET['zonesearch'];}?>" placeholder="Search for Zones" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>zones</strong> was found</div>
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
		
	</article>';
			}
		}

	}else {
		get_zone_subscriber();
	}
}

function lgasearch() {
	global $conn;

	if (isset($_GET['lgasearch'])) {

		$lgasearch = $_GET['lgasearch'];
		$sql = "SELECT * FROM lga WHERE CONCAT(lga_name) LIKE '%$lgasearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="lgasearch" value="<?php if (isset($_GET['lgasearch'])) {echo $_GET['lgasearch'];}?>" placeholder="Search for LGA" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>LGA</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$lga_name = $value['lga_name'];
				$lga_id = $value['id'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'">'.$lga_name.'</a>
			</h3>
		</div>
	
		<a href="#">
			<div id="edit_box_lga_sing">
				<a href="edit.php?editlga='.$lga_id.'">Edit</a>
			</div>
		</a>

			<div id="delete_box_lga_sing" data-id="'.$lga_id.'">
				Delete
			</div>
	</article>';
			}
		}elseif ($row > 1) {?>
				<form id="zone_form" method="GET" action="">
				<input type="text" name="lgasearch" value="<?php if (isset($_GET['lgasearch'])) {echo $_GET['lgasearch'];}?>" placeholder="Search for LGA" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>LGA's</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$lga_name = $value['lga_name'];
				$lga_id = $value['id'];
			
		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'">'.$lga_name.'</a>
			</h3>
		</div>
	
		<a href="#">
			<div id="edit_box_lga_sing">
				<a href="edit.php?editlga='.$lga_id.'">Edit</a>
			</div>
		</a>

			<div id="delete_box_lga_sing" data-id="'.$lga_id.'">
				Delete
			</div>
	</article>';
			}
		}

	}else {
		get_lga_children_single();
	}
}

function lgasearch_subscriber() {
	global $conn;

	if (isset($_GET['lgasearch'])) {

		$lgasearch = $_GET['lgasearch'];
		$sql = "SELECT * FROM lga WHERE CONCAT(lga_name) LIKE '%$lgasearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="lgasearch" value="<?php if (isset($_GET['lgasearch'])) {echo $_GET['lgasearch'];}?>" placeholder="Search for LGA" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>LGA</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$lga_name = $value['lga_name'];
				$lga_id = $value['id'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'">'.$lga_name.'</a>
			</h3>
		</div>
	</article>';
			}
		}elseif ($row > 1) {?>
				<form id="zone_form" method="GET" action="">
				<input type="text" name="lgasearch" value="<?php if (isset($_GET['lgasearch'])) {echo $_GET['lgasearch'];}?>" placeholder="Search for LGA" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>LGA's</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$lga_name = $value['lga_name'];
				$lga_id = $value['id'];
			
		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'">'.$lga_name.'</a>
			</h3>
		</div>
	</article>';
			}
		}

	}else {
		get_lga_children_single_subscriber();
	}
}

function wardsearch() {
	global $conn;

	if (isset($_GET['wardsearch'])) {

		$wardsearch = $_GET['wardsearch'];
		$sql = "SELECT * FROM ward WHERE CONCAT(ward_name) LIKE '%$wardsearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="wardsearch" value="<?php if (isset($_GET['wardsearch'])) {echo $_GET['wardsearch'];}?>" placeholder="Search for WARD" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>WARD</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$ward_name = $value['ward_name'];
				$ward_id = $value['id'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>

		<a href="#">
			<div id="edit_box_lga_sing">
				<a href="edit.php?editward='.$ward_id.'">Edit</a>
			</div>
		</a>
			<div id="delete_box_ward_sing" data-id="'.$ward_id.'">
				Delete
			</div>
	</article>';
			}
		}elseif ($row > 1) {?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="wardsearch" value="<?php if (isset($_GET['wardsearch'])) {echo $_GET['wardsearch'];}?>" placeholder="Search for WARD" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>WARDS</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$ward_name = $value['ward_name'];
				$ward_id = $value['id'];
			
		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>

		<a href="#">
			<div id="edit_box_lga_sing">
				<a href="edit.php?editward='.$ward_id.'">Edit</a>
			</div>
		</a>
			<div id="delete_box_ward_sing" data-id="'.$ward_id.'">
				Delete
			</div>
	</article>';
			}
		}

	}else {
		get_ward_children_single();
	}
}

function wardsearch_subscribe() {
	global $conn;

	if (isset($_GET['wardsearch'])) {

		$wardsearch = $_GET['wardsearch'];
		$sql = "SELECT * FROM ward WHERE CONCAT(ward_name) LIKE '%$wardsearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="wardsearch" value="<?php if (isset($_GET['wardsearch'])) {echo $_GET['wardsearch'];}?>" placeholder="Search for WARD" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>WARD</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$ward_name = $value['ward_name'];
				$ward_id = $value['id'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>

	</article>';
			}
		}elseif ($row > 1) {?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="wardsearch" value="<?php if (isset($_GET['wardsearch'])) {echo $_GET['wardsearch'];}?>" placeholder="Search for WARD" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>WARDS</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$ward_name = $value['ward_name'];
				$ward_id = $value['id'];
			
		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>

	</article>';
			}
		}

	}else {
		get_ward_children_single_subscribe();
	}
}

function pollingUnitsearch() {
	global $conn;

	if (isset($_GET['pollingsearch'])) {

		$pollingsearch = $_GET['pollingsearch'];
		$sql = "SELECT * FROM pollingunit WHERE CONCAT(pollingunit_name) LIKE '%$pollingsearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="pollingsearch" value="<?php if (isset($_GET['pollingsearch'])) {echo $_GET['pollingsearch'];}?>" placeholder="Search for POLLING UNIT" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>POLLING UNIT</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$pollingunit_name = $value['pollingunit_name'];
				$pollingunit_id = $value['id'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>
		
		<a href="#">
			<div id="edit_box_lga_sing">
				<a href="edit.php?editpollingunit='.$pollingunit_id.'">Edit</a>
			</div>
		</a>

			<div id="delete_box_polling_sing" data-id="'.$pollingunit_id.'">
				Delete
			</div>
	</article>';
			}
		}elseif ($row > 1) {?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="pollingsearch" value="<?php if (isset($_GET['pollingsearch'])) {echo $_GET['pollingsearch'];}?>" placeholder="Search for POLLING UNIT" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>POLLING UNITS</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$pollingunit_name = $value['pollingunit_name'];
				$pollingunit_id = $value['id'];
			
		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>
		
		<a href="#">
			<div id="edit_box_lga_sing">
				<a href="edit.php?editpollingunit='.$pollingunit_id.'">Edit</a>
			</div>
		</a>

			<div id="delete_box_polling_sing" data-id="'.$pollingunit_id.'">
				Delete
			</div>
	</article>';
			}
		}

	}else {
		get_polling_unit_children_single();
	}
}

function pollingUnitsearch_subscribe() {
	global $conn;

	if (isset($_GET['pollingsearch'])) {

		$pollingsearch = $_GET['pollingsearch'];
		$sql = "SELECT * FROM pollingunit WHERE CONCAT(pollingunit_name) LIKE '%$pollingsearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {
			?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="pollingsearch" value="<?php if (isset($_GET['pollingsearch'])) {echo $_GET['pollingsearch'];}?>" placeholder="Search for POLLING UNIT" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?><strong>POLLING UNIT</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$pollingunit_name = $value['pollingunit_name'];
				$pollingunit_id = $value['id'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>
		
	</article>';
			}
		}elseif ($row > 1) {?>
			<form id="zone_form" method="GET" action="">
				<input type="text" name="pollingsearch" value="<?php if (isset($_GET['pollingsearch'])) {echo $_GET['pollingsearch'];}?>" placeholder="Search for POLLING UNIT" required="">
				<button type="submit">Search</button>
			</form>

			<div id="zonesearch_result"><?php echo $row; ?> <strong>POLLING UNITS</strong> was found</div>
			<?php
			foreach ($result as  $value) {
				$pollingunit_name = $value['pollingunit_name'];
				$pollingunit_id = $value['id'];
			
		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>
	</article>';
			}
		}

	}else {
		get_polling_unit_children_single_subscribe();
	}
}

function deletezone(){
	global $conn;

	if (isset($_REQUEST['deletezoneid'])) {

		$id = $_REQUEST['deletezoneid'];
		$sql = "DELETE  FROM zone WHERE `id` = $id";
		$result = $conn->query($sql);
		header("Location: zone.php");
	}
}

function deletelga(){
	global $conn;

	if (isset($_REQUEST['deletelgaid'])) {

		$id = $_REQUEST['deletelgaid'];
		$sql = "DELETE  FROM lga WHERE `id` = $id";
		$result = $conn->query($sql);
		header("Location: lga.php");
	}
}

function deleteward(){
	global $conn;

	if (isset($_REQUEST['deletewardid'])) {

		$id = $_REQUEST['deletewardid'];
		$sql = "DELETE  FROM ward WHERE `id` = $id";
		$result = $conn->query($sql);
		header("Location: ward.php");
	}
}

function deletepollingunit(){
	global $conn;

	if (isset($_REQUEST['deletepollingid'])) {

		$id = $_REQUEST['deletepollingid'];
		$sql = "DELETE  FROM pollingunit WHERE `id` = $id";
		$result = $conn->query($sql);
		header("Location: pollingunit.php");
	}
}

function contactsearch() {
	global $conn;

	if (isset($_GET['contactsearch'])) {

		$contactsearch = $_GET['contactsearch'];
		$sql = "SELECT * FROM contact WHERE CONCAT(lga,fullname,phonenumber,zone,ward,grouporg,positionoffice,delegateposition,checkboxdelegate) LIKE '%$contactsearch%'";
		$result = $conn->query($sql);

		$row = mysqli_num_rows($result);

		if ($row > 0 && $row ==1) {?>
		
	<form id="contact_form" method="GET" action="">
			<input type="text" name="contactsearch" value="<?php if (isset($_GET['contactsearch'])) {echo $_GET['contactsearch'];}?>" placeholder="Search for Contacts" required="">
			<button type="submit">Search</button>
	</form>

	<div id="search_result"><?php if (isset($_GET['contactsearch'])) {echo $row;}?> <strong style="text-transform: uppercase;">Contact</strong> was found</div>

	<form id="all_contact_form" method="POST" action="sms.php">
		<label class="group_action">Group Action:</label>
		<input type="button" name="" id="selectall" value="Select All" >
		<button type="submit" name="process" class="sendsms">Send SMS</button><br><br>


		<?Php 
			
			foreach ($result as $value) {
				$id = $value['id'];
				$fullname = $value['fullname'];
				$phonenumber = $value['phonenumber'];
				$positionoffice = $value['positionoffice'];
				$delegateposition = $value['delegateposition'];
				$lga = $value['lga'];
				?>

		
		<div id="checkbox_container">
			<div class="checkbox"><input type="checkbox" name="smsvalue[]" class="checkb" value="<?php echo "$phonenumber";?>"></div>
			<div class="contact_name"><span class="contact_txt"><?php echo "$fullname" ; ?><span><span class="num"> | <img src=""><?php echo "$phonenumber";  ?></span></div>
			<div class="contact_rank">[<?php echo "$delegateposition";  ?>][<?php echo "$lga";  ?>LGA]</div>
			<div class="edit_btn"><?php echo '<a href="editcontact.php?id='.$id.'">Edit</a>'; ?></div>
			<div class="delete_btn"><?php echo '<a href="editcontact.php?deleteid='.$id.'">Delete</a>'; ?></div>
		</div><?php
			}
			echo "</form>";
		}elseif ($row > 1) {?>
			<form id="contact_form" method="GET" action="">
			<input type="text" name="contactsearch" value="<?php if (isset($_GET['contactsearch'])) {echo $_GET['contactsearch'];}?>" placeholder="Search for Contacts" required="">
			<button type="submit">Search</button>
	</form>

	<div id="search_result"><?php if (isset($_GET['contactsearch'])) {echo $row;}?> <strong style="text-transform: uppercase;">Contacts</strong> was found</div>

	<form id="all_contact_form" method="POST" action="sms.php">
		<label class="group_action">Group Action:</label>
		<input type="button" name="" id="selectall" value="Select All" >
		<button type="submit" name="process" class="sendsms">Send SMS</button><br><br>


		<?Php 
			
			foreach ($result as $value) {
				$id = $value['id'];
				$fullname = $value['fullname'];
				$phonenumber = $value['phonenumber'];
				$positionoffice = $value['positionoffice'];
				$delegateposition = $value['delegateposition'];
				$lga = $value['lga'];
				?>

		
		<div id="checkbox_container">
			<div class="checkbox"><input type="checkbox" name="smsvalue[]" class="checkb" value="<?php echo "$phonenumber";?>"></div>
			<div class="contact_name"><span class="contact_txt"><?php echo "$fullname" ; ?><span><span class="num"> | <img src=""><?php echo "$phonenumber";  ?></span></div>
			<div class="contact_rank">[<?php echo "$delegateposition";  ?>][<?php echo "$lga";  ?>LGA]</div>
			<div class="edit_btn"><?php echo '<a href="editcontact.php?id='.$id.'">Edit</a>'; ?></div>
			<div class="delete_btn"><?php echo '<a href="editcontact.php?deleteid='.$id.'">Delete</a>'; ?></div>
		</div><?php
			}
			echo "</form>";
		}


	}else {
		get_contact();
	}
}

function get_contact() {
	global $conn;

	$sql = "SELECT * FROM contact order by id desc";
	$result = $conn->query($sql);

	?>

	<form id="contact_form" method="GET" action="">
			<input type="text" name="contactsearch" value="<?php if (isset($_GET['contactsearch'])) {echo $_GET['contactsearch'];}?>" placeholder="Search for Contacts" required="">
			<button type="submit">Search</button>
	</form>

	<form id="all_contact_form" method="POST" action="sms.php">
		<label class="group_action">Group Action:</label>
		<input type="button" name="" id="selectall" value="Select All" >
		<input type="button" name="" id="unselectall" value="Unselect All" >
		<button type="submit" name="process" class="sendsms">Send SMS</button><br><br>

	<?php

	foreach ($result as $value) {

		$id = $value['id'];
		$fullname = $value['fullname'];
		$phonenumber = $value['phonenumber'];
		$positionoffice = $value['positionoffice'];
		$delegateposition = $value['delegateposition'];
		$lga = $value['lga'];

		?>
		<div id="checkbox_container">
			<div class="checkbox"><input type="checkbox" name="smsvalue[]" class="checkb" value="<?php echo "$phonenumber";?>"></div>
			<div class="contact_name"><span class="contact_txt"><?php echo "$fullname" ; ?></span><span class="num"> | <img src=""><?php echo "$phonenumber";  ?></span></div>
			<div class="contact_rank">[<?php echo "$delegateposition";  ?>][<?php echo "$lga";  ?>LGA]</div>
			<div class="edit_btn"><?php echo '<a href="editcontact.php?id='.$id.'">Edit</a>'; ?></div>
			<div class="delete_btn"><?php echo '<a href="editcontact.php?deleteid='.$id.'">Delete</a>'; ?></div>
		</div><?php
	}
	echo "</form>";
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

		echo '<option value="'.$id.'">'.$lga_name.'</option>';
	}
}
function get_all_ward() {
	global $conn;

	$sql = "SELECT * FROM ward";
	$result = $conn->query($sql);

	foreach ($result as $value) {
		$id = $value['id'];
		$ward_name = $value['ward_name'];

		echo '<option value="'.$id.'">'.$ward_name.'</option>';
	}
}

function addContact() {
	global $conn;

	if (isset($_REQUEST['addcontact'])) {
		
		$FullName = $_REQUEST['FullName'];
		$phonenumber = $_REQUEST['phonenumber'];
		$wardid = $_REQUEST['ward'];
		$lgaid = $_REQUEST['lga'];
		$pollingid = $_REQUEST['polling'];
		$zoneid = $_REQUEST['zone'];
		$groupOrg = $_REQUEST['groupOrg'];
		$positionOffice = $_REQUEST['positionOffice'];
		$DelegatePosition = $_REQUEST['DelegatePosition'];
		$voters_card_number = $_REQUEST['votenumber'];
		$checkboxdelegate = (isset($_REQUEST['checkboxdelegate'])) ? $_REQUEST['checkboxdelegate'] : '';

		$sql2 = "SELECT * FROM zone WHERE `id` = '$zoneid'";
		$result2 = $conn->query($sql2);
		foreach ($result2 as $value2) {
			$zone = $value2['zone_name'];
		}

		$sql3 = "SELECT * FROM lga WHERE `id` = '$lgaid'";
		$result3 = $conn->query($sql3);
		foreach ($result3 as $value3) {
			$lga = $value3['lga_name'];
		}

		$sql4 = "SELECT * FROM ward WHERE `id` = '$wardid'";
		$result4 = $conn->query($sql4);
		foreach ($result4 as $value4) {
			$ward = $value4['ward_name'];
		}

		$sql5 = "SELECT * FROM pollingunit WHERE `id` = '$pollingid'";
		$result5 = $conn->query($sql5);
		foreach ($result5 as $value5) {
			$polling = $value5['pollingunit_name'];
		}

		if (!empty($checkboxdelegate)) {
			$sql = "INSERT INTO contact (`fullname`, `phonenumber`, `ward`, `lga`, `zone`, `pollingunit`,`grouporg`, `positionoffice`, `delegateposition`, `checkboxdelegate`, `voters_card_number`) VALUES ('$FullName', '$phonenumber', '$ward', '$lga', '$zone', '$polling', '$groupOrg', '$positionOffice', '$DelegatePosition', '$checkboxdelegate', '$voters_card_number')";
		}else{
			$sql = "INSERT INTO contact (`fullname`, `phonenumber`, `ward`, `lga`, `zone`, `pollingunit`, `grouporg`, `positionoffice`, `voters_card_number`, `delegateposition`, `checkboxdelegate`) VALUES ('$FullName', '$phonenumber', '$ward', '$lga', '$zone', '$polling', '$groupOrg', '$positionOffice', '$voters_card_number', '', '')";
		}

		$result = $conn->query($sql);

		if ($result) {
			echo 'inserted';
			header("Location: contact.php");
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

		echo '<option value="'.$id.'">'.$zone_name.'</option>';
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
			header("Location: zone.php");
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
			header("Location: ward.php");
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
			<input type="hidden" name="lgaid" value="'.$lgaid.'"><br><br>
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
			header("Location: pollingunit.php");
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
				header("Location: zone.php");
				}else{
					echo "Could not update zone, error somewhere";
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
				header("Location: lga.php");
				}else{
					echo 'Could not update LGA, error somewhere';
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
				header("Location: ward.php");
				}else{
					echo "Could not update ward, error is somewhere";
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
				header("Location: pollingunit.php");
				}else{
					echo "Could not update Polling Unit, there is error somewhere";
				}

			}
		}
	}
}
function add_zone_form() {
	echo '<form method="POST" enctype="multipart/form-data">

			<input type="text" name="zone_name" placeholder="Add Zone" required><br><br>
			<button type="submit" name="add_zone">Add Zone</button>
			
		
		</form>';
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
			<div id="delete_box" data-id="'.$zone_id.'">
				Delete
			</div>
		
		
	</article>';

	}
}

function get_zone_subscriber() {
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
		
	</article>';

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

function get_lga_children_subscriber() {
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
			
	</article>';

		}
	}

	
}


function get_lga_children_single() {
	global $conn;

		$sql = "SELECT * FROM lga order by id asc";
		$result = $conn->query($sql);?>

		<form id="zone_form" method="GET" action="">
			<input type="text" name="lgasearch" value="<?php if (isset($_GET['lgasearch'])) {echo $_GET['lgasearch'];}?>" placeholder="Search for LGA" required="">
			<button type="submit">Search</button>
		</form>

		<?php

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
			<div id="edit_box_lga_sing">
				<a href="edit.php?editlga='.$lga_id.'">Edit</a>
			</div>
		</a>

			<div id="delete_box_lga_sing" data-id="'.$lga_id.'">
				Delete
			</div>
	</article>';

		}

	
}

function get_lga_children_single_subscriber() {
	global $conn;

		$sql = "SELECT * FROM lga order by id asc";
		$result = $conn->query($sql);?>

		<form id="zone_form" method="GET" action="">
			<input type="text" name="lgasearch" value="<?php if (isset($_GET['lgasearch'])) {echo $_GET['lgasearch'];}?>" placeholder="Search for LGA" required="">
			<button type="submit">Search</button>
		</form>

		<?php

		foreach ($result as $value) {
		$lga_id = $value['id'];
		$lga_name = $value['lga_name'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_ward_page.php?lgaid='.$lga_id.'">'.$lga_name.'</a>
			</h3>
		</div>
	
	</article>';

		}

	
}
function get_ward_children_single() {
	global $conn;


		$sql = "SELECT * FROM ward order by id asc";
		$result = $conn->query($sql);?>

		<form id="zone_form" method="GET" action="">
			<input type="text" name="wardsearch" value="<?php if (isset($_GET['wardsearch'])) {echo $_GET['wardsearch'];}?>" placeholder="Search for WARD" required="">
			<button type="submit">Search</button>
		</form>
		<?php

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
			<div id="edit_box_lga_sing">
				<a href="edit.php?editward='.$ward_id.'">Edit</a>
			</div>
		</a>
			<div id="delete_box_ward_sing" data-id="'.$ward_id.'">
				Delete
			</div>
	</article>';

		}

	
}

function get_ward_children_single_subscribe() {
	global $conn;


		$sql = "SELECT * FROM ward order by id asc";
		$result = $conn->query($sql);?>

		<form id="zone_form" method="GET" action="">
			<input type="text" name="wardsearch" value="<?php if (isset($_GET['wardsearch'])) {echo $_GET['wardsearch'];}?>" placeholder="Search for WARD" required="">
			<button type="submit">Search</button>
		</form>
		<?php

		foreach ($result as $value) {
		$ward_id = $value['id'];
		$ward_name = $value['ward_name'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="single_polling_page.php?wardid='.$ward_id.'">'.$ward_name.'</a>
			</h3>
		</div>
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

function get_ward_children_subscriber() {
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

function get_polling_unit_children_subscriber() {
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

	</article>';

		}
	}

	
}

function get_polling_unit_children_single() {
	global $conn;

		$sql = "SELECT * FROM pollingunit order by id asc";
		$result = $conn->query($sql);?>
		<form id="zone_form" method="GET" action="">
				<input type="text" name="pollingsearch" value="<?php if (isset($_GET['pollingsearch'])) {echo $_GET['pollingsearch'];}?>" placeholder="Search for POLLING UNIT" required="">
				<button type="submit">Search</button>
			</form>
			<?php

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
			<div id="edit_box_lga_sing">
				<a href="edit.php?editpollingunit='.$pollingunit_id.'">Edit</a>
			</div>
		</a>

			<div id="delete_box_polling_sing" data-id="'.$pollingunit_id.'">
				Delete
			</div>
	</article>';

		}

	
}

function get_polling_unit_children_single_subscribe() {
	global $conn;

		$sql = "SELECT * FROM pollingunit order by id asc";
		$result = $conn->query($sql);?>
		<form id="zone_form" method="GET" action="">
				<input type="text" name="pollingsearch" value="<?php if (isset($_GET['pollingsearch'])) {echo $_GET['pollingsearch'];}?>" placeholder="Search for POLLING UNIT" required="">
				<button type="submit">Search</button>
			</form>
			<?php

		foreach ($result as $value) {
		$pollingunit_id = $value['id'];
		$pollingunit_name = $value['pollingunit_name'];

		echo '<article id="lga_1_single">
		<div id="lga_header">
			<h3>
				<a href="#">'.$pollingunit_name.'</a>
			</h3>
		</div>
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