 <?php
if (isset($_GET)) {
	//print_r($_GET);
	
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'logout' :
				// L E F T   O F F    H E R E   
				
				//unset($user);
				//unset($_SESSION);
				//include_once ('v/default_view.php');
				//session_start();
				unset($_SESSION["user"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
				$_SESSION['authorized'] = "no";
				//header("Location: v/default_view.php");
				include_once ('v/default_view.php');
				break;

			default :
				include_once ('v/whatever_view.php');
				print_r($_GET);
				break;
		}
	}

}
if (isset($_POST)) {
	//print_r($_POST);
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			case 'login' :
				$_SESSION['authorized'] = "no";
				$user = new User("", sanitize($_POST['username']), sanitize($_POST['password']));
				$userVerificationResult = login($user);
				if ($userVerificationResult -> user_id != 0) {
					//echo("VERIFIED");
					$user -> setUser_id($userVerificationResult -> user_id);
					$_SESSION['authorized'] = "yes";
					include_once ('v/home.php');
				} else {
					echo("<script> alert('Sorry, we don't recognize you.'); </script>");
					$_SESSION['authorized'] = "no";
					include_once ('v/default_view.php');
				}

				break;

			default :
				include_once ('v/whatever_view.php');
				print_r($_POST);
				break;
		}
	}
}
?>