<?php  
include_once('cr_customObjectsViewer.php');
 ?>
 <!-- ================================================================
		Describe PHP Object:
		See get_class_methods() and get_class_vars(). -->
		
		 
			<style>
				.TableX_container {
					width: 100%;
					height: 100px;
					max-height: 100px;
					overflow-y: scroll;
					border: solid 2px black;;
					background-color: clear;
					float: left;
				}
				.TableX {
					font-family: arial;
					text-align: left;
					background-color: clear;
				}
				.TableX tr {
					height: 25px;
				}
				
				.TableX tbody {
					height: 100px;
					overflow: hidden;
					overflow-y: auto;
					max-height: 100px;
				}
				.TableX  tr:hover {
					background-color: #333333;
				}
				.TableX  td {
					padding-left: 5px;
					border-bottom: solid 1px #333333;
					color:white;
				}
				.TableX tfoot {
					background-color: #0ff000;
				}
				.TableX tfoot td {
					text-align: center;
					padding-left: 10px;
				}
				.floater {
				float: left;
				width:45%;
				 
			}
			.floaterR {
				float: right;
				width:45%;
				 
			}
			.scroller {
				width: 100%;
				overflow-y: scroll;
				height: 40px;
			}
			.scrollee {
				float: left;
				width: 100%;
			}
			</style>
			 
 			
			 
			<!-- =======================================================  -->

<!--
code_report:
purpose:
log errors, show variables.
how to:
include at the bottom of every file you are concerned with.
include_once('code_report.php');
// make sure you've got the path to it set right.
-->

<style>
	.cr_controls {
		color: white;
		font-family: courier;
		 font-weight:bold;
		font-size: 15px;
	}
	.cr_container {
		border: solid black 2px;
		position: fixed;
		bottom: 0;
		background: #222222;
		width: 100%;
	}
	.cr_location{
		margin-right:30px;
		float:right;
	}
	.cr_content {
		width: 98%;
		display:none;
	}
	.cr_div {
		border: solid black 2px;
		padding: 2px;
		font-family: courier;
		font-size: 14px;
		color: blue;
		background-color: #dddddd;
	}
	.cr_textarea {
		margin-left: 10px;
		font-size: 15px;
		background: black;
		color: green;
		width: 99%;
		height: 35px;
	}
</style>
<?php // inside the php script "code"...
	error_reporting(E_ALL | E_STRICT);
	// display errors
	ini_set('display_errors', 1);
	//Log errors.
	ini_set('log_errors', 1);
	// No error log message max.
	ini_set('log_errors_max_len', 0);
	// Specify log file.
	ini_set('error_log', 'cr_error_log.txt');
	//===================================
?>

<?php //================================================================================
echo("<div class='cr_container'>");
echo("<div class='cr_controls'> Code Report: <label>show<input id='show_hide' onclick='show_hide()' type='checkbox' name='show_hide'  /></label><div class='cr_location'>Location: ".$_SERVER["SCRIPT_NAME"]."</div></div> ");

//===============================================================================
echo("<div id = 'cr_content' class='cr_content'>");
echo("<div class='cr_div'> php includes:</div>");
echo("<textarea class = 'cr_textarea' style = 'color:orange;' >");
echo("INCLUDED FILES:");
var_dump(get_included_files());
echo("</textarea>");

//================================================================================
echo("<div class='cr_div'> php app variables:</div>");
// hopefully just developer created values.
echo("<textarea class = 'cr_textarea' style = 'color:white;'>");

// list of keys to ignore (including the name of this variable)
$ignoreStandard = array('GLOBALS', '_SESSION', '_FILES', '_COOKIE', '_SERVER', '_ENV', 'HTTP_ENV_VARS', 
'SHELL', 'TMPDIR', 'USER', 'COMMAND_MODE', 'SQLiteManager_currentLangue', 'HTTP_USER_AGENT', 
'HTTP_SERVER_VARS', 'HTTP_COOKIE_VARS', '_REQUEST', 'HTTP_POST_VARS', 'HTTP_GET_VARS', 'HTTP_POST_FILES', 
'HTTP_SESSION_VARS' );

$ignoreCustom = array('GLOBALS', '_SESSION', '_FILES', '_COOKIE', '_SERVER', '_ENV', 'HTTP_ENV_VARS', 
'SHELL', 'TMPDIR', 'USER', 'COMMAND_MODE', 'SQLiteManager_currentLangue', 'HTTP_USER_AGENT', 
'HTTP_SERVER_VARS', 'HTTP_COOKIE_VARS', '_REQUEST', 'HTTP_POST_VARS', 'HTTP_GET_VARS', 'HTTP_POST_FILES', 
'HTTP_SESSION_VARS',  'connections','__combobox_initialization_code','statusByIndex','statusByName',
'html','server_mode','page_includes','theUser');

$definedVars = get_defined_vars();
$ignoreArray = $ignoreCustom;
for ($i = 0; $i < count($ignoreArray); $i++) {
	unset($definedVars[$ignoreArray[$i]]);
}
$vars = $definedVars;
print_r(var_dump($vars));
echo('</textarea>');

//============
echo('<div class="cr_div"> php errors:</div>');
echo('<textarea class = "cr_textarea" style = "color:yellow;" >');
//echo("ERROR:");
//var_dump($error)
echo("DEBUG BACKTRACE:");
var_dump(debug_backtrace());
//echo("LAST ERROR:");
//print_r(error_get_last());
echo("</textarea>");
//================================================================================
echo("<div class='cr_div'> php system variables:</div>");
echo("<textarea class = 'cr_textarea' style=''>");
print_r(get_defined_vars());
echo("</textarea>");
//=================================================================================
echo("</div>");
//end content
//=================================================================================
echo("</div>");
//end container
?>

<?php
function crQueryTime($sql,$startTime){
	$endTime = microtime();
		$queryTime = $endTime - $startTime;
		echo("</br>Query Time:</br>".$queryTime."</br>SQL:</br>".$sql);
		//use case: place start time before query call ie. $startTime = microtime();
		// then send the $sql and the $startTime parameters to the method.
}

?>
<script>
	function show_hide() {
		if (document.getElementById("show_hide").checked == true) {
			document.getElementById("cr_content").style.display = "block";
		} else {
			document.getElementById("cr_content").style.display = "none";
		}
	}
</script>