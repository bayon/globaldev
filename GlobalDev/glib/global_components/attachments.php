<div class='component_container'>
	<div class='component_title'>
		Attachments:
	</div>
	<?php
	// the form action handler
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			case 'uploadFile' :
				echo("<br>uploading file...???");
				//upload file condition can not be delegated to a separate controller...
				$fileUploadHandler = new FileUpload($_SERVER[PHP_SELF], "uploadFile", "uploads/", "10000000");
				$fileUploadHandler -> handleUpload();
				break;
			default :
				break;
		}
	}
	// using the file upload class
	function upload_form() {
		$fileUpload = new FileUpload($_SERVER[PHP_SELF], "uploadFile", "../uploads/", "10000000");
		$html .= $fileUpload -> make();
		$html .= "</form>";
		return $html;
	}

	// USE CASE SCENARIO:
	$procedure_id = 999;
	//the form
	$table .= "<form id='uploadFileForm' enctype='multipart/form-data' action='$_SERVER[PHP_SELF]' method='POST' >";
	$table .= "<input type='hidden' name='controller' value='component.php' />";
	$table .= "<input type='hidden' name='procedure_id' value='$procedure_id' />";
	$table .= upload_form();
	echo($table);
	echo("</form>");
	function open_attachment_viewer($id) {
		//ASSUMING: The attachment was saved in mysql db with an id.
		$attachment = get_attachment_for_id($id);
		$link = '<a href="' . BASE_URL . 'uploads/' . $attachment . '" target="_blank">content of the anchor</a>';
		return $link;
	}

	$arrayOfUploads = scandir(BASE_PATH . '/uploads/');
	//print_r($arrayOfUploads);
	foreach ($arrayOfUploads as $a) {
		echo('<br><a href="' . BASE_URL . 'uploads/' . $a . '" target="_blank">' . $a . '</a>');
	}
	?>
</div>