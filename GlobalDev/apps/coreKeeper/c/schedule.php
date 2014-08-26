<?php
// CONTROLLER CODE
//echo("<br>".__FILE__."</br>");
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
				$appointment = new Appointment($_GET['title'], $dateArray[2], $dateArray[0], $dateArray[1], $_GET['note'], $_GET['anchor']);
				
				insertAppointment($appointment);
				$calendar = new Calendar(date('n'), date('Y')); 	
				include_once('v/schedule.php');
				break;
			case 'changeMonth' :
				if($_GET['direction'] == 'fwd'){
					if($_GET['month'] != 12){
						$calendar = new Calendar($_GET['month']+1, $_GET['year'],320); 
					}else{
						$calendar = new Calendar(1, $_GET['year']+1,320);
					}
					
				}else{
					
					if($_GET['month'] != 1){
						$calendar = new Calendar($_GET['month']-1, $_GET['year'],320); 
					}else{
						$calendar = new Calendar(12, $_GET['year']-1,320); 
					}
				}
				include_once('v/schedule.php');
				break;
			default :
				
				break;
		}
	}else{
		
		$calendar = new Calendar(date('n'), date('Y'),320); 	
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
//include_once(GLOBAL_DIR."/glib/global_lib/code_report/code_report.php");

//include_once('v/schdeule.php');

/*
function handleDatepickerResponse($dateArray) {
	//in: integer array //OLD array ('August', '20th,', '2014' );
	//out: integer array ( year, month, day)
	echo("<br>date array <pre>");print_r($dateArray);echo("</pre>");
	
	$monthString = strtolower($dateArray[0]);
	$arrayOfMonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
	switch ($monthString) {
		case $arrayOfMonths[0] :
			$monthInt = 1;
			break;
		case $arrayOfMonths[1] :
			$monthInt = 2;
			break;
		case $arrayOfMonths[2] :
			$monthInt = 3;
			break;
		case $arrayOfMonths[3] :
			$monthInt = 4;
			break;
		case $arrayOfMonths[4] :
			$monthInt = 5;
			break;
		case $arrayOfMonths[5] :
			$monthInt = 6;
			break;
		case $arrayOfMonths[6] :
			$monthInt = 7;
			break;
		case $arrayOfMonths[7] :
			$monthInt = 8;
			break;
		case $arrayOfMonths[8] :
			$monthInt = 9;
			break;
		case $arrayOfMonths[9] :
			$monthInt = 10;
			break;
		case $arrayOfMonths[10] :
			$monthInt = 11;
			break;
		case $arrayOfMonths[11] :
			$monthInt = 12;
			break;

		default :
			$monthInt = 13;
			break;
	}
	$dayString = $dateArray[1];
	$yearString = $dateArray[2];
	$dayInt = 0 + $dayString;
	$yearInt = 0 + $yearString;

	$intArray = array($yearInt, $monthInt, $dayInt);
	print_r($intArray);
	//return $intArray;
	return $dateArray;
}

*/
 

?>