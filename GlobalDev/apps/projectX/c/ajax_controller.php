<?php
include_once ("../config.php");
include_once("../m/model_includes.php");

//echo("<br>".__FILE__);
//echo("<pre>");print_r($_POST);echo("</pre>");
switch ($_POST['method']) {
	case 'PremadeAjaxFormMethodCall' :
		//echo("<br>ROOT_DIR: ".ROOT_DIR."</br>");
		echo("<br> Results from callFromPremadeAjaxForm method call.");
		break;
	case 'ajaxTableResults' :
		$me = "Awesome";
		switch ($_POST['text']) {
			case '1' :
				$youAre = "fruitcake";
				break;
			case '2' :
				$youAre = "nut case";
				break;
			case '3' :
				$youAre = "moron";
				break;
			default :
				$me = "Still Awesome";
				$youAre = "Jerk, that's not between 1-3";
				break;
		}

		echo("
		<table border=1>
			<tr><th>Me</th><th>You</th></tr>
			<tr><td>" . $me . "</td><td>" . $youAre . "</td></tr>
		</table>
		");
		break;
	case 'ajaxSelectToTable' :
	
		$user_id = $_POST['option'];
		$user = getUserWithId($user_id);
		
		echo("
		<table border=1>
			<tr><th>Id</th><th>Username</th><th>Password</th></tr>
			<tr><td>" . $user->user_id . "</td><td>" . $user->username . "</td><td>" . $user->password . "</td></tr>
		</table>
		");
		
		break;
	
	case 'get_users' :
		echo("<br>Hit the function...");
	
		break;
	
	default :
		echo("<br>" . __FILE__);
		echo("<pre>");
		print_r($_POST);
		echo("</pre>");
		break;
}
?>