<?php
include_once ('HEADS/default_head.php');
include_once('./components/ajaxStudentForm.php');
?>
<?php 
		echo(navigation());
		//echo(customCSSMenu());
?>
 
<div id='content'>
	<div class='page_title'>
		Home
	</div>
	
	<?php
	$ajaxStudentForm = new ajaxStudentForm("coreKeeper");
	echo($ajaxStudentForm->make());
	
	?>
	<div id='ajaxStudentList'></div>
</div>
<div>
	<?php
		//echo("<br>ACTUAL SESSION: <pre>");print_r($_SESSION);echo("</pre>");
		if(1 ==2){
			if($user){
			echo("<br>user_id:".$user->user_id);
			echo("<br>username:".$user->username);
			echo("<br>user_password:".$user->password);
			$_SESSION['user']=serialize($user);
		}else{
			 $user = unserialize($_SESSION['user']);
			 echo("<br>user_id:".$user->user_id);
			echo("<br>username:".$user->username);
			echo("<br>user_password:".$user->password);
			$_SESSION['user']=serialize($user);
		}
		}
		
	?>
	<?php
	include_once ('./components/ajax_tableHelper_students.php');
	?>
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
	postAjaxForm('method=ajaxSortableStudentsTable&column=firstName&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
<?php
include_once ('HEADS/html_foot.php');
?>
