<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1>
		EDIT USER
		</h1>

	</div>
	<?php

		if (isset($_GET['edit'])) {
			global $conn;
				
			$user_id = $_GET['edit'];

			$sql = "SELECT * FROM registration WHERE `id` = '$user_id'";
			$result = $conn->query($sql);

			if (!$result) {

				die("Query failed" . mysqli_error($conn));
			}

			foreach ($result as $value) {
				$user_id = $value['id'];
				$firstname = $value['firstname'];
				$lastname = $value['lastname'];
				$username = $value['username'];
				$password = $value['password'];
				$ConfirmPassword = $value['password2'];
				$email = $value['email'];
			}
		}


		?>

		<div id="form_holder">
			<form id="adduser_form" method="POST" enctype="multipart/form-data">
				<?php update_user(); ?><br>
				<label>First name</label><br><br>
				<input type="text" name="firstname" value="<?php echo $firstname;?>"><br><br><br>

				<label>Last name</label><br><br>
				<input type="text" name="lastname" value="<?php echo $lastname;?>"><br><br><br>

				<select name="user_role">
					<option value="admin">Admin</option>
					<option value="subscriber">Subscriber</option>
				</select><br><br><br>

				<label>Username</label><br><br>
				<input type="text" name="username" value="<?php echo $username;?>"><br><br><br>

				<label>Email</label><br><br>
				<input type="text" name="email" value="<?php echo $email;?>"><br><br><br>

				<label>Password</label><br><br>
				<input type="Password" name="password" value="<?php echo $password;?>"><br><br><br>

				<label>Confirm Password</label><br><br>
				<input type="Password" name="password2" value="<?php echo $ConfirmPassword;?>"><br><br><br>

	
				<button type="submit" name="updateuser">Update User</button><br>

			</form>
		</div>

	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>

</body>
</html>