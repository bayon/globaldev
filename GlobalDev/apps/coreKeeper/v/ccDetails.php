<?php
include_once ('HEADS/default_head.php');
?>
 
<?php include_once('./ajax_constants.php'); ?>
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
					//uploaded successfully
					//echo("upload file method:<pre>");print_r($_POST);echo("</pre>");
					 //	public function __construct($app,$codePage,$controller,$methodName='uploadFile',$target_path,$max_file_size='100000',$file_name_prefix='') {
					$fileUploadHandler = new FileUpload(APP_NAME, $_SERVER['PHP_SELF'],"ccDetails.php", "uploadFile", "uploads/", "10000000",$_POST['file_name_prefix']);
					$fileUploadHandler -> handleUpload();
					
					// save attachment filename to attachment table,
					//along with user_id ( student id NOT needed at this point).
					//echo("<br>SAVE ATTACHMENT INFORMATION HERE.");
					//echo("<br>user_id".$user->user_id." prefix:".$_POST['file_name_prefix']." actual file:".basename($_FILES['uploadedfile']['name']));
					 $filename = $_POST['file_name_prefix']."_".basename($_FILES['uploadedfile']['name']);
					$user_id = $user->user_id;
					//echo("<br>".$user_id."--".$filename);
					 $attachment = new Attachment("0", $user_id,"0",$filename);
					 createAttachment($attachment);
					 
					//echo("<hr>");
					break;
				default :
					break;
			}
		}
		 
		
		//the form
		$fileUpload = new FileUpload(APP_NAME, $_SERVER['PHP_SELF'],"ccDetails.php", "uploadFile", "../uploads/", "10000000",$ccmath -> code);
		$table = $fileUpload->fileUploadForm();
		echo($table);
		
		echo($user->username);
		if($ccmath -> code){
			 displayAttachments($user,$ccmath -> code );
		} else{
			 displayAttachments($user,$_POST['file_name_prefix'] );
		}
		
		?>
	</div>

</div>

