<?php
class User_Session{
	public $isVerified;
	 
	public function __construct(){
		 
		$this->isVerified = $_SESSION['data']['user']['isVerified'] = true;
		$_SESSION['data']['object']= $this;
	}
	 
	public function show(){
		$html = '<pre>';
		$html .= print_r($_SESSION);
		$html .= '</pre>';
		echo($html);
	}
}
 

?>