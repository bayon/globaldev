<?php
include_once ('../../global_includes.php');
include_once ('constants.php');
include_once ("m/model_includes.php");

//echo("<pre>SESSION:");print_r($_SESSION);echo("</pre>");
//echo("<pre>POST:");print_r($_POST);echo("</pre>");
//echo("<pre>GET:");print_r($_GET);echo("</pre>");

if (isset($_GET['navigation'])) {
	switch ($_GET['navigation']) {
		case 'home' :
			include_once ('c/home.php');
			break;
		case 'schedule' :
			include_once ('c/schedule.php');
			break;
		case 'codes' :
			include_once ('c/ccCodes.php');
			break;
		 case 'students' :
			include_once ('c/students.php');
			break;
		case 'ccDetails' :
			include_once ('c/ccDetails.php');
			break;
		default :
			include_once ('c/default.php');
			break;
	}
} 
else if (isset($_GET['subnavigation'])) {
	switch ($_GET['subnavigation']) {
		case 'appts' :
		include_once ('c/schedule/appointment.php');
		break;
		
		default :
			break;
	}
}
else {
	if (!isset($_POST['controller']) AND !isset($_GET['controller'])) {
		// CUSTOM CSS OVERRIDE
		if (isset($_POST['override_css'])) {
			switch ($_POST['override_css']) {
				case 'theme1' :
					$_SESSION['custom_theme'] = "theme1";
					break;
				case 'theme2' :
					$_SESSION['custom_theme'] = "theme2";
					break;
				case 'theme3' :
					$_SESSION['custom_theme'] = "theme3";
					break;
				default :
					$_SESSION['custom_theme'] = "theme1";
					break;
			}
			include_once ('c/home.php');
		} else {
			include_once ('c/default.php');
		}

	}
}

if (isset($_POST['controller'])) {
	if (isset($_POST['controller'])) {
			include_once ('c/' . $_POST['controller']);
		}
} else {
	if (isset($_GET)) {
		if (isset($_GET['controller'])) {
			include_once ('c/' . $_GET['controller']);
		}
	}
}
//include_once(GLOBAL_DIR."/glib/global_lib/code_report/code_report.php");
?>