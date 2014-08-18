<?php
include_once ('HEADS/default_head.php');
include_once ('HEADS/datepicker_head.php');
?>
<?php echo(navigation()); ?>
<div id='content'>
	<div class='page_title'>
		Schedule
	</div>
	<?php
	include_once (GLOBAL_DIR . '/glib/global_components/schedule_maker.php');
	$scheduler = new Schedule_Maker("schedule.php");
	
	//echo("<script> var screenWidth = window.screen.width; alert('screen width:'+ screenWidth); </script>");
	?>
	<div style='width:500px;text-align:center;margin-left:25%;'>
		<?php echo($scheduler -> make()); ?>
		<!-- NOTE !!!: Because this is a class, I believe it LINGERS around after the page has moved on.... -->
		<?php
		$calendarControlPanel = "<div class=' container calendarControlPanel' style='width:500px; ' ><form method='get' action='".$_SERVER['PHP_SELF']."' >";
		$calendarControlPanel .= "<input type='hidden' name='year' value='".$calendar->getYear()."'/>";
		$calendarControlPanel .= "<input type='hidden' name='month' value='".$calendar->getMonth()."'/>";
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

