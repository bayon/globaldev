 
<?php include_once('./ajax_constants.php'); 

?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>
	 <p>student:&nbsp;<?=$student->firstName;?></p>
	<div>
		 <?php
	$ajaxStudentEditForm = new ajaxStudentEditForm("coreKeeper",$user->user_id,$student);
	echo($ajaxStudentEditForm->make());
	
	?>
	</div>
	
	 
	 <?php
	include_once ('./components/ajax_tableHelper_ccMath_forStudent.php');
	?>
	
	<div style='float:left;margin-left:15%;margin-bottom:20px;margin-top:30px;max-height:100px;overflow-y:scroll;border:solid black 1px;'>
		
		<?php echo("<pre>");print_r($scores);echo("</pre>"); ?>
	</div>
	
</div>
<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableCCMathTable_forStudent&column=code&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
