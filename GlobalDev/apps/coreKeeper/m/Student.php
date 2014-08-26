<?php
class Student {
	public $student_id;
	public $firstName;
	public $middleName;
	public $lastName;
	public $email;
	public $phone;

	public function __construct($student_id = "0", $firstName = "default",$middleName="",$lastName="",$email="",$phone="") {
		$this -> student_id = $student_id;
		$this -> firstName = $firstName;
		$this -> middleName = $middleName;
		$this -> lastName = $lastName;
		$this -> email = $email;
		$this -> phone = $phone;

	}

	//getters and setters with "underscores". easier for find/replace
	function set_student_id($id) {
		$this -> student_id = $id;
	}

	function get_student_id() {
		return $this -> student_id;
	}

	function set_firstName($firstName) {
		$this -> firstName = $firstName;
	}

	function get_firstName() {
		return $this -> firstName;
	}
	 
	function set_middleName($middleName) {
		$this -> middleName = $middleName;
	}

	function get_middleName() {
		return $this -> middleName;
	}
	
	function set_lastName($lastName) {
		$this -> lastName = $lastName;
	}

	function get_lastName() {
		return $this -> lastName;
	}
	
	function set_email($email) {
		$this -> email = $email;
	}

	function get_email() {
		return $this -> email;
	}
	
	function set_phone($phone) {
		$this -> phone = $phone;
	}

	function get_phone() {
		return $this -> phone;
	}

}
function createStudent($student) {
	$dbh = appConnectPDO();
	$sql = "INSERT INTO ".APP_DB.".student (student_id,firstName) VALUES ('NULL','" . $student -> firstName . "' )";
	$dbh -> query($sql);
	$dbh = null;
}

function getAllStudents() {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM " . APP_DB . ".student ;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function getStudentWithId($id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM " . APP_DB . ".student 
 WHERE student_id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$student = new student($data[0]['student_id'], $data[0]['firstName']);
	return $student;
}

function updateStudentWithId($id) {
	$dbh = appConnectPDO();
	$firstName = sanitize($_POST['firstName']);
	$password = sanitize($_POST['password']);
	$sql = "UPDATE " . APP_DB . ".student set firstName = '$firstName', password = '$password' WHERE student_id = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deleteStudentWithId($student_id) {
	$dbh = appConnectPDO();
	$sql = "DELETE FROM  " . APP_DB . ".student  WHERE student_id = $student_id ;";
	// function appConnectPDO
	$dbh -> query($sql);
	$dbh = null;
}

function searchStudentsForKeyword($keyword) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM " . APP_DB . ".student WHERE 
	(firstName LIKE  '%" . $keyword . "%'  ) 
	OR
	(password LIKE  '%" . $keyword . "%'   )
	 ORDER BY  firstName ";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}
?>