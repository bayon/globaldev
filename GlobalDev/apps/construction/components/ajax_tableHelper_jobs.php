<?php


$controller="ajax_controller";// Try to funnel all ajax request through the main ajax controller.
$callBackFunction = "ajaxSortableJobsTable";
$kvArrayOfHeaderFields = array(
		array('title'=>'Description','fieldName'=>'description','id_up'=>'up1'	,'id_down'=>'down1')
		
		);
//$ajaxSortableTable = new ajaxSortableStudentsTable(ROOT_DIR);
$ajaxSortableTable = new ajaxSortableTable(ROOT_DIR,"description");
$ajaxSortableTableResults = $ajaxSortableTable->make($controller,$callBackFunction,$kvArrayOfHeaderFields);
$ajax_gridMatrix[0][0] = $ajaxSortableTableResults;

$columnWidthPercentsArray = array(90);
$gridObject = new GridObject($ajax_gridMatrix, $columnWidthPercentsArray);
echo($gridObject -> make());

 
		//,array('title'=>'statement' 	,'fieldName'=>'statement'		,'id_up'=>'up2'	,'id_down'=>'down2')
?>
