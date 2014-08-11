<?php

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

$columnWidthPercentsArray = array(90);
$gridObject = new GridObject($ajax_gridMatrix, $columnWidthPercentsArray);
echo($gridObject -> make());
?>
