<?php
session_start();

// this blows up the session object if turned on here?
/*
if(!isset($_SESSION['home'])) {
	$_SESSION['home']="";
}
 * 
 */

// display errors
ini_set('display_errors', 1);

include_once ('../../global_includes.php');

include_once("constants.php");
include_once ('config.php');
include_once ('controller.php');
include_once('app_lib/app_lib_includes.php');

/* QUICK GLOBAL CHECK:
echo("<br>GLOBAL_ENVIRONMENT".GLOBAL_ENVIRONMENT);
echo("<br>GLOBAL_ROOT".GLOBAL_ROOT);
echo("<br>GLOBAL_URL".GLOBAL_URL);
echo("<br>GLOBAL_DIR".GLOBAL_DIR);
 */
?>