<?php
//include_once ("../constants.php");
//include_once ("../config.php");

if(isset($_POST['method'])){
	switch ($_POST['method']) {
	case 'ajaxSortableCCMathTable' :
		if (isset($_POST['searchKey'])) {
			//SEARCH BY KEYWORD 
			$textout = "";
			$db = "cc";
			$table = "cc_math";
			if (isset($_POST)) {
				mysql_connect(HOST_DB, USERNAME, PASSWORD);
				$sql = "SELECT * FROM " . $db . "." . $table . "  WHERE 1=1 AND code like '%".$_POST['searchKey']."%' OR statement like '%".$_POST['searchKey']."%'ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
				//echo("<br>sql:".$sql);
				$result = mysql_query($sql);
				//echo(mysql_error());
				while ($myrow = mysql_fetch_array($result)) {
					$code = $myrow["code"];
					$statement = $myrow["statement"];

					$textout .= "<tr>
		<td class='ast_width_20pct' >" . $code . "</td>
		<td  class='ast_width_20pct'>" . $statement . "</td>
		
		</tr>";
				}
				
				
			} else {
				$textout = "";
			}
			echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";

		} else {
		//REGULAR SORT
			$textout = "";
			$db = "cc";
			$table = "cc_math";
			if (isset($_POST)) {
				//echo("<pre>");print_r($_POST);echo("</pre>");
				mysql_connect(HOST_DB, USERNAME, PASSWORD);
				$sql = "SELECT * FROM " . $db . "." . $table . " ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
				//echo("<br>sql:".$sql);
				$result = mysql_query($sql);
				//echo(mysql_error());
				while ($myrow = mysql_fetch_array($result)) {
					$code = $myrow["code"];
					$statement = $myrow["statement"];

					$textout .= "<tr>
		<td class='ast_width_20pct' >" . $code . "</td>
		<td  class='ast_width_20pct'>" . $statement . "</td>
		
		</tr>";
				}
			} else {
				$textout = "";
			}
			echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";

		}

		break;
}
}

include_once('v/ajaxTable.php');
?>