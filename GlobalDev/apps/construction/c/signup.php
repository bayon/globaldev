<?php
$user = new User("", sanitize($_POST['username']), sanitize($_POST['password']));
$userVerificationResult = signin($user);
include_once ('v/default_view.php');
?>