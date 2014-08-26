<?php
if (isset($_GET)) {

	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'whatever' :
				break;

			default :
				include_once ('v/whatever_view.php');
				print_r($_GET);
				break;
		}
	}else{
		//navigation without method
		// $_POST ['ccode'];
		//print_r($_GET);
		displayCCDetails($_GET['ccode']);
	}

} else if (isset($_POST)) {
	
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			case 'whatever' :
				break;
			 
			default :
				include_once ('v/whatever_view.php');
				print_r($_POST);
				break;
		}
	}
}

function displayCCDetails($cc_code){
	$ccmath = new CCMATH();
	//$data = $ccmath->getDetailsForCCode($_GET['ccode']);
	 $ccmath->getDetailsForCCode($cc_code);
	
	
	include_once ('v/ccDetails.php');
	
}

?>
