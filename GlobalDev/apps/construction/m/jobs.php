<?php
class Jobs {
	public $user_id;
	public $id;
	public $description;
	public $date_created;
	 
	public function __construct($user_id,$id = "0", $description = "default" ,$date_created="default") {
		$this-> user_id = $user_id;
		$this -> id = $id;
		$this -> description = $description;
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

	function set_description($description) {
		$this -> description = $description;
	}

	function get_description() {
		return $this -> description;
	}
	
	function set_date_created($date_created) {
		$this -> date_created = $date_created;
	}

	function get_date_created() {
		return $this -> date_created;
	}
	

	 
}

function createJobs($jobs) {
	$dbh = appConnectPDO();
	$sql = "INSERT INTO ".APP_DB.".job (id,user_id,description,date_created ) 
	VALUES 
	('NULL','" . $jobs -> user_id . "','" . $jobs -> description . "' ,'" . $jobs -> date_created . "')";
	echo($sql);
	$dbh -> query($sql);
	$dbh = null;
}

function getAllJobss($user) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".job WHERE user_id = '".$user->user_id."' ;";
	echo($sql);
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function getJobsWithId($id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".job
 WHERE id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$jobs = new jobs($data[0]['id'], $data[0]['description']);
	return $jobs;
}
 
function updateJobsWithId($id) {
	$dbh = appConnectPDO();
	$description = sanitize($_POST['description']);
	
	$sql = "UPDATE ".APP_DB.".job set description = '$description'  WHERE id = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deletejobsWithId($id) {
	$dbh = appConnectPDO();
	$sql = "DELETE FROM  ".APP_DB.".job  WHERE id = $id ;"; // function appConnectPDO
	$dbh -> query($sql);
	$dbh = null;
}

function searchjobssForKeyword($keyword,$user) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".job WHERE 
	(description LIKE  '%" . $keyword . "%'  ) 
	 AND user_id = '".$user->user_id."' 
	 ORDER BY  description ";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}
?>