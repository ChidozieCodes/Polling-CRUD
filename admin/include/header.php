<?php
	include 'function.php';
?>
<?php 
	
	if (!isset($_SESSION['email'])) {
		
		header("Location: ../index.php");
	 }

	$user_role = $_SESSION['user_role'];
 ?> 

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/sinco.css">
    <link rel="stylesheet" type="text/css" href="css/zone.css">
    <link rel="stylesheet" type="text/css" href="css/lga.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="css/sms.css">
	<link rel="stylesheet" type="text/css" href="css/mediaquery.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta charset="utf-8">
</head>
<body>
<div id="modal_container">
	<div id="modal">
	</div>
</div>
<header id="menu">
	<!-- <a href="index.php"><div id="logo_name"><img src="img/pdp.png"></div></a> -->
	<a href="index.php"><div id="logo_name">
		<div id="logo_1">HON.</div>
		<div id="logo_2">GEORGE IBEZIMAKO</div>
		<div id="logo_3">OZODINOBI</div>
	</div></a>
	<div id="hamburger"><img src="img/hamb.png" class="hamburg_img"></div>
</header>
<aside id="sidebar">
	<?php 
		if ($_SESSION['user_role'] === 'admin') {
			sidebar(); 
		}else{
			sidebar2(); 
		}
	?>
</aside>
