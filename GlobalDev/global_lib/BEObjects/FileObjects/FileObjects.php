<?php

//echo(__FILE__); 

class FileUpload {
	/*Note: Currently this class has to get called twice.
	 * 1) Once to build the form.
	 * 2) And second, to handle the upload in the same "code page" as the form.
	 */
	public $codePage;//objectsClient.php
	public $methodName; //uploadFile
	public $target_path; //uploads/
	public $max_file_size;//10000000
	public function __construct($codePage,$methodName='uploadFile',$target_path,$max_file_size='100000') {
		$this->codePage = $codePage;
		$this->methodName = $methodName;
		$this->target_path = $target_path;
		$this->max_file_size = $max_file_size;
	}
	public function make() {
		$input = "
		<div class = 'attachmentsContainer'>
		<input type='hidden' name='page' value='".$this->codePage."'  />
		<input type='hidden' name='MAX_FILE_SIZE' value='".$this->max_file_size."' />
		<input name='uploadedfile' class='file_upload' type='file' />
		<input type='submit' class = 'file_submit_button' name='method' value='".$this->methodName."'  />
		</div>
		";
		return $input;
	}
	public function handleUpload() {
		$target_path = $this->target_path . basename($_FILES['uploadedfile']['name']);
		if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			$html .= "<span> SUCCESS: " . basename($_FILES['uploadedfile']['name']) . " uploaded!</span>";
		} else {
			$html .= "<br><span style='color:red;' >UPLOAD FAILED</span>";
			$html .= "<br>MAX_FILE_SIZE:".$this->max_file_size;
			$html .= "
			<p>Target Path: $target_path</p>";
			 
		}
		echo($html);
	}
}

?>
