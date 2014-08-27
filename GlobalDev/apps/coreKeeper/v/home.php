<?php
include_once ('HEADS/default_head.php');
include_once('./components/ajaxStudentForm.php');
?>
<?php 
		echo(navigation());
		//echo(customCSSMenu());
?>
<?php include_once('./ajax_constants.php'); ?>
<div id='content'>
	<div class='page_title'>
		Home
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

<div class='todoList'>
	<p>To Do CC:</p>
		<ul>
			<li>make schedule preselect calendar dates</li>
			<li>move students to own section and complete fields for students creation.</li>
			<li>schedule user specific</li>
			<li>log out</li>
			<li>user settings: roster,attachments,etc...</li>
			<li>roster</li>
			<li>attachments table to store by user</li>
			<li>lesson plan section</li>
				<ul>
					<li>make list of cc_codes that are pertinent</li>
					<li>make additional notes</li>
					<li>add plan to calendar?</li>
				</ul>
		</ul>
	
	<p>Done:</p>
		<ul>
			<li>permanent theme</li>
			<li>remove unneeded views and controllers( in deprecated folders)</li>
		</ul>
	<p>App Specific Considerations:</p> 
	 
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
