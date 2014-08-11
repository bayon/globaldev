<?php
// ACTION LIST CONTROLLER CODE
$searchKey = sanitize($_POST['search_key']);
if (isset($_POST)) {
	//echo("<br>COMPONENT CONTROLLER POST</br>");
	switch ($_POST['method']) {
		case 'search' :
			$data = searchUsersForKeyword($searchKey);
			break;
		case 'edit' :
			updateUserWithId($_POST['user_id']);
			$data = getAllUsers();
			break;
		case 'delete' :
			deleteUserWithId($_POST['user_id']);
			break;
		case 'uploadFile' :
			//upload file condition can not be delegated to a separate controller...
			$fileUploadHandler = new FileUpload($_SERVER[PHP_SELF], "uploadFile", "uploads/", "10000000");
			$fileUploadHandler -> handleUpload();
			//insert_procedure_attachment(basename($_FILES['uploadedfile']['name']));
			include_once ('c/component.php');
			break;
		case 'selectComponent' :
			//display component selected
			break;
		default :
			//print_r($_POST);
			//include_once ('v/component.php');
			break;
	}
}  
if(isset($_GET)){
		 
		// echo("COMPONENT CONTROLLER:<pre>");print_r($_GET);echo("</pre>");
	} 
//echo("<br>DEFAULT COMPONENT VIEW INCLUDE</br>");
// END action list controller code
include_once ('v/component.php');
?>