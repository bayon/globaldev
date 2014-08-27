<?php

class Appointment{
	public $user_id;
	public $title;
	public $year;
	public $month;
	public $day;
	public $note;
	public $anchor;
	
	public function __construct($user_id=0,$title ="",$year ="",$month="",$day="",$note="",$anchor=""){
		$this -> user_id = $user_id;	
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
function getAppointmentByDay($user_id,$day,$month,$year) {
	//echo("<br>fn getAppointmentByDay");
	$dbh = appConnectPDO();
	$sql = "SELECT * FROM ".APP_DB.".appointments 
 WHERE user_id= $user_id AND day = $day AND month = $month AND year = $year;";
 //echo($sql);
 //echo($dbh->query($sql));
 	foreach ($dbh->query($sql) as $row) {
		$data = $row;
	}
 
	
	 
	if(isset($data)){
		$appt = new Appointment($data['user_id'],$data['title'],$data['year'],$data['month'],$data['day'], $data['note'], $data['anchor']);
		$data = null;
		$dbh = null;
		
	}else{
		$appt = new Appointment();
	}
	return $appt;
}

 
function insertAppointment($appointment) {
	//echo("<br>fn insertAppointment");
	$dbh = appConnectPDO();
	$sql = "INSERT INTO ".APP_DB.".appointments (id,user_id,title,year,month,day,note,anchor) VALUES ('NULL',
	'" . $appointment -> user_id . "',
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
