<?php  
include_once ('HEADS/default_head.php');

?>
<?php echo(navigation()); ?>
<div id='content'>
	<p>
		Files and Attachments
	</p>
	<?php
	include_once (GLOBAL_DIR . '/glib/global_components/attachments.php');
	?>
</div>
