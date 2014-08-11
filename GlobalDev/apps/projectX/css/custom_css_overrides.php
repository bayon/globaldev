<?php
 
if (isset($_POST['override_css'])) {
	switch ($_POST['override_css']) {
		case 'theme1':
			$_SESSION['custom_theme']="theme1";
			break;
		case 'theme2':
			$_SESSION['custom_theme']="theme2";
			break;
		case 'theme3':
			$_SESSION['custom_theme']="theme3";
			break;	
				 
		default:
		$_SESSION['custom_theme']="theme1";
			break;
	}

}
?>