
<?php /*
 * 
 * SINCE we load the app cache from the globalDev level , we don't need this.....
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<html manifest='cache.appcache'>
 * 
 */
?>
	<?php
session_start();

// this blows up the session object if turned on here?
if(!isset($_SESSION['home'])) {
	$_SESSION['home']="";
}

 
// display errors
ini_set('display_errors', 0);

include_once ('config.php');
include_once ('controller.php');
?>