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
ini_set('display_errors', 0);
//parse errors only
error_reporting(E_PARSE); 

include_once("constants.php");
include_once ('config.php');
include_once ('controller.php');
include_once('app_lib/app_lib_includes.php');
 
?>