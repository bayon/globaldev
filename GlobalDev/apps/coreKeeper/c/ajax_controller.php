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
	case 'ajaxSortableCCMathTable_forStudent' :
		 //include_once("ajaxTable.php");
		include_once("students.php");

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
	case 'ajaxStudentFormEdit' :
		include_once("students.php");
		break;
	default :
		echo("<br>" . __FILE__);
		echo("<pre>");
		print_r($_POST);
		echo("</pre>");
		break;
}
 
?>