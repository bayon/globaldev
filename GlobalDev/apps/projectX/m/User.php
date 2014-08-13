<?php
class User {
	public $user_id;
	public $username;
	public $password;
	public $email;

	public function __construct($user_id = "0", $username = "default", $password = "default", $email = "default") {
		$this -> user_id = $user_id;
		$this -> username = $username;
		$this -> password = $password;
		$this -> email = $email;
	}

	function setUser_id($id) {
		$this -> user_id = $id;
	}

	function getUser_id() {
		return $this -> user_id;
	}

	function setUsername($username) {
		$this -> username = $username;
	}

	function getUsername() {
		return $this -> username;
	}

	function setPassword($password) {
		$this -> password = $password;
	}

	function getPassword() {
		return $this -> password;
	}

	function setEmail($email) {
		$this -> email = $email;
	}

	function getEmail() {
		return $this -> email;
	}
}

function getUserWithId($id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM `globaldev`.`user` 
 WHERE user_id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$user = new User($data[0]['user_id'], $data[0]['username'], $data[0]['password']);
	return $user;
}

function login($user) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM `globaldev`.`user` 
 WHERE username = '" . $user -> username . "'  AND password = '" . $user -> password . "'";

	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}

	try {
		$user = new User($data[0]['user_id'], $data[0]['username'], $data[0]['password']);
	} catch(Exception $e) {
		$user = new User(0, "0", "0");
	}
	$dbh = null;

	return $user;
}

function signin($user) {
	$dbh = appConnectPDO();
	$sql = "INSERT INTO `globaldev`.`user` (user_id,username,password) VALUES ('NULL','" . $user -> username . "','" . $user -> password . "')";
	$dbh -> query($sql);
	$dbh = null;
}

function getAllUsers() {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM `globaldev`.`user` ;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function searchUsersForKeyword($keyword) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM globaldev.user WHERE 
	(`username` LIKE  '%" . $keyword . "%'  ) 
	OR
	(`password` LIKE  '%" . $keyword . "%'   )
	 ORDER BY  username ";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function updateUserWithId($id) {
	$dbh = appConnectPDO();
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	$sql = "UPDATE `globaldev`.`user` set `username` = '$username', `password` = '$password' WHERE `user_id` = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deleteUserWithId($user_id) {
	$dbh = appConnectPDO();
	$sql = "DELETE FROM  `globaldev`.`user`  WHERE `user_id` = $user_id ;"; // function appConnectPDO
	$dbh -> query($sql);
	$dbh = null;
}
?>