<?php
include_once ('HEADS/default_head.php');
?>

<?php  
	$homeAnchor = "<div>  <a id='logout' href='".GLOBAL_URL."/index.php?'>HOME</a> </div>";
 	echo($homeAnchor);
?>

<div id='content'>
	<div class='page_title'>
		<?=TITLE;?>
	</div>
<?php


	$loginForm = new LoginForm();
	$login = $loginForm -> make();
	$gridMatrix[0][0] = $login;
	$columnWidthPercentsArray = array(40, 40, 10);
	$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);
	echo($gridObject -> make());
?>
<?php
	$signupForm = new SignupForm();
	$signup = $signupForm -> make();
	$gridMatrix2[0][0] = $signup;

	$columnWidthPercentsArray2 = array(40, 40, 10);
	$gridObject2 = new GridObject($gridMatrix2, $columnWidthPercentsArray2);
	echo($gridObject2 -> make());
?>
</div>

<?php
include_once ('HEADS/html_foot.php');
?>
