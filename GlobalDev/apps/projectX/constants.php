<?php
// APP SPECIFIC CONSTANTS
//$site_root="GlobalDev/projectX";
//CROSS DEV ENVIRONMENT CHECK: include_once ('../../global_includes.php'); NOT NEEDED BY HP
define('APP_NAME','coreKeeper');// used for attachments,other...
define('TITLE', 'Core Keeper');
define('ROOT_DIR', 'coreKeeper');
define('APP_THEME','theme_coreKeeper');
// !!! IF DIFFERENT THAN THE APPS CONFIG HOSTNAME
if(GLOBAL_ENVIRONMENT =="hp"){
	define('HOST_DB', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('APP_DB', 'coreKeeper');
	
}else  if(GLOBAL_ENVIRONMENT =="littleMac"){
	define('HOST_DB', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'root');
	define('APP_DB', 'coreKeeper');
}else if(GLOBAL_ENVIRONMENT =="live"){
	define('HOST_DB', 'mysql');
	define('USERNAME', 'bayonforte');
	define('PASSWORD', 'foohaahaa');
	define('APP_DB', 'coreKeeper');
	
}

 //!!!  DO NOT FORGET: !!! 
 // js/constants.js
?>
