<?php
class Schedule_Maker {
	public $controller;
	public function __construct($controller = "mustBeSet") {
		$this -> controller = $controller;
	}

	public function make() {
		$schedulerHTML = "";
		$schedulerHTML .= "
		
<style>
	.schedulerLabel{
		width:100%;
		float:left;
	}
	.scheduler{
		width:500px;
		min-width:125px;
		 border:solid 1px black;
	}
</style>
<div class='container scheduler' style='margin-bottom:30px;'>
	<div>
		Schedule Appointment:
	</div>
	<form name='schedulerForm' method='get' action=" . $_SERVER['PHP_SELF'] . ">
		<input type='hidden'  name='controller' value='".$this->controller."'/>
		<input type='hidden'  name='method' value='addAppointment'/>
	<div>
		<label class='schedulerLabel' >title:</label>
		<input id='title' type='text' name='title' />
	</div>
	<div>
		<label class='schedulerLabel' >note:</label>
		<textarea id='note'   name='note' ></textarea>

	</div>
	<div>
		<label class='schedulerLabel' >anchor:</label>
		<input id='anchor' type='text' name='anchor' />

	</div>
	<div>
		<label class='schedulerLabel' >date:</label>
		<input id='datepickScheduler' name='date' size='30' />
		
	</div>
	<div>
		<button style='width:100%;' onClick='getDateSelected()'>
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
			/*
			//alert('date selected:'+document.getElementById('datepickScheduler').value);
			//something about this process, disturbs the app's session and user object.
			window.location = 'http://localhost/github_globaldev/globaldev/GlobalDev/apps/projectx/controller.php?controller=component.php&method=addAppointment&date='+
			document.getElementById('datepickScheduler').value+
			'&title='+document.getElementById('title').value+
			 '&note='+document.getElementById('note').value+
			 '&anchor='+document.getElementById('anchor').value+''
			;
			*/
			document.schedulerForm.submit();
		}
	</script>
</div>

		";
		
		return $schedulerHTML;

	}

}
?>
