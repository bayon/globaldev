<?php  
include_once ('HEADS/default_head.php');

?>
<?php echo(navigation()); ?>
<div id='content'>
	<div class='page_title'>
		Files and Attachments
	</div>
	<?php
	include_once (GLOBAL_DIR . '/glib/global_components/attachments.php');
	?>
</div>
