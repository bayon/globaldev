<?php
class Attachment {
	public $id;
	public $user_id;
	public $student_id;
	public $filename;
	 
	public function __construct($id = "0", $user_id = "0", $student_id="0",$filename = "default" ) {
		$this -> id = $id;
		$this ->user_id = $user_id;
		$this -> student_id = $student_id;
		$this -> filename = $filename;
		 
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

	function set_filename($filename) {
		$this -> filename = $filename;
	}

	function get_filename() {
		return $this -> filename;
	}

	 
}


function createAttachment($attachment) {
	$dbh = appConnectPDO();
	$sql = "INSERT INTO ".APP_DB.".attachment (id, user_id,student_id,filename) 
	VALUES 
	( 'NULL', '" . $attachment -> user_id . "','" . $attachment -> student_id . "' ,'" . $attachment -> filename . "' )";
	//echo($sql);
	$dbh -> query($sql);
	$dbh = null;
}

function getAllAttachments($user) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".attachment WHERE user_id = ".$user->user_id."  ;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function getAttachmentWithId($id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".attachment 
 WHERE id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$attachment = new Attachment($data[0]['id'], $data[0]['filename']);
	return $attachment;
}
 
function updateAttachmentWithId($id) {
	$dbh = appConnectPDO();
	$filename = sanitize($_POST['filename']);
	$password = sanitize($_POST['password']);
	$sql = "UPDATE ".APP_DB.".attachment set filename = '$filename', password = '$password' WHERE id = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deleteAttachmentWithId($id) {
	$dbh = appConnectPDO();
	$sql = "DELETE FROM  ".APP_DB.".attachment  WHERE id = $id ;"; // function appConnectPDO
	$dbh -> query($sql);
	$dbh = null;
}

function searchAttachmentsForKeyword($keyword) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".attachment WHERE 
	(filename LIKE  '%" . $keyword . "%'  ) 
	OR
	(password LIKE  '%" . $keyword . "%'   )
	 ORDER BY  filename ";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}
?>