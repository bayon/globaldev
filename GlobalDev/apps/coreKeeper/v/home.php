<?php
include_once ('HEADS/default_head.php');
?>
<?php 
		echo(navigation());
		//echo(customCSSMenu());
?>
 
<div id='content'>
	<div class='page_title'>
		Home
	</div>
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
</div>

<div class='todoList'>
	<p>To Do CC:</p>
		<ul>
			<li>user settings: roster,attachments,etc...</li>
			<li>remove unneeded views and controllers</li>
			<li>pre-load codes</li>
			<li>roster</li>
			<li>attachments table to store by user</li>
		</ul>
	
	<p>Done:</p>
		<ul>
			<li>permanent theme</li>
		</ul>
	<p>App Specific Considerations:</p> 
	 
</div>

<?php
include_once ('HEADS/html_foot.php');
?>
