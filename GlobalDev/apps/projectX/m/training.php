<?php
echo(__FILE__);
?>

<?php
if (GLOBAL_ENVIRONMENT == "littleMac") {
	$db = "training";
	$table = "Task";
} else {
	$db = "training";
	$table = "Task";
}
//Controller and Model code

if (!isset($_GET['sortField'])) {
	$sql = "SELECT * FROM " . $db . "." . $table . " ";
	$data = getDataFromSQL($sql);
} else {
	$db = "training";
	$table = "task";
	$keyValueArray = array('id' => $_GET['id'], 'os' => $_GET['os'], 'title' => $_GET['title']);
	$sortByField = $_GET['sortField'];
	$data = sortBasicDB_TABLE_SortByField($db, $table, $sortByField);
}
//preparation
$headers = array( array("text" => "Id", "field" => "id"), array("text" => "os", "field" => "os"), array("text" => "title", "field" => "title"), array("text" => "description", "field" => "description"));
$controller = "pageX.php";
$previousSearchCriteria = "&id=" . $_GET['id'] . "&os=" . $_GET['os'] . "&title=" . $_GET['title'] . "";

$anchorTable = createAnchorTableWith_Data_HeaderTextAndFieldsArray($data, $headers, $controller, $previousSearchCriteria);
echo($anchorTable);
?>