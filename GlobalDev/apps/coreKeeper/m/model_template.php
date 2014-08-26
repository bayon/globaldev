<?php
class Object {
	public $object_id;
	public $objectname;
	 
	public function __construct($object_id = "0", $objectname = "default" ) {
		$this -> object_id = $object_id;
		$this -> objectname = $objectname;
		 
	}
	//getters and setters with "underscores". easier for find/replace
	function set_object_id($id) {
		$this -> object_id = $id;
	}

	function get_object_id() {
		return $this -> object_id;
	}

	function set_objectname($objectname) {
		$this -> objectname = $objectname;
	}

	function get_objectname() {
		return $this -> objectname;
	}

	 
}



function getAllObjects() {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".object ;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function getObjectWithId($id) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".object 
 WHERE object_id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$object = new Object($data[0]['object_id'], $data[0]['objectname']);
	return $object;
}
 
function updateObjectWithId($id) {
	$dbh = appConnectPDO();
	$objectname = sanitize($_POST['objectname']);
	$password = sanitize($_POST['password']);
	$sql = "UPDATE ".APP_DB.".object set objectname = '$objectname', password = '$password' WHERE object_id = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deleteObjectWithId($object_id) {
	$dbh = appConnectPDO();
	$sql = "DELETE FROM  ".APP_DB.".object  WHERE object_id = $object_id ;"; // function appConnectPDO
	$dbh -> query($sql);
	$dbh = null;
}

function searchObjectsForKeyword($keyword) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".object WHERE 
	(objectname LIKE  '%" . $keyword . "%'  ) 
	OR
	(password LIKE  '%" . $keyword . "%'   )
	 ORDER BY  objectname ";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}
?>