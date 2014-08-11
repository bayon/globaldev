<?php

function connectPDO() {
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=tickets", $username, $password);
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	return $dbh;
	// TO CLOSE USE: //$dbh = null;
}
function connectPDO_db($db) {
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	return $dbh;
	// TO CLOSE USE: //$dbh = null;
}
?>