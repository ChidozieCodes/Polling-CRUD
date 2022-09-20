<?php include 'include/head.php'; ?>

<section id="content">
	<div class="section">
		<form id="userlogin" method="POST" enctype="multipart/form-data">
			<span class="sign_in_txt">Sign In</span><br><br><br>
			<input type="email" name="email" placeholder="Your Email" required><br><br>
			<input type="Password" name="Password" placeholder="Your Password" required id="login_pass"><br>
			<input type="checkbox"  id="chekbx" onclick="myFunction()"><span class="shwpass">Show Password</span><br><br>
			<button type="submit" name="login">Login</button>
			<!-- <p id="new_account">Don't have an account? <a href="register.php" target="_blank">Register</a></p> -->
			<?php login(); ?>
		</form>
	</div>
</section>
<footer>
	<div id="copywrite">&#169; Copyright 2022, Hon George Ozodinobi Campaign Database DEMO All Rights Reserved, Developed by <a href="www.facebook.com/sincoworld1">SINCOPEDIA</a></div>
</footer>

<script src="js/script.js"></script>
</body>
</html>