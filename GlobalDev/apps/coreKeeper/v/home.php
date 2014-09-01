
<?php include_once ('HEADS/default_head.php');?>

<div id='content' >
	<div class='page_title'>
		Home
	</div>
</div>
 
<div class='todoList'>
	<p>To Do CC:</p>
		<ul>
			
			<li>STUDENTS:</li>
				<ul>
					<li>scores with attachments</li>
					
				</ul>
			<li>CALENDAR: </li>
				<ul>
					<li> link to appt details?</li>
				</ul>
			
			<li>LESSON PLAN:</li>
				<ul>
					<li>make list of cc_codes that are pertinent</li>
					<li>make additional notes</li>
					<li>add plan to calendar?</li>
				</ul>
			<li>idea: form built based on model object of table or entity.</li>
		</ul>
	
	<p>Done:</p>
		<ul>
			<li>calendar backward forwards errors, also lose calendar appointments</li>
			<li>Scoring layout into grid layout.Style</li>
			<li>add student form : hide on submit and change text for submit button</li>
			<li>students.php controller fn handleCodeSelection() find right place to make this globally available.</li>
			<li>translate the scheduler to the grid layout.</li>
			<li>assure SQL backup process, for new sql during dev.</li>
				<ul>
					<li>sql_backups folder in each apps root dir.</li>
					<li>export whole project db</li>
					<li>save in sql_backups prefix year.month.day. to the file name.</li>
				</ul>
			<li>figure out how to delete unused files.</li>
			<li>navigate to student details</li>
			<li>hide/show new student form</li>
			<li>delete or move deleted files to a different folder</li>
			<li>attachments table to store by user, and deletable(in db only)</li>			
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
