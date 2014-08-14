<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<html manifest='cache.appcache'>
	<?php
	include_once ('global_head.php');
	?>
	<style>
		html {
			/*<CENTERING>     */
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
	<div class="global_enterprise_div">
		<a href ="http://localhost/github_globaldev/globaldev/GlobalDev/apps/projectX/index.php">Project X</a>
		<a href ="http://localhost/github_globaldev/globaldev/GlobalDev/apps/projectY/index.php">Project Y</a>

	</div>

