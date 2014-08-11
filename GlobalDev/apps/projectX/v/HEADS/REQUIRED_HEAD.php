<head>
<title><?=TITLE ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- NOTE: using ../../  instead of GLOBAL_URL is MUCH FASTER...! -->
<link rel="stylesheet" type="text/css" media="screen" href="../../global_jq_suite/themes/dark_custom/jquery-ui.css" />
<link rel='stylesheet' type='text/css' href='../../global_css/index.css'>
<link rel='stylesheet' type='text/css' href='../../global_css/component.css'>

<link rel='stylesheet' type='text/css' href='../../global_lib/UIObjects/ContainerObjects/containerObjects.css'>
<link rel='stylesheet' type='text/css' href='../../global_lib/UIObjects/InputObjects/inputObjects.css'>
<link rel='stylesheet' type='text/css' href='../../global_lib/UIObjects/LabelObjects/labelObjects.css'>



<?php

if (isset($_SESSION['custom_theme'])) {
	switch ($_SESSION['custom_theme']) {
		case 'theme1' :
			echo("<link rel='stylesheet' type='text/css' href='../../global_css/theme1/theme.css'>");
			break;
		case 'theme2' :
			echo("<link rel='stylesheet' type='text/css' href='../../global_css/theme2/theme.css'>");
			break;
		case 'theme3' :
			echo("<link rel='stylesheet' type='text/css' href='../../global_css/theme3/theme.css'>");
			break;
		default :
			break;
	}
}
?>
<!-- THIS NEEDS TO BE THE LAST GLOBAL CSS and THEME AGNOSTIC -->
<link rel='stylesheet' type='text/css' href='../../global_css/global_rwd.css'>
<!-- THIS APPS LAST LINE OF DEFENSE : CSS -->
<link rel='stylesheet' type='text/css' href='css/index.css'>

<script type='text/javascript' src='../../global_js/global.js'></script>
<script type='text/javascript' src='../../global_js/ajax_navigation.js'></script>
<script type='text/javascript' src='../../global_js/rwd.js'></script>
<script type='text/javascript' src='../../global_js/latest_jquery.js'></script>
<script type='text/javascript' src='js/index.js'></script>

<script src="../../global_jq_suite/js/jquery.js" type="text/javascript"></script>
<script src="../../global_jq_suite/js/jquery-ui-custom.min.js" type="text/javascript"></script>
<?php
//include_once('custom_confirm_head.php');
include_once ('navigation.php');
?>