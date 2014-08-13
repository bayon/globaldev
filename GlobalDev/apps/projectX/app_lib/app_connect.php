<?php

function appConnectPDO() {
	//echo('appConnectPDO:'.HOSTNAME);
	$hostname = HOSTNAME;
	$username = USERNAME;
	$password = PASSWORD;
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=globaldev", $username, $password);
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	return $dbh;
	// TO CLOSE USE: //$dbh = null;
}
function appConnectPDO_db($db) {
	$hostname = HOSTNAME;
	$username = USERNAME;
	$password = PASSWORD;
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	return $dbh;
	// TO CLOSE USE: //$dbh = null;
}
?>