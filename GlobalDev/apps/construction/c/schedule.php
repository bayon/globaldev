<?php
// CONTROLLER CODE
//echo("<br>".__FILE__."</br>"); new 
//echo("<pre>SESSION:");print_r($_SESSION);echo("</pre>");
//echo("<pre>GET:");print_r($_GET);echo("</pre>");
include_once (GLOBAL_DIR . '/glib/global_components/calendar.php');

if (isset($_GET)) {
	//echo("<br> schedule CONTROLLER GET isset</br>");print_r($_GET);
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'addAppointment' :
				//$dateArray = explode(" ", $_GET['date']);// for datepickR
				$dateArray = explode("/", $_GET['date']);//for jquery datepicker 
				//$dateIntArray = handleDatepickerResponse($dateArray);
				
				//$appointment = new Appointment($_GET['title'], $dateIntArray[0], $dateIntArray[1], $dateIntArray[2], $_GET['note'], $_GET['anchor']);
				//appt::: ($user_id=0,$title ="",$year ="",$month="",$day="",$note="",$anchor=""){
				//HERE MAKE ANCHOR be the BASE_URL.			
					//echo("<br>BASE_URL".BASE_URL."c/schedule/appointment.php");	
				//WTF? $anchor = "".BASE_URL."index.php?controller=schedule.php&method=selectAppt&user_id=".$_GET['user_id']."&year=".$dateArray[2]."&month=".$dateArray[0]."&day=".$dateArray[1]."";
				$appointment = new Appointment($_GET['user_id'],$_GET['title'], $dateArray[2], $dateArray[0], $dateArray[1], $_GET['note'], $_GET['anchor']);
				
				insertAppointment($appointment);
				$calendar = new Calendar($_GET['user_id'],date('n'), date('Y')); 	
				include_once('v/schedule.php');
				break;
			case 'changeMonth' :
				//echo("<br><br><br><br><pre>");print_r($_GET);echo("</pre>");
				if($_GET['direction'] == 'fwd'){
					if($_GET['month'] != 12){
						$calendar = new Calendar($_GET['user_id'],$_GET['month']+1, $_GET['year'],320); 
					}else{
						$calendar = new Calendar($_GET['user_id'],1, $_GET['year']+1,320);
					}
					
				}else{
					
					if($_GET['month'] != 1){
						$calendar = new Calendar($_GET['user_id'],$_GET['month']-1, $_GET['year'],320); 
					}else{
						$calendar = new Calendar($_GET['user_id'],12, $_GET['year']-1,320); 
					}
				}
				include_once('v/schedule.php');
				break;
			
			case 'selectAppt' :
				//print_r($_GET);
				echo("<br> selectAppt method");
				//include_once ('v/HEADS/default_head.php');
				include ('v/HEADS/default_head.php');
				include_once('v/appointment.php');
				 
			break;
			
			default :
				print_r($_GET);
				break;
		}
	}else{
		
		 // INITIALIZE the calendar with user appointments upon arrival at page.
		include_once('./ajax_constants.php');
		$calendar = new Calendar($user->user_id,date('n'), date('Y'),320); 	
		include_once('v/schedule.php');
	}

} else if (isset($_POST)) {
	echo("<br> CONTROLLER POST</br>");
	$searchKey = sanitize($_POST['search_key']);
	switch ($_POST['method']) {
		
		case 'selectComponent' :
			echo("<br> SCHEDULE CONTROLLER POST</br>");
			//display  selected
			break;
		default :
			print_r($_POST);
			
			break;
	}
} 


?>