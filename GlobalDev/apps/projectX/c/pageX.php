<?php
// ACTION LIST CONTROLLER CODE
 

if (isset($_POST['method'])) {
	
	
	switch ($_POST['method']) {
		case 'search' :
			$searchKey = sanitize($_POST['search_key']);
			$data = searchToolboxForKeyword($searchKey);
			break;
		case 'edit' :
			updateToolboxWithId($_POST['id']);
			$data = getAllToolbox();
			break;
		case 'delete' :
			deleteToolboxWithId($_POST['id']);
			break;
		 
		 
		default :
			print_r($_POST);
			//include_once ('v/component.php');
			break;
	}
}  
if(isset($_GET)){
		 
		 //echo("PAGEX CONTROLLER:<pre>");print_r($_GET);echo("</pre>");
	//http://localhost/GlobalDev/apps/projectX/index.php?controller=pageX.php&method=sort&sortField=host_name&licenseKey=&hostName=&expirationDate=
	} 
//echo("<br>DEFAULT COMPONENT VIEW INCLUDE</br>");
// END action list controller code

	include_once ('v/pageX.php');
?>