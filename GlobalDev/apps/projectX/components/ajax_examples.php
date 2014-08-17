<?php
include_once("ajaxSortableCCMathTable.php");
/*
//example 1
$ajaxForm = new ajaxForm(ROOT_DIR);
$ajaxForm1 = $ajaxForm -> make();
$ajax_gridMatrix[0][0] = $ajaxForm1;

//example 2
$ajaxTableForm = new ajaxTableForm(ROOT_DIR);
$resultTable = $ajaxTableForm -> make();
$ajax_gridMatrix[1][0] = $resultTable;

//example 3
$ajaxSelectToTable = new ajaxSelectToTable(ROOT_DIR);
$data = getAllUsers();
$tableResults = $ajaxSelectToTable ->make($data);
$ajax_gridMatrix[2][0] = $tableResults;

//example 4
$ajaxAPICall = new ajaxAPICall(ROOT_DIR);
$apiResults = $ajaxAPICall->make();
$ajax_gridMatrix[3][0] = $apiResults;

*/
$controller="ajax_controller";
$callBackFunction = "ajaxSortableCCMathTable";
$kvArrayOfHeaderFields = array(
		array('title'=>'ID' 	,'fieldName'=>'ContactID'			,'id_up'=>'up1'	,'id_down'=>'down1'),
		array('title'=>'Name' 	,'fieldName'=>'ContactFullName'		,'id_up'=>'up2'	,'id_down'=>'down2'),
		array('title'=>'Salut' 	,'fieldName'=>'ContactSalutation'	,'id_up'=>'up3'	,'id_down'=>'down3'),
		array('title'=>'Tel' 	,'fieldName'=>'ContactTel'			,'id_up'=>'up4'	,'id_down'=>'down4')
		);
$ajaxSortableTable = new ajaxSortableCCMathTable(ROOT_DIR);
$ajaxSortableTableResults = $ajaxSortableTable->make($controller,$callBackFunction,$kvArrayOfHeaderFields);
$ajax_gridMatrix[0][0] = $ajaxSortableTableResults;

$columnWidthPercentsArray = array(90);
$gridObject = new GridObject($ajax_gridMatrix, $columnWidthPercentsArray);
echo($gridObject -> make());
?>
