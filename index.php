<?php
	session_start();
	$_SESSION['loggedIn'] = false;
	header('Location: home.php');

	exit;
?>
Something is wrong with the WebSite :(

