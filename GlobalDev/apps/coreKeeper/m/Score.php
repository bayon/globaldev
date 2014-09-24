<?php
class Score {
	public $id;
	public $user_id;
	public $student_id;
	public $code;
	public $score;
	public $attach_id;
	public $notes;
	public $date_created;

	public function __construct($id = "0", $user_id = "default", $student_id = "default", $code = "default", $score = "default", $attach_id = "default", $notes = "default", $date_created = "default") {
		$this -> id = $id;
		$this -> user_id = $user_id;
		$this -> student_id = $student_id;
		$this -> code = $code;
		$this -> score = $score;
		$this -> attach_id = $attach_id;
		$this -> notes = $notes;
		$this -> date_created = $date_created;

	}

	//getters and setters with "underscores". easier for find/replace
	function set_id($id) {
		$this -> id = $id;
	}

	function get_id() {
		return $this -> id;
	}

	function set_user_id($user_id) {
		$this -> user_id = $user_id;
	}

	function get_user_id() {
		return $this -> user_id;
	}

	function set_student_id($student_id) {
		$this -> student_id = $student_id;
	}

	function get_student_id() {
		return $this -> student_id;
	}

	function set_code($code) {
		$this -> code = $code;
	}

	function get_code() {
		return $this -> code;
	}

	function set_score($score) {
		$this -> score = $score;
	}

	function get_score() {
		return $this -> score;
	}

	function set_attach_id($attach_id) {
		$this -> attach_id = $attach_id;
	}

	function get_attach_id() {
		return $this -> attach_id;
	}

	function set_notes($notes) {
		$this -> notes = $notes;
	}

	function get_notes() {
		return $this -> notes;
	}

	function set_date_created($date_created) {
		$this -> date_created = $date_created;
	}

	function get_date_created() {
		return $this -> date_created;
	}

}

function createScore($score) {
	$dbh = appConnectPDO();
	$sql = "INSERT INTO " . APP_DB . ".score (id,user_id,student_id,code,score,attach_id,notes,date) 
	VALUES 
	('NULL','" . $score -> user_id . "','" . $score -> student_id . "' ,'" . $score -> code . "','" . $score -> score . "','" . $score -> attach_id . "','" . $score -> notes . "','" . $score -> date_created . "')";
	$dbh -> query($sql);
	//echo("<br>".$sql);
	$dbh = null;
}

function getAllScoresForStudentId($student_id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM " . APP_DB . ".score WHERE student_id = ".$student_id."  ;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function getScoreWithId($id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM " . APP_DB . ".score 
 WHERE id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$score = new score($data[0]['id'], $data[0]['user_id']);
	return $score;
}

function updateScoreWithId($id) {
	$dbh = appConnectPDO();

	$notes = sanitize($_POST['notes']);
	$sql = "UPDATE " . APP_DB . ".score set  notes = '$notes' WHERE id = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deleteScoreWithId($id) {
	$dbh = appConnectPDO();
	$sql = "DELETE FROM  " . APP_DB . ".score  WHERE id = $id ;";
	// function appConnectPDO
	$dbh -> query($sql);
	$dbh = null;
}

function searchScoresForKeyword($keyword,$user,$student) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM " . APP_DB . ".score WHERE 
	(notes LIKE  '%" . $keyword . "%'  ) 
	OR
	(code LIKE  '%" . $keyword . "%'   )
	AND user_id = '".$user->user_id."' AND student_id = '".$student->student_id."' 
	 ORDER BY  user_id ";
	//echo($sql);
	
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}
?>