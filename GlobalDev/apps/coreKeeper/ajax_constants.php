<?php
//echo("<br>ACTUAL SESSION: <pre>");print_r($_SESSION);echo("</pre>");	
if(isset($user)){
	echo("<script>var user_id = ".$user->user_id.";  </script>");
	$_SESSION['user']=serialize($user);
}else{
	if(isset($_SESSION['user'])){
		 $user = unserialize($_SESSION['user']);
		//REQUIRED FOR AJAX:
	 	echo("<script>var user_id = ".$user->user_id."; </script>");
		$_SESSION['user']=serialize($user);
	}
}

if(isset($student)){
	echo("<script>var user_id = ".$student->student_id.";  </script>");
	$_SESSION['student']=serialize($student);
}	else{
	if(isset($_SESSION['student'])){
		 $student = unserialize($_SESSION['student']);
		//REQUIRED FOR AJAX:
	 	echo("<script>var student_id = ".$student->student_id."; </script>");
		$_SESSION['student']=serialize($student);
	}
}
?>