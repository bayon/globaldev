<?php
class Responce {
	public $page;
	public $total;
	public $records;
	public $rows;

	public function __construct($page = "1", $total = "1", $records = "1", $rows = array()) {
		$this -> page = $page;
		$this -> total = $total;
		$this -> records = $records;
		$this -> rows = $rows;
	}

}

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$database = "cc";
//include_once ('cc_jqgrid_server_head.php');

$page = $_GET['page'];
// get the requested page
$limit = $_GET['rows'];
// get how many rows we want to have into the grid
$sidx = $_GET['sidx'];
// get index row - i.e. user click to sort
$sord = $_GET['sord'];
// get the direction
if (!$sidx)
	$sidx = 1;
// connect to the database
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");

$result = mysql_query("SELECT COUNT(*) AS count FROM cc_math");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$count = $row['count'];

if ($count > 0) {
	$total_pages = ceil($count / $limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages)
	$page = $total_pages;
$start = $limit * $page - $limit;
// do not put $limit*($page - 1)
$SQL = "SELECT * FROM cc_math ORDER BY $sidx $sord LIMIT $start , $limit";
//echo("<br>".$SQL);
$result = mysql_query($SQL) or die("Couldnt execute query." . mysql_error());

$responce = new Responce();
//echo("page:".$page."--total pages:".$total_pages."--count:".$count);
$responce -> page = $page;
$responce -> total = $total_pages;
$responce -> records = $count;
$i = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$responce -> rows[$i]['pk'] = $row["pk"];
	$responce -> rows[$i]['cell'] = array($row["pk"], $row["id"], $row["code"], $row["statement"]);
	$i++;
}
echo json_encode($responce);
?>