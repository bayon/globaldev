<?php
//echo("<br>".__FILE__);
if (isset($_POST['method'])) {
	switch ($_POST['method']) {
		case 'uploadFile' :
			echo("<br>FILES.php post method case: uploadFile");
			//upload file condition can not be delegated to a separate controller...
			//	public function __construct($app,$codePage,$controller,$methodName='uploadFile',$target_path,$max_file_size='100000',$file_name_prefix='') {
			
			$fileUploadHandler = new FileUpload("projectX",$_SERVER['PHP_SELF'],"files.php", "uploadFile", "uploads/", "10000000","projectX");
			$fileUploadHandler -> handleUpload();
			//insert_procedure_attachment(basename($_FILES['uploadedfile']['name']));
			//include_once ('c/files.php');
			include_once("v/files.php");
			break;
		 
		default :
			print_r($_POST);
		include_once("v/files.php");
			break;
	}
} else{
	include_once("v/files.php");
}
?>