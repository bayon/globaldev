<?php
include_once ('HEADS/default_head.php');
?>
<?php echo(navigation()); ?>
<?php

?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>
	<?php echo("<h3>" . $ccmath -> code . "</h3>");
	echo("<p>" . $ccmath -> statement . "</p>");
	?>
	 
	<?php //include_once (GLOBAL_DIR . '/glib/global_components/attachments-1.0.0.php'); ?>
	<div class='component_container'>
		 
		<?php
		//echo("<br>".__FILE__);
		// the form action handler
		if (isset($_POST['method'])) {
			switch ($_POST['method']) {
				case 'uploadFile' :
					// HANDLE METHOD DEFINED FOR FILE UPLOADS/ATTACHMENTS
					//echo("upload file method:<pre>");print_r($_POST);echo("</pre>");
					 //	public function __construct($app,$codePage,$controller,$methodName='uploadFile',$target_path,$max_file_size='100000',$file_name_prefix='') {
					$fileUploadHandler = new FileUpload(APP_NAME, $_SERVER['PHP_SELF'],"ccDetails.php", "uploadFile", "uploads/", "10000000",$_POST['file_name_prefix']);
					$fileUploadHandler -> handleUpload();
					break;
				default :
					break;
			}
		}
		 
		
		//the form
		$fileUpload = new FileUpload(APP_NAME, $_SERVER['PHP_SELF'],"ccDetails.php", "uploadFile", "../uploads/", "10000000",$ccmath -> code);
		$table = $fileUpload->fileUploadForm();
		echo($table);
		if($ccmath -> code){
			 displayAttachments($ccmath -> code );
		} else{
			 
			 displayAttachments($_POST['file_name_prefix'] );
		}
		
		?>
	</div>

</div>

