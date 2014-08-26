<?php
//include_once ("../constants.php");
//include_once ("../config.php");
function init(){
	//REGULAR SORT
	$textout = "";
	$db = "cc";
	$table = "cc_math";
	$defaultColumn="code";
	$defaultDirec ="";
	mysql_connect(HOST_DB, USERNAME, PASSWORD);
	$sql = "SELECT * FROM " . $db . "." . $table . " ORDER BY " . $defaultColumn. " " . $defaultDirec . " ";
	$result = mysql_query($sql);
	while ($myrow = mysql_fetch_array($result)) {
		$code = $myrow["code"];
		$statement = $myrow["statement"];
		$textout .= "<tr> <td class='ast_width_20pct' ><a href='?navigation=ccDetails&ccode=" . $code . "' >" . $code . "</a></td></tr>";
	}
 
	$codesTable =  "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";
	return $codesTable;
}
  
if (isset($_POST['method'])) {
	switch ($_POST['method']) {
		case 'ajaxSortableCCMathTable' :
			if (isset($_POST['searchKey'])) {
				//SEARCH BY KEYWORD
				$textout = "";
				$db = "cc";
				$table = "cc_math";
				if (isset($_POST)) {
					mysql_connect(HOST_DB, USERNAME, PASSWORD);
					$sql = "SELECT * FROM " . $db . "." . $table . "  WHERE 1=1 AND code like '%" . $_POST['searchKey'] . "%' OR statement like '%" . $_POST['searchKey'] . "%'ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
					$result = mysql_query($sql);
					while ($myrow = mysql_fetch_array($result)) {
						$code = $myrow["code"];
						$statement = $myrow["statement"];
						$textout .= "<tr><td class='ast_width_20pct' ><a href='?navigation=ccDetails&ccode=" . $code . "' >" . $code . "</a></td></tr>";
					}

				} else {
					$textout = "";
					//echo("<br>textout nothing  ...");
				}
				echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";

			} else {
				//echo("<br>Regular sort?:");
				//REGULAR SORT
				$textout = "";
				$db = "cc";
				$table = "cc_math";
				if (isset($_POST)) {
					//echo("<pre>");print_r($_POST);echo("</pre>");
					mysql_connect(HOST_DB, USERNAME, PASSWORD);
					$sql = "SELECT * FROM " . $db . "." . $table . " ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
					$result = mysql_query($sql);
					while ($myrow = mysql_fetch_array($result)) {
						$code = $myrow["code"];
						$statement = $myrow["statement"];
						$textout .= "<tr><td class='ast_width_20pct' ><a href='?navigation=ccDetails&ccode=" . $code . "' >" . $code . "</a></td> </tr>";
					}
				} else {
					$textout = "";
				}
				echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";
			}

			break;
		default:
			//echo('default WTF?');
			 include_once ('v/ccCodes.php');
		break;
	}
}
//print_r($_POST);
/*
 * Array ( [controller] => ajax_controller [method] => ajaxSortableCCMathTable [column] => code [direc] => desc [searchKey] => irrational ) 
 */
 if(!isset($_POST['controller'])){
 	//include_once ('v/ajaxTable.php');
	// HERE IS THE INIT FOR THIS PAGE
	 
	 include_once ('v/ccCodes.php');
 }

?>