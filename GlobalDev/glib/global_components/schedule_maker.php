<?php
class Schedule_Maker {
	public $controller;
	public function __construct($controller = "mustBeSet") {
		$this -> controller = $controller;
	}

	public function make() {
		$schedulerHTML = "";
		$schedulerHTML .= "
		

<div class='container scheduler' >
	<div class='schedulerRow schedulerTitle'>
		Scheduler
	</div>
	<form name='schedulerForm' method='get' action=" . $_SERVER['PHP_SELF'] . ">
		<input type='hidden'  name='controller' value='".$this->controller."'/>
		<input type='hidden'  name='method' value='addAppointment'/>
	<div class='schedulerRow'>
		<div class='schedulerLabel' >title:</div>
		<input id='title' class='schedulerInput' type='text' name='title' />
	</div>
	<div class='schedulerRow'>
		<div class='schedulerLabel' >note:</div>
		<textarea id='note'  class='schedulerInput schedulerTextarea'   name='note' ></textarea>
	</div>
	<div class='schedulerRow'>
		<div class='schedulerLabel' >anchor:</div>
		<input id='anchor'  class='schedulerInput' type='text' name='anchor' />
	</div>
	<div class='schedulerRow'>
		<div class='schedulerLabel' >date:</div>
		<input id='datepickScheduler'  class='schedulerInput' name='date' size='30' />
	</div>
	<div class='schedulerRow'>
		<button    class='schedulerInput schedulerButton'  onClick='getDateSelected()'>
			set
		</button>
	</div>
	</form>
	  <script>
  $(function() {
    $( '#datepickScheduler' ).datepicker();
  });
  </script>
	<script type='text/javascript'>
		//new datepickr('datepickScheduler');
		function getDateSelected(){
			 
			document.schedulerForm.submit();
		}
	</script>
</div>";
		
		return $schedulerHTML;

	}

}
?>
