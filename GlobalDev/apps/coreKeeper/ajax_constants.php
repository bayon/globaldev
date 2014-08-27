<?php
//echo("<br>ACTUAL SESSION: <pre>");print_r($_SESSION);echo("</pre>");	
if(isset($user)){
	echo("<script>var user_id = ".$user->user_id.";  </script>");
	$_SESSION['user']=serialize($user);
}else{
	 $user = unserialize($_SESSION['user']);
	//REQUIRED FOR AJAX:
	 echo("<script>var user_id = ".$user->user_id."; </script>");
	$_SESSION['user']=serialize($user);
}
		
?>