<?php

//require_once('./../../global_configs.php');
$debugMode = "off";
if($debugMode == "on"){
	define('DEBUG_MODE',"on");
}else{
	define('DEBUG_MODE',"off");
}

define('SITE_ROOT', GLOBAL_ROOT.'/apps/coreKeeper');
/*============================================================*/
/*-----	AUTOMATED CONFIGS	 ---------------------------------*/
/*============================================================*/
define('BASE_PATH', realpath(dirname(__FILE__)));
if (GLOBAL_ENVIRONMENT == "littleMac") {
	$domain = $_SERVER['HTTP_HOST'];
	//$domain = "172.16.162.61/";
} else {
	$domain = "172.16.162.61/";
}

$hostname = $domain . "/" . SITE_ROOT . "/";
define('BASE_URL', 'http://' . $hostname . '');
define('HOSTNAME', $hostname);
define('DOMAIN', $domain);
//JAVASCRIPT CONFIGS
echo "<script>
var BASE_PATH='" . BASE_PATH . "';
var BASE_URL='" . BASE_URL . "';
</script>";
?>