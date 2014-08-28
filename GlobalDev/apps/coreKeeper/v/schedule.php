<?php
include_once ('HEADS/default_head.php');
include_once ('HEADS/datepicker_head.php');
?>
 
<?php include_once('./ajax_constants.php'); ?>
<?php 
$kvArray = array(
	array('id'=>'subnav1','value'=>'appts','subnav_function'=>'ajaxSubNavigate("appointment","subnavToAppt")'),
	array('id'=>'subnav2','value'=>'specials','subnav_function'=>'ajaxSubNavigate("specials","subnavToSpecials")')
);
echo(subnavigation("schedule.php",$kvArray)); 

?>
<div id='content'>
	<div class='page_title'>
		Schedule
	</div>
	<?php
	include_once (GLOBAL_DIR . '/glib/global_components/schedule_maker.php');
	//echo("<br>SCHEDULER.php user_id:".$user->user_id);die();
	$scheduler = new Schedule_Maker("schedule.php",$user->user_id);
// new Calendar
	//echo("<script> var screenWidth = window.screen.width; alert('screen width:'+ screenWidth); </script>");
	?>
	<script>
		//alert("avail width:" + window.screen.availWidth);
	</script>
	<div style='width:320px;text-align:center;'>
		<?php echo($scheduler -> make()); ?>
		<!-- NOTE !!!: Because this is a class, I believe it LINGERS around after the page has moved on.... -->
		<?php
		$calendarControlPanel = "<div class=' container calendarControlPanel' style='width:320px; ' ><form method='get' action='" . $_SERVER['PHP_SELF'] . "' >";
		$calendarControlPanel .= "<input type='hidden' name='year' value='" . $calendar -> getYear() . "'/>";
		$calendarControlPanel .= "<input type='hidden' name='month' value='" . $calendar -> getMonth() . "'/>";
		$calendarControlPanel .= "<input type='hidden' name='controller' value='schedule.php'/>";
		$calendarControlPanel .= "<input type='hidden' name='method' value='changeMonth'/>";
		$calendarControlPanel .= "<input type='submit' class='back' name='direction' value='back'></input>";
		$calendarControlPanel .= "<input type='submit' class = 'fwd' name='direction' value='fwd'></input>";

		$calendarControlPanel .= "</form></div>";

		echo($calendarControlPanel);

		//get month as number date('n')
		?>
		<?= $calendar -> render(); ?>
	 </div>
	 
</div>
 <!--
 	jumps start calendar with appointments.....
 	<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableStudentsTable&user_id='+user_id +'&column=firstName&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
 -->

