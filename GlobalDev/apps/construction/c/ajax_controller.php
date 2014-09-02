<?php
include_once ('../../../global_includes.php');
include_once ("../m/model_includes_ajax.php");
include_once ("../constants.php");
include_once ("../config.php");
// Try to funnel all ajax request through this main ajax controller.
//because: they all need to include the constants and configs above.
 
switch ($_POST['method']) {

	
	case 'ajaxSortableJobsTable' :
		 //include_once("ajaxTable.php");
		 include_once("jobs.php");

		break;
	case 'ajaxJobsFormResults' :
		//debug();
		//echo("ajaxJobsFormResults: save job in the back ground");
		//	public function __construct($user_id,$jobs_id = "0", $description = "default" ,$date_created="default") {
		
		$jobs = new Jobs($_POST['user_id'],"NULL",$_POST['description'],"");
		createJobs($jobs);
		
		break;
	case 'ajaxSortableItems' :
		 //include_once("ajaxTable.php");
		include_once("items.php");

		break;
	
	 

	default :
		echo("<br>" . __FILE__);
		echo("<pre>");
		print_r($_POST);
		echo("</pre>");
		break;
}
 
?>