<?php
include_once ('HEADS/default_head.php');
include_once('./components/ajaxJobsForm.php');
?>
 
<?php include_once('./ajax_constants.php'); ?>
<div id='content'>
	<div class='page_title'>
		JObs
	</div>
	
	<?php
	$ajaxJobsForm = new ajaxJobsForm("construction",$user->user_id);
	echo($ajaxJobsForm->make());
	
	?>
	<div id='ajaxJobsList'></div>
</div>
<div>
	
	<?php
	include_once ('./components/ajax_tableHelper_jobs.php');
	?>
</div>
 
<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableJobsTable&user_id='+user_id +'&column=description&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
<?php
include_once ('HEADS/html_foot.php');
?>
