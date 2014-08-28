<?php
if (isset($_GET)) {
	//echo("get");
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'details' :
				include_once ('v/HEADS/default_head.php');
				include_once('components/ajaxStudentEditForm.php');
				//[student_id] => 19
				$student = getStudentWithId($user->user_id,$_GET['student_id']);
				
				include_once ('v/student/details.php');
				break;
			default :
				include_once ('v/whatever_view.php');
				print_r($_GET);
				echo("get default");
				break;
		}
	}else{
		if (isset($_GET['navigation'])) {
			//initial navigation to students page
			include_once ('./v/students.php');
		}
	}

}
if (isset($_POST)) {
	//echo("post ");
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			case 'ajaxStudentFormResults' :			 
		 	$student = new Student("", sanitize($_POST['user_id']), sanitize($_POST['first_name']) , sanitize($_POST['middle_name']) , sanitize($_POST['last_name']) , sanitize($_POST['email']) , sanitize($_POST['phone']) );
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
							$student_id = $myrow['student_id'];
							$firstName = $myrow["firstName"];
							//$statement = $myrow["statement"];
							$textout .= "<tr><td class='ast_width_20pct' ><a href='?navigation=students&method=details&student_id=".$student_id."&firstName=" . $firstName . "' >" . $firstName . "</a></td></tr>";
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
							$student_id = $myrow['student_id'];
							$textout .= "<tr><td class='ast_width_20pct' ><a href='?navigation=students&method=details&student_id=".$student_id."&firstName=" . $firstName . "' >" . $firstName . "</a></td></tr>";
						}
					} else {
						$textout = "";
					}
					echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"ajaxSortableTable\" >" . $textout . "</table>";
				}
				break;
				
			case 'ajaxStudentFormEdit' :
				//echo("Edit Student: <pre>");print_r($_POST);echo("</pre>");
				$student = new Student($_POST['student_id'],$_POST['user_id'],$_POST['first_name'],$_POST['middle_name'],$_POST['last_name'],$_POST['email'],$_POST['phone']);
				updateStudentWithId($student);
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