<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<!-- git must be understood before more work gets lost.
create code in localdev, then hard reset the master to local dev, then push up.
-->

<html manifest='cache.appcache'>
	<?php
	include_once('global_includes.php');
	include_once ('global_head.php');
	?>
	<style>
		html {
			/*<CENTERING>     localhost*/
			text-align: center;
			width: 100%;
			/*</CENTERING> */
		}
		body {
			/*CENTERING */
			width: 100%;
			margin: 0;
			/*</CENTERING> */
			background-color: black;
			background-image: url('glib/global_img/zeroBackground_50.png');
			color: green;
		}
		.global_enterprise_div {

			margin-top: 30px;
			color: white;
			font-size: 30px;
		}
		.global_enterprise_div a {
			color: orange;
			margin-right: 40px;
			font-size: 20px;
		}

		/*------------------iPhone----------------*/
		@media screen and (max-width: 480px) {

			.global_enterprise_div {
				margin-top: 30px;
				color: white;
				font-size: 30px;
			}
			.global_enterprise_div a {
				color: blue;
				margin-right: 40px;
				font-size: 20px;
			}

		}
	</style>
	<div class="global_enterprise_div">
		<p>
			Global Application Development
		</p>
	</div>
	<?php
	$domain = "172.16.162.61";
	echo("<br>GLOBAL URL:".GLOBAL_URL);
	//GLOBAL URL:http://localhost:8888/github_globaldev/globaldev/GlobalDev
	?>
	<div class="global_enterprise_div">
		<a href =<?=GLOBAL_URL;?>/apps/projectX/index.php>Project X</a>

	</div>

