<?php

//echo(__FILE__); 

class FileUpload {
	/*Note: Currently this class has to get called twice.
	 * 1) Once to build the form.
	 * 2) And second, to handle the upload in the same "code page" as the form.
	 */
	public $app;//application name
	public $codePage;//objectsClient.php
	public $methodName; //uploadFile
	public $target_path; //uploads/
	public $max_file_size;//10000000
	public $file_name_prefix;
	public function __construct($app,$codePage,$methodName='uploadFile',$target_path,$max_file_size='100000',$file_name_prefix='') {
		$this->app = $app;	
		$this->codePage = $codePage;
		$this->methodName = $methodName;
		$this->target_path = $target_path;
		$this->max_file_size = $max_file_size;
		$this->file_name_prefix = $file_name_prefix;
	}
	public function make() {
		//echo("<br>FileObject fn: make()");
		$input = "
		<div class = 'attachmentsContainer'>
		<input type='hidden' name='app' value='".$this->app."'  />
		<input type='hidden' name='file_name_prefix' value='".$this->file_name_prefix."'  />
		<input type='hidden' name='page' value='".$this->codePage."'  />
		<input type='hidden' name='MAX_FILE_SIZE' value='".$this->max_file_size."' />
		<input name='uploadedfile' class='file_upload' type='file' />
		<input type='submit' class = 'file_submit_button' name='method' value='".$this->methodName."'  />
		</div>
		";
		return $input;
	}
	public function handleUpload() {
		//echo("<br>FileObject fn: handleUpload()");
		$target_path = GLOBAL_DIR."/apps/".$this->app."/".$this->target_path ."/".$this->file_name_prefix."_" . basename($_FILES['uploadedfile']['name']);
		echo("<br>".$target_path);
		move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
		$html .= "<span>" . basename($_FILES['uploadedfile']['name']) . "</br> uploaded successfully</span>";
		echo($html);
	}
}

?>
