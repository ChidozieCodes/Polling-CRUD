<?php include 'include/head.php'; ?>

<?php register(); ?>

<form id="reg_container" method="POST" enctype="multipart/form-data">
	<span id="sign_up">Sign Up</span><br><br>
	<input type="text" name="firstname" placeholder="First Name" required><br><br>
	<input type="text" name="lastname" placeholder="Last Name" required><br><br>
	<input type="text" name="username" placeholder="User Name" required><br><br>
	<input type="email" name="email" placeholder="Email" required><br><br>
	<input type="password" name="password" placeholder="Password" required><br><br>
	<input type="password" name="password2" placeholder="Confirm Password" required><br><br>
	<button type="submit" name="register">Register</button>
</form>
<footer></footer>
<script src="js/script.js"></script>
</body>
</html>