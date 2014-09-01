<?php
//debug();
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
		include_once('v/items.php');
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