<?php
include_once ('HEADS/default_head.php');
include_once('./components/ajaxStudentForm.php');
?>
 
<?php include_once('./ajax_constants.php'); ?>
<div id='content'>
	<div class='page_title'>
		Students
	</div>
	
	<?php
	$ajaxStudentForm = new ajaxStudentForm("coreKeeper",$user->user_id);
	echo($ajaxStudentForm->make());
	
	?>
	<div id='ajaxStudentList'></div>
</div>
<div>
	
	<?php
	include_once ('./components/ajax_tableHelper_students.php');
	?>
</div>
 
<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableStudentsTable&user_id='+user_id +'&column=firstName&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
<?php
include_once ('HEADS/html_foot.php');
?>
