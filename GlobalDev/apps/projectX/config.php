<?php
 define('SITE_ROOT','github_globaldev/globaldev/GlobalDev/apps/projectX');
 //require_once('../../global_configs.php');
/*============================================================*/
/*-----	AUTOMATED CONFIGS	 ---------------------------------*/
/*============================================================*/
define('BASE_PATH', realpath(dirname(__FILE__)));
$domain = $_SERVER['HTTP_HOST'];
$domain = "172.16.162.61/";
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