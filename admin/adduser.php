<?php
	include './include/header.php';
?>

<section id="container">
	<div id="dash_con">
		<h1>
			ADD USER
		</h1>

	</div>
	<?php adduser(); ?>
	<div id="form_holder">
		
			<form id="adduser_form" method="POST" enctype="multipart/form-data">
				<label>First name</label><br><br>
				<input type="text" name="firstname"><br><br><br>

				<label>Last name</label><br><br>
				<input type="text" name="lastname"><br><br><br>

				<select name="user_role" required>
					<option value="admin">Admin</option>
					<option value="subscriber">Subscriber</option>
				</select><br><br><br>

				<label>Username</label><br><br>
				<input type="text" name="username"><br><br><br>

				<label>Email</label><br><br>
				<input type="email" name="email" required><br><br><br>

				<label>Password</label><br><br>
				<input type="Password" name="password" required><br><br><br>

				<label>Confirm Password</label><br><br>
				<input type="Password" name="password2" required><br><br><br>

	
				<button type="submit" name="adduser">ADD USER</button><br>

			</form>
		</div>
	
	
</section>




<script src='js/jquery.js'></script>
<script src='js/script.js'></script>

</body>
</html>