
<?php
		//echo("<br>ACTUAL SESSION: <pre>");print_r($_SESSION);echo("</pre>");
		//Do asynchronous requests NOT have access to session data?
		//  L E F T   O F F   H E R E    
		if(1 ==2){
			if($user){
			echo("<br>user_id:".$user->user_id);
			echo("<br>username:".$user->username);
			echo("<br>user_password:".$user->password);
			$_SESSION['user']=serialize($user);
		}else{
			 $user = unserialize($_SESSION['user']);
			 echo("<br>user_id:".$user->user_id);
			echo("<br>username:".$user->username);
			echo("<br>user_password:".$user->password);
			$_SESSION['user']=serialize($user);
		}
		}
		
?>
<?php

if (isset($_GET)) {
	//echo("get");
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'whatever' :
				break;
			default :
				include_once ('v/whatever_view.php');
				print_r($_GET);
				echo("get default");
				break;
		}
	}

}
if (isset($_POST)) {
	//echo("post ");
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			case 'ajaxStudentFormResults' :			 
		 	$student = new Student("", sanitize($_POST['user_id']), sanitize($_POST['first_name']) );
			 //add fields here and in the model.
			 createStudent($student);
			 
				break;

			case 'ajaxSortableStudentsTable' :
				
				//local constants
				$textout = "";
					$db = "coreKeeper";
					$table = "student";
				
				//echo('success'); 
				if (isset($_POST['searchKey'])) {
					//SEARCH BY KEYWORD
					//$textout = "";
					//$db = "coreKeeper";
					//$table = "student";
					if (isset($_POST)) {
						mysql_connect(HOST_DB, USERNAME, PASSWORD);
						$sql = "SELECT * FROM " . $db . "." . $table . "  WHERE user_id=" . $_POST['user_id'] . " AND firstName like '%" . $_POST['searchKey'] . "%' OR lastName like '%" . $_POST['searchKey'] . "%'ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
						$result = mysql_query($sql);
						while ($myrow = mysql_fetch_array($result)) {
							$firstName = $myrow["firstName"];
							//$statement = $myrow["statement"];
							$textout .= "<tr><td class='ast_width_20pct' ><a href='?navigation=students&firstName=" . $firstName . "' >" . $firstName . "</a></td></tr>";
						}

					} else {
						$textout = "";
						//echo("<br>textout nothing  ...");
					}
					echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";

				} else {
					 
					//REGULAR SORT
					
					if (isset($_POST)) {
						//echo("<pre>");print_r($_POST);echo("</pre>");
						mysql_connect(HOST_DB, USERNAME, PASSWORD);
						$sql = "SELECT * FROM " . $db . "." . $table . " WHERE  user_id=" . $_POST['user_id'] . "  ORDER BY " . $_POST['column'] . " " . $_POST['direc'] . " ";
						$result = mysql_query($sql);
						while ($myrow = mysql_fetch_array($result)) {
							$firstName = $myrow["firstName"];
							//$statement = $myrow["statement"];
							$textout .= "<tr><td class='ast_width_20pct' ><a href='?navigation=students&firstName=" . $firstName . "' >" . $firstName . "</a></td> </tr>";
						}
					} else {
						$textout = "";
					}
					echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";
				}
				break;
			default :
				include_once ('v/whatever_view.php');
				print_r($_POST);
				echo("post default");
				break;
		}
	}
} else {
	echo("foo nami");
	print_r($_POST);
}

?>