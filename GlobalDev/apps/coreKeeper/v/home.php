<?php
include_once ('HEADS/default_head.php');
//include_once('./components/ajaxStudentForm.php');
?>

<?php include_once('./ajax_constants.php'); ?>
<div><?php  echo(navigation()); ?></div>
<div id='content' >
	<div class='page_title'>
		Home
	</div>
</div>
 
<div class='todoList'>
	<p>To Do CC:</p>
		<ul>
			<li>user settings: roster,attachments,etc...</li>
			<li>roster</li>
			<li>attachments table to store by user</li>
			<li>lesson plan section</li>
				<ul>
					<li>make list of cc_codes that are pertinent</li>
					<li>make additional notes</li>
					<li>add plan to calendar?</li>
				</ul>
			<li>students section</li>
				<ul>
					<li>scores with attachments</li>
				</ul>
		</ul>
	
	<p>Done:</p>
		<ul>			
			<li>navigation and header disappear till window resize on select code(position fixed issue).After researching appears to be a CHROME bug.</li>
			<li>move students to own section and complete fields for students creation.</li>
			<li>schedule user specific</li>
			<li>log out</li>
			<li>make schedule preselect calendar dates</li>
			<li>permanent theme</li>
			<li>remove unneeded views and controllers( in deprecated folders)</li>
		</ul>
	<p>App Specific Considerations:</p> 
	 
</div>
 

<?php
include_once ('HEADS/html_foot.php');
?>