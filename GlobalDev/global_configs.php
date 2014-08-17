<?php
define('GLOBAL_DIR', realpath(dirname(__FILE__)));
$devLocation = "littleMac";
if($devLocation != "littleMac"){
	define('GLOBAL_ROOT', 'github_globaldev/globaldev/GlobalDev');
	define('GLOBAL_ENVIRONMENT',"other");
}else{
	define('GLOBAL_ROOT', 'forteworks/globaldev/GlobalDev');
	define('GLOBAL_ENVIRONMENT',"littleMac");
}

/*============================================================*/
/*-----	AUTOMATED CONFIGS	 ---------------------------------*/
/*============================================================*/
define('GLOBAL_PATH', realpath(dirname(__FILE__)));
$global_domain = $_SERVER['HTTP_HOST'];
$global_hostname = $global_domain . "/" . GLOBAL_ROOT;
define('GLOBAL_URL', 'http://' . $global_hostname . '');
define('GLOBAL_HOSTNAME', $global_hostname);
define('GLOBAL_DOMAIN', $global_domain);
//JAVASCRIPT CONFIGS
//echo "<script>var GLOBAL_PATH='" . GLOBAL_PATH . "';</script>";
//echo "<script>var GLOBAL_URL='" . GLOBAL_URL . "';</script>";
?>