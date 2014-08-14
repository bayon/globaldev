<?php

function appConnectPDO() {
	//echo('appConnectPDO:'.HOSTNAME);
	$hostname = HOST_DB;
	$username = USERNAME;
	$password = PASSWORD;
	$db = APP_DB;
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	return $dbh;
	// TO CLOSE USE: //$dbh = null;
}
function appConnectPDO_db($db) {
	$hostname = HOST_DB;
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