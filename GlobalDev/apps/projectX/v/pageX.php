<?php
include_once ('HEADS/default_head.php');
include_once ('HEADS/custom_confirm_head.php');
?>
<?php echo(navigation()); ?>
<div id='content'>
	<p>
		Page X
	</p>
	<?php
	if(1==2){
		$user = unserialize($_SESSION['user']);
		if ($user) {
			echo("<br>user_id:" . $user -> user_id);
			echo("<br>username:" . $user -> username);
			echo("<br>user_password:" . $user -> password);
			$_SESSION['user'] = serialize($user);
		}
		
	}
		
		// JQGRID: version of toobox
		//include_once('pageX/jq_searchable_grid/default.php');
		//This works and is a good example of using a "MODEL" with the jqgrid,
		// however, jqgrid can NOT handle data that contains code with special chars..
		//you cant do that
		
		
		// ACTION LIST version of toolbox
		//include_once('pageX/actionList.php');
		
		include_once('pageX/anchor_table.php');
		
		

	?>
	
</div>
<?php
include_once ('HEADS/html_foot.php');
?>
