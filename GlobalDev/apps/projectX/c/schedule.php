<?php
// CONTROLLER CODE
//echo("<br>".__FILE__."</br>");
//echo("<pre>SESSION:");print_r($_SESSION);echo("</pre>");
//echo("<pre>GET:");print_r($_GET);echo("</pre>");
if (isset($_GET)) {
	//echo("<br> CONTROLLER GET isset</br>");
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'addAppointment' :
				//$dateArray = explode(" ", $_GET['date']);// for datepickR
				$dateArray = explode("/", $_GET['date']);//for jquery datepicker 
				$dateIntArray = handleDatepickerResponse($dateArray);
				$appointment = new Appointment($_GET['title'], $dateIntArray[0], $dateIntArray[1], $dateIntArray[2], $_GET['note'], $_GET['anchor']);
				insertAppointment($appointment);
				include_once('v/schedule.php');
				break;

			default :
				
				break;
		}
	}else{
		include_once('v/schedule.php');
	}

} else if (isset($_POST)) {
	//echo("<br> CONTROLLER POST</br>");
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
function handleDatepickerResponse($dateArray) {
	//in: array ('August', '20th,', '2014' );
	//out: integer array ( year, month, day)
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
	return $intArray;
}


 
//include_once(GLOBAL_DIR."/glib/global_lib/code_report/code_report.php");

include_once('v/schdeule.php');
?>