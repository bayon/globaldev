<?php

class Appointment{
	public $title;
	public $year;
	public $month;
	public $day;
	public $note;
	public $anchor;
	
	public function __construct($title ="",$year ="",$month="",$day="",$note="",$anchor=""){
		$this->title = $title;
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
		$data = $row;
	}
	 
	if(isset($data)){
		$appt = new Appointment($data['title'],$data['year'],$data['month'],$data['day'], $data['note'], $data['anchor']);
		$data = null;
		$dbh = null;
		
	}else{
		$appt = new Appointment();
	}
	return $appt;
}

 
function insertAppointment($appointment) {
	$dbh = appConnectPDO();
	$sql = "INSERT INTO ".APP_DB.".appointments (id,title,year,month,day,note,anchor) VALUES ('NULL',
	'" . $appointment -> title . "',
	'" . $appointment -> year . "'
	,'" . $appointment -> month . "'
	,'" . $appointment -> day . "'
	,'" . $appointment -> note . "'
	,'" . $appointment -> anchor . "')";
	$dbh -> query($sql);
	$dbh = null;
}
?>
