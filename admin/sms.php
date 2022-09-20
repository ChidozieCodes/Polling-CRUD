
<?php
	include './include/header.php';

	if (isset($_POST['process'])) {
		$sms_numbers = $_POST['smsvalue'];

		$var = "";

		foreach ($sms_numbers as $value) {
			$var .= $value .",";
		}
	}
?>
<section id="container">
	<header id="sms_header">SEND SMS</header>
	<div id="send_sms_container">
		<div id="send_sms_green"></div>

		<form id="send_sms_form">
			<aside>
				<div id="recipient_number">Recipients Numbers</div>
				<div id="recipient_message">Message</div>
			</aside>
			<main>
				<input type="text" name="numbers" value="<?php  echo $var;?>"><br>
				<textarea name="txtmessage" placeholder="Type SMS text here"></textarea>
				<button type="submit" name="send_message">Send Message</button>
			</main>
		</form>
		
	</div>
	
</section>
<script src='js/jquery.js'></script>
<script src='js/script.js'></script>
</body>
</html>