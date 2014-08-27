<?php
include_once ('../../../global_includes.php');
include_once ("../m/model_includes_ajax.php");
include_once ("../constants.php");
include_once ("../config.php");
// Try to funnel all ajax request through this main ajax controller.
//because: they all need to include the constants and configs above.
 
switch ($_POST['method']) {

	
	case 'ajaxSortableCCMathTable' :
		 //include_once("ajaxTable.php");
		 include_once("ccCodes.php");

		break;
	//case 'ajaxSortableStudentTable' :
		 //include_once("ajaxTable.php");
		// include_once("students.php");

		break;
	case 'replaceContentForSchedule' :
		//echo("great foo has come...");
		include_once("schedule/appointment.php");
		break;
	case 'replaceContentForSchedule2' :
		//echo("great foo has come...");
		print_r($_POST);
		include_once("schedule/appointment.php");
		break;
	
	case 'ajaxStudentFormResults' :
		 /*
		  * Array ( [controller] => ajax_controller [method] => ajaxStudentFormResults [first_name] => fred [middle_name] => bayon [last_name] => forte [email] => bayon@forteworks.com [phone] => 502-377-3546 )
		  * */
			 
		 include_once("students.php");
		
		break;
	
	case 'ajaxSortableStudentsTable' :
		
		include_once("students.php");
		break;
	
	default :
		echo("<br>" . __FILE__);
		echo("<pre>");
		print_r($_POST);
		echo("</pre>");
		break;
}
/*
 * case 'PremadeAjaxFormMethodCall' :
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
 * case 'ajaxSelectToTable' :
		$user_id = $_POST['option'];
		$user = getUserWithId($user_id);

		echo("
		<table border=1>
			<tr><th>Id</th><th>Username</th><th>Password</th></tr>
			<tr><td>" . $user -> user_id . "</td><td>" . $user -> username . "</td><td>" . $user -> password . "</td></tr>
		</table>
		");

		break;

	case 'get_users' :
		echo("<br>Hit the function...");

		break;
 * case 'ajaxSortableTable' :
		//get data and formulate table data here
	
		$textout = "";
		if (isset($_POST)) {
			mysql_connect(HOST_DB, USERNAME, PASSWORD);
			$sql = "SELECT * FROM " . APP_DB . ".contacts ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
			//echo("<br>sql:".$sql);
			$result = mysql_query($sql);
			//echo(mysql_error());
			while ($myrow = mysql_fetch_array($result)) {
				$agentid = $myrow["ContactID"];
				$agentname = $myrow["ContactFullName"];
				$agentsalut = $myrow["ContactSalutation"];
				$agentinttel = $myrow["ContactTel"];
				$textout .= "<tr>
								<td class='ast_width_20pct' >" . $agentid . "</td>
								<td  class='ast_width_20pct'>" . $agentname . "</td>
								<td  class='ast_width_20pct'>" . $agentsalut . "</td>
								<td  class='ast_width_20pct'>" . $agentinttel . "</td>
								</tr>";
			}
		} else {
			$textout = "";
		}
		echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"  >" . $textout . "</table>";

		break;
 */
?>