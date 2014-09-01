<?php
// APP SPECIFIC CONSTANTS
//$site_root="GlobalDev/projectX";
//CROSS DEV ENVIRONMENT CHECK: include_once ('../../global_includes.php'); NOT NEEDED BY HP
define('APP_NAME','construction');// used for attachments,other...
define('TITLE', 'construction');
define('ROOT_DIR', 'construction');
define('APP_THEME','theme_construction');
// !!! IF DIFFERENT THAN THE APPS CONFIG HOSTNAME
if(GLOBAL_ENVIRONMENT =="hp"){
	define('HOST_DB', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('APP_DB', 'construction');
	
}else  if(GLOBAL_ENVIRONMENT =="littleMac"){
	define('HOST_DB', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'root');
	define('APP_DB', 'construction');
}else if(GLOBAL_ENVIRONMENT =="live"){
	define('HOST_DB', 'mysql');
	define('USERNAME', 'bayonforte');
	define('PASSWORD', 'foohaahaa');
	define('APP_DB', 'construction');
	
}

 //!!!  DO NOT FORGET: !!! 
 // js/constants.js
?>
