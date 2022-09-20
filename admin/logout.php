<?php
	session_start();
?>


<?php
$_SESSION['user_id'] = null;
$_SESSION['email'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");

?>