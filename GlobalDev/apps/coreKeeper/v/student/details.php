 
<?php include_once('./ajax_constants.php'); 

?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>
	 <p>student details for:<?=$student->firstName;?></p>
	<div>
		 <?php
	$ajaxStudentEditForm = new ajaxStudentEditForm("coreKeeper",$user->user_id,$student);
	echo($ajaxStudentEditForm->make());
	
	?>
	</div>
	<ul>
		<li>add attachments</li>
		<li>save score</li>
	</ul>
	 <?php
	include_once ('./components/ajax_tableHelper_ccMath_forStudent.php');
	?>
	
</div>
<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableCCMathTable_forStudent&column=code&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
