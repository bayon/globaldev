 
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
	
	 
	
</div>