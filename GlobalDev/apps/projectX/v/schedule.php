<?php  
include_once ('HEADS/default_head.php');
include_once ('HEADS/datepicker_head.php');
?>
<?php echo(navigation()); ?>
<div id='content'>
	<p>
		Schedule
	</p>
	<?php
	include_once (GLOBAL_DIR . '/glib/global_components/calendar.php');
	?>
</div>
