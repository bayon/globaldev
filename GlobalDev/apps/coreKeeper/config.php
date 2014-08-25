<?php

//require_once('./../../global_configs.php');

if (GLOBAL_ENVIRONMENT == "littleMac") {
	define('SITE_ROOT', 'forteworks/globaldev/GlobalDev/apps/coreKeeper');
} else {
	define('SITE_ROOT', 'gdev/globaldev/GlobalDev/apps/coreKeeper');
}

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