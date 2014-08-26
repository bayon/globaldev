<?php
include_once("ajaxSortableStudentsTable.php");
 
$controller="ajax_controller";// Try to funnel all ajax request through the main ajax controller.
$callBackFunction = "ajaxSortableStudentsTable";
$kvArrayOfHeaderFields = array(
		array('title'=>'first name' 	,'fieldName'=>'firstName'			,'id_up'=>'up1'	,'id_down'=>'down1')
		
		);
$ajaxSortableTable = new ajaxSortableStudentsTable(ROOT_DIR);
$ajaxSortableTableResults = $ajaxSortableTable->make($controller,$callBackFunction,$kvArrayOfHeaderFields);
$ajax_gridMatrix[0][0] = $ajaxSortableTableResults;

$columnWidthPercentsArray = array(90);
$gridObject = new GridObject($ajax_gridMatrix, $columnWidthPercentsArray);
echo($gridObject -> make());

 
		//,array('title'=>'statement' 	,'fieldName'=>'statement'		,'id_up'=>'up2'	,'id_down'=>'down2')
?>
