<?php
// ACTION LIST CONTROLLER CODE
//include_once ('../../../global_includes.php');
//echo("<pre>SESSION:");print_r($_SESSION);echo("</pre>");
if (isset($_GET)) {
	//echo("<br>COMPONENT CONTROLLER GET isset</br>");
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'addAppointment' :
				$dateArray = explode(" ", $_GET['date']);
				$dateIntArray = handleDatepickerResponse($dateArray);
				$appointment = new Appointment($_GET['title'], $dateIntArray[0], $dateIntArray[1], $dateIntArray[2], $_GET['note'], $_GET['anchor']);
				insertAppointment($appointment);
				include_once('v/component.php');
				break;

			default :
				break;
		}
	}

} else if (isset($_POST)) {
	//echo("<br>COMPONENT CONTROLLER POST</br>");
	$searchKey = sanitize($_POST['search_key']);
	switch ($_POST['method']) {
		case 'search' :
			$data = searchUsersForKeyword($searchKey);
			break;
		case 'edit' :
			updateUserWithId($_POST['user_id']);
			$data = getAllUsers();
			break;
		case 'delete' :
			deleteUserWithId($_POST['user_id']);
			break;
		case 'uploadFile' :
			//upload file condition can not be delegated to a separate controller...
			$fileUploadHandler = new FileUpload($_SERVER[PHP_SELF], "uploadFile", "uploads/", "10000000");
			$fileUploadHandler -> handleUpload();
			//insert_procedure_attachment(basename($_FILES['uploadedfile']['name']));
			include_once ('c/component.php');
			break;
		case 'selectComponent' :
			//display component selected
			break;
		default :
			//print_r($_POST);
			//include_once ('v/component.php');
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

//echo("<br>DEFAULT COMPONENT VIEW INCLUDE</br>");
// END action list controller code  Global Utilities are
 
//include_once(GLOBAL_DIR."/glib/global_lib/code_report/code_report.php");

include_once('v/component.php');
?>