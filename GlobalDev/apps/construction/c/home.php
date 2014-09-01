<?php
if (isset($_GET)) {
//print_r($_GET);
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'whatever' :
				break;

			default :
				include_once ('v/whatever_view.php');
				print_r($_GET);
				break;
		}
	}
	if (isset($_GET['navigation'])) {
		
		include_once('./v/home.php');
	}

} 
if (isset($_POST)) {
	//print_r($_POST);
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