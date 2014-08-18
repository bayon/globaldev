
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
	<form name="schedulerForm" method="get" action=<?=$_SERVER['PHP_SELF'];?>>
		<input type="hidden"  name="controller" value="schedule.php"/>
		<input type="hidden"  name="method" value="addAppointment"/>
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
		<input id="datepickScheduler" name="date" size="30" />
		
	</div>
	<div>
		<button style='width:100%;' onClick="getDateSelected()">
			set
		</button>
	</div>
	</form>
	  <script>
  $(function() {
    $( "#datepickScheduler" ).datepicker();
  });
  </script>
	<script type="text/javascript">
		//new datepickr('datepickScheduler');
		function getDateSelected(){
			 
			document.schedulerForm.submit();
		}
	</script>
</div>