<?php
include_once ('../../global_includes.php');
include_once ('constants.php');
include_once ("m/model_includes.php");
/*
 * CURIOUS : left over from back button fix attemp involving posted request.
 if(!isset($_SESSION['home'])) {
 $_SESSION['home']=""; 
 }
 * */
/*
 * override_css isset
 if(globalUtilityCheck()){
 //echo("<br>Global Utilities are ON.");
 }else{
 //echo("<br>Global Utilities are OFF!!!.");
 }
 * */
//echo("<pre>SESSION:");print_r($_SESSION);echo("</pre>");
//echo("<pre>POST:");print_r($_POST);echo("</pre>");
//echo("<pre>GET:");print_r($_GET);echo("</pre>");

if (isset($_GET['navigation'])) {
	//echo("<br>GET isset:");
	//print_r($_GET);
	switch ($_GET['navigation']) {
		case 'home' :
			include_once ('c/home.php');
			break;
		case 'schedule' :
			include_once ('c/schedule.php');
			break;
		case 'codes' :
			//include_once ('c/ajaxTable.php');
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
	//echo("<br>GET isset:");
	//print_r($_GET);
	switch ($_GET['subnavigation']) {
		
		case 'appts' :
		include_once ('c/schedule/appointment.php');
		break;
		
		default :
			break;
	}
}

else {
	//echo("<br>GET NOT isset:");
	if (!isset($_POST['controller']) AND !isset($_GET['controller'])) {
		// CUSTOM CSS OVERRIDE

		if (isset($_POST['override_css'])) {
			//echo("<br>override_css isset:");
			
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
			//include_once ('css/custom_css_overrides.php');
			include_once ('c/home.php');
		} else {
			//echo("<br>override_css NOT isset:");
			include_once ('c/default.php');
		}

	}
}

if (isset($_POST['controller'])) {
	//echo("<br>MAIN CONTROLLER POST</br>");
	//echo("<br>POST:");
	//print_r($_POST);
	switch ($_POST['controller']) {
		case 'login' :
			include_once ('c/login.php');
			break;
		case 'signup' :
			include_once ('c/signup.php');
			break;
		case 'home.php' :
			include_once ('c/home.php');
			break;
		 
		 case 'ccCodes.php' :
			include_once ('c/ccCodes.php');
			break;

		 
		 
		case 'ccDetails.php' :
			include_once ('c/ccDetails.php');
			break;
		case 'schedule.php' :
			include_once ('c/schedule.php');
			break;
		case 'Default Method' :
			include_once ('c/examples.php');
			echo("<BR>CONTROLLER: DEFAULT METHOD");
			print_r($_POST);
			break;

		default :
			//print_r($_POST);
			//include_once ('c/default.php');
			break;
	}
} else {
	if (isset($_GET)) {
		//echo("<br>GET</br>");
		// echo("CONTROLLER:<pre>");print_r($_GET);echo("</pre>");
		//AUTOMATIC FOR ALL GET
		if (isset($_GET['controller'])) {
			include_once ('c/' . $_GET['controller']);
		}

		/*
		 * CUSTOMIZABLE GET REQUESTS IF NECESSARY
		 switch ($_GET['controller']) {
		 case 'component.php' :
		 include_once ('c/' . $_GET['controller']);
		 break;
		 case 'pageX.php' :
		 include_once ('c/' . $_GET['controller']);
		 break;
		 default :
		 //echo("<BR>MAIN CONTROLLER DEFAULT VIEW INCLUDE AFTER GET !!!</br>");
		 //include_once ('c/default.php');
		 break;
		 }
		 *
		 */

	}

}
//include_once(GLOBAL_DIR."/glib/global_lib/code_report/code_report.php");
?>