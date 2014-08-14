<?php

class Appointment{
	public $year;
	public $month;
	public $day;
	public $note;
	public $anchor;
	
	public function __construct($year ="",$month="",$day="",$note="",$anchor=""){
		$this->year = $year;
		$this->month = $month;
		$this->day = $day;
		$this->note = $note;
		$this->anchor = $anchor;
	}
	public function getDay(){
		return $this->day;
	}
	
}
function getAppointmentByDay($day) {
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".appointments 
 WHERE day = $day;";
	foreach ($dbh->query($sql) as $row) {
		$data[] = $row;
	}
	//print_r($data);
	$dbh = null;
	$appt = new Appointment(2014,8,$data[0]['day'], $data[0]['note'], $data[0]['anchor']);
	//echo("<br>".$appt->getDay());
	return $appt;
}


?>
