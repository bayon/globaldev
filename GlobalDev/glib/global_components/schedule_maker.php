<?php
class Schedule_Maker {
	public $controller;
	public $user_id;
	public function __construct($controller = "mustBeSet",$user_id=0) {
		$this -> controller = $controller;
		$this -> user_id = $user_id;
	}

	public function make() {
		$schedulerHTML = "";
		$schedulerHTML .= "
<div class='container scheduleMakerContainer'  >  ";
	$schedulerHTML .= 'Scheduler:<button id="newFormToggle" onclick="toggleNewFormOn()">+</button><button id="newFormToggle" onclick="toggleNewFormOff()">-</button>';
	$schedulerHTML .='<div id="newFormBody" style="display:none;">';
	$schedulerHTML .= "
	<form name='schedulerForm' method='get' action=" . $_SERVER['PHP_SELF'] . ">
		<input type='hidden'  name='controller' value='".$this->controller."'/>
		<input type='hidden'  name='method' value='addAppointment'/>
		<input type='hidden'  name='user_id' value='".$this->user_id."'/>";
		
		$gridMatrix[0][0] = "title:";
		$gridMatrix[0][1] = "<input id='title' class='iii' type='text' name='title' />";
		$gridMatrix[1][0] = "note:";
		$gridMatrix[1][1] = "<textarea id='note'  class='iii schedulerTextarea'   name='note' ></textarea>";
		$gridMatrix[2][0] = "anchor:";
		$gridMatrix[2][1] = "<input id='anchor'  class='iii' type='text' name='anchor' /> ";
		$gridMatrix[3][0] = "date:";
		$gridMatrix[3][1] = "<input id='datepickScheduler'  class='iii' name='date' size='30' />";
		$gridMatrix[4][0] = "<button  class='iii bbb'  onClick='getDateSelected()'> set </button> ";
		 
		$rows = 5;
		$cols = 2;
		$columnWidthPercentsArray = array(40, 40);
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);
		
		$schedulerHTML .= $gridObject->make();
		
	$schedulerHTML .= "</form></div>";
	$schedulerHTML .= "
	  <script>
  $(function() {
    $( '#datepickScheduler' ).datepicker();
  });
  </script>
	<script type='text/javascript'>
		//new datepickr('datepickScheduler');
		function getDateSelected(){
			 
			document.schedulerForm.submit();
		}function toggleNewFormOn(){
				 
				 document.getElementById('newFormBody').style.display = 'block';
			}
			function toggleNewFormOff(){
				 
				 document.getElementById('newFormBody').style.display = 'none';
			}
	</script>
</div>";
		
		return $schedulerHTML;

	}
	
}
?>
