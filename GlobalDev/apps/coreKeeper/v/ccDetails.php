<?php
include_once ('HEADS/default_head.php');
?>
<?php echo(navigation()); ?>

<div id='content'>
	<div class='page_title'>
		Title
	</div>
	<?php echo("<h3>" . $ccmath -> code . "</h3>");
	echo("<p>" . $ccmath -> statement . "</p>");
	?>
	<ul>
		<li>
			Need to add "app" parameter to File Object.
		</li>
		<li>
			need to adjust "global_components/attachment.php accordingly"
		</li>
		<li>
			need to adjust usage in projectX as well.
		</li>
		<li>
			upload a file specific to this code.
		</li>
		<li>
			view files for this code.
		</li>
	</ul>
	<?php //include_once (GLOBAL_DIR . '/glib/global_components/attachments-1.0.0.php'); ?>
	<div class='component_container'>
		<div class='component_title'>
			Attachments:
		</div>
		<?php
		//echo("<br>".__FILE__);
		// the form action handler
		if (isset($_POST['method'])) {
			switch ($_POST['method']) {
				case 'uploadFile' :
					echo("<br>ccDetails.php uploading file...???");
					echo("<pre>");print_r($_POST);echo("</pre>");
					//upload file condition can not be delegated to a separate controller...
					$fileUploadHandler = new FileUpload(APP_NAME, $_SERVER['PHP_SELF'], "uploadFile", "uploads/", "10000000",$_POST['file_name_prefix']);
					$fileUploadHandler -> handleUpload();
					break;
				default :
					break;
			}
		}
		// using the file upload class
		function upload_form($file_name_prefix) {
			echo("<br> fn: upload_form()");
			$fileUpload = new FileUpload(APP_NAME, $_SERVER['PHP_SELF'], "uploadFile", "../uploads/", "10000000",$file_name_prefix);
			$html = $fileUpload -> make();
			$html .= "</form>";
			return $html;
		}

		// USE CASE SCENARIO:
		$procedure_id = 999;
		//the form
		$table .= "<form id='uploadFileForm' enctype='multipart/form-data' action='" . $_SERVER['PHP_SELF'] . "' method='POST' >";
		$table .= "<input type='hidden' name='controller' value='ccDetails.php' />";
		//was component.php controller
		$table .= "<input type='hidden' name='procedure_id' value='$procedure_id' />";
		$table .= upload_form($ccmath -> code);
		echo($table);
		echo("</form>");
		function open_attachment_viewer($id) {
			echo("<br>fn: open_attachment_viewer()");
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

</div>

