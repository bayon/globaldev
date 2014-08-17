<?php
// APP SPECIFIC CONSTANTS
//$site_root="GlobalDev/projectX";
include_once ('../../global_includes.php');
define('TITLE', 'Project X');
define('ROOT_DIR', 'projectX');
// !!! IF DIFFERENT THAN THE APPS CONFIG HOSTNAME

if (GLOBAL_ENVIRONMENT == "littleMac") {
	define('HOST_DB', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'root');
	define('APP_DB', 'projectx');
} else {
	define('HOST_DB', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('APP_DB', 'projectx');
}

?>
