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
	}else {
		if (isset($_GET['navigation'])) {
			//initial navigation to students page
			include_once ('./v/whatever.php');
		}
	}

} 
if (isset($_POST)) {
	
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
?>