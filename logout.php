<?php ob_start(); ?>
<?php require_once("inc/session.php"); ?>
<?php require_once("inc/functions.php"); ?>

<!-- if logged in with email, end session and redirect -->
<?php
	// v1: simple logout
	// session_start();
	$_SESSION["user_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("index.php");
?>




<?php
	// v2: destroy session
	// assumes nothing else in session to keep
	// session_start();
	// $_SESSION = array();
	// if (isset($_COOKIE[session_name()])) {
	//   setcookie(session_name(), '', time()-42000, '/');
	// }
	// session_destroy(); 
	// redirect_to("login.php");
?>
