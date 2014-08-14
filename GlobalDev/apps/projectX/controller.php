<?php
include_once ('../../global_includes.php');
include_once ('constants.php');
include_once ("m/model_includes.php");
if(!isset($_SESSION['home'])) {
	$_SESSION['home']="";
}
/*
if(globalUtilityCheck()){
	//echo("<br>Global Utilities are ON.");
}else{
	//echo("<br>Global Utilities are OFF!!!.");
}
 * */
if (  isset($_GET['navigation'])) {
	//echo("<br>GET:");
	//print_r($_GET);
	switch ($_GET['navigation']) {
		case 'home' :
			include_once ('c/home.php');
			break;
		case 'pageX' :
			include_once ('c/pageX.php');
			break;
		case 'components' :
			include_once ('c/component.php');
			break;
		case 'examples' :
			include_once ('c/examples.php');
			break;
		
		default :
			include_once ('c/default.php');
			break;
	}
}else{
	if (!isset($_POST['controller']) AND !isset($_GET['controller'])) {
		// CUSTOM CSS OVERRIDE	
		if(isset($_POST['override_css'])){
			include_once ('c/home.php');
			include_once('css/custom_css_overrides.php');
			 
		}else{
			
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
		case 'pageX.php' :
			include_once ('c/pageX.php');
			break;
		case 'examples.php' :
			include_once ('c/examples.php');
			break;

		case 'component.php' :
			include_once ('c/component.php');
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
		include_once ('c/' . $_GET['controller']);
		
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

?>