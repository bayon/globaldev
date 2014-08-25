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
	}
	if (isset($_GET['subnavigation'])) {
		include_once ('v/HEADS/default_head.php');
		include_once ('v/schedule/appointment.php');
	}

} 
if (isset($_POST)) {
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			
			case 'subnavToAppt' :
				include_once ('../v/schedule/appointment.php');
				break;
			
			default :
				include_once ('v/whatever_view.php');
				print_r($_POST);
				break;
		}
	}
} 

?>