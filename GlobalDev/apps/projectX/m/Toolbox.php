<?php
class Toolbox {
	public $id;
	public $os;
	public $title;
	public $description;

	public function __construct($id = "0", $os = "default", $title = "default", $description = "default") {
		$this -> id = $id;
		$this -> os = $os;
		$this -> title = $title;
		$this -> description = $description;
	}

	function setId($id) {
		$this -> id = $id;
	}

	function getId() {
		return $this -> id;
	}

	function setOs($os) {
		$this -> os = $os;
	}

	function getOs() {
		return $this -> os;
	}

	function setTitle($title) {
		$this -> title = $title;
	}

	function getTitle() {
		return $this -> title;
	}
	function setDescription($description) {
		$this -> description = $description;
	}

	function getDescription() {
		return $this -> description;
	}

}

function getToolboxWithId($id) {
	$dbh = connectPDO_db('training');
	$sql = "SELECT * FROM `training`.`task` 
 WHERE id = $id;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	$Toolbox = new Toolbox($data[0]['id'], $data[0]['os'], $data[0]['title']);
	return $toolbox;
}

function createToolbox($toolbox) {
	$dbh = connectPDO_db('training');
	$sql = "INSERT INTO `training`.`task` (id,os,title) VALUES ('NULL','" . $toolbox -> os . "','" . $toolbox -> title . "')";
	$dbh -> query($sql);
	$dbh = null;
}

function getAllToolbox() {
	$dbh = connectPDO_db('training');
	$sql = "SELECT * FROM `training`.`task` ;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	return $data;
}

function searchToolboxForKeyword($keyword) {
	$dbh = connectPDO_db("training");
	$sql = "SELECT * FROM training.task WHERE 
	(`os` LIKE  '%" . $keyword . "%'  ) 
	OR
	(`title` LIKE  '%" . $keyword . "%'   )
	 ORDER BY  os ";
	 echo("<br>sql:".$sql);
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	$dbh = null;
	//echo("data???:".$data);
	return $data;
}

function updateToolboxWithId($id) {
	$dbh = connectPDO_db("training");
	$os = sanitize($_POST['os']);
	$title = sanitize($_POST['title']);
	$sql = "UPDATE `training`.`task` set `os` = '$os', `title` = '$title' WHERE `id` = $id ;";
	$dbh -> query($sql);
	$dbh = null;
}

function deleteToolboxWithId($id) {
	$dbh = connectPDO_db("training");
	$sql = "DELETE FROM  `training`.`task`  WHERE `id` = $id ;";
	// function connectPDO
	$dbh -> query($sql);
	$dbh = null;
}
?>