<?php
$user = new User("", sanitize($_POST['username']), sanitize($_POST['password']));
$userVerificationResult = login($user);
if ($userVerificationResult -> user_id != 0) {
	echo("VERIFIED");
	$user -> setUser_id($userVerificationResult -> user_id);
	include_once ('v/home.php');
} else {
	echo("<script> alert('UN-VERIFIED'); </script>");
	include_once ('v/default_view.php');
}
?>