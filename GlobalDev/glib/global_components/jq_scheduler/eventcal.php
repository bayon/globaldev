<?php
include_once("../../global_configs.php");
require_once "../../global_jq_suite/php/jqUtils.php";
require_once "../../global_jq_suite/php/jqScheduler.php";
require_once "../../global_jq_suite/php/jqGridPdo.php";
require_once '../../global_jq_suite/jq-config.php';
ini_set("display_errors",0);
$conn = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
$conn->query("SET NAMES utf8");
$eventcal = new jqScheduler($conn);
$eventcal->setLocale('en_GB');
$eventcal->setUrl(GLOBAL_URL.'/global_components/jq_scheduler/eventcal.php');
$eventcal->setUser(1);
$eventcal->setUserNames(array('1'=>"Calender User 1",'2'=>"Calendar user 2") );
$eventcal->render();
?>
