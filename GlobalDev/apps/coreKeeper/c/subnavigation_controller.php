<?php
include_once ('../../../global_includes.php');
include_once ("../constants.php");
include_once ("../config.php");
// Try to funnel all ajax request through this main ajax controller.OR subnavigation controller
//because: they all need to include the constants and configs above.


switch ($_POST['subcontroller']) {

	case 'appointment' :
		include_once("schedule/appointment.php");
		break;
	case 'specials' :
		include_once("schedule/specials.php");
		break;	
		
	default :
		echo("<br>" . __FILE__);
		print_r($_POST);
		break;
}
?>