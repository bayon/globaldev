 
<?php include_once('./ajax_constants.php'); 

?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>
	 <p>student:&nbsp;<?=$student->firstName;?></p>
	<div>
		 <?php
	$ajaxStudentEditForm = new ajaxStudentEditForm("coreKeeper",$score->id,$student);
	echo($ajaxStudentEditForm->make());
	
	?>
	</div>
	
	 
	 <?php
	include_once ('./components/ajax_tableHelper_ccMath_forStudent.php');
	?>
	
	<div style='float:left;margin-left:15%;margin-bottom:20px;margin-top:30px;max-height:100px;overflow-y:scroll;border:solid black 1px;'>
		
		<?php //echo("<pre>");print_r($scores);echo("</pre>"); ?>
	</div>
	<div style='float:left;'>
		<?php
		$form = actionList_studentScores($scores,$user,$student);
			echo($form);
		?>
	</div>
	
</div>
<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableCCMathTable_forStudent&column=code&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
<?php
function actionList_studentScores($data,$user,$student) {
	echo("<br> actionlist with data:");print_r($data);
	echo("<br>username:".$user->username);
	echo("<br>student first name : ".$student->firstName);
	$table = "<div class=' actionList_container'><div class='textAlignLeft'><div class='actionList_title'>scores</div>";
	$table .= searchForm_studentScores('students.php',$user,$student);
	$table .= "</div>";

	$table .= "<div  id='actionList' >";
	$table .= "<table  width=100%  border=0 cellpadding=0 cellspacing=0 >";
	$table .= "<tr><th width=10%  >code</th><th width=10%>score</th><th width=15% >notes</th><th width=15% >date_created</th><th width=10% >action</th>";
	foreach ($data as $row) {
		//	public function __construct($id = "0", $user_id = "default", $student_id = "default", $code = "default", $score = "default", $attach_id = "default", $notes = "default", $date_created = "default") {
		
		$score = new Score($row['id'],$row['user_id'], $row['student_id'], $row['code'],$row['score'], $row['attach_id'], $row['notes'], $row['date_created']);

		$table .= "<tr>";
		$table .= " <form id='editscoreForm' method='post' action=$_SERVER[PHP_SELF] >";
		$table .=  "<input type='hidden' name='user_id' value='" . $user-> user_id . "' />";
		$table .=  "<input type='hidden' name='student_id' value='" . $student-> student_id . "' />";
		$table .= "<input type='hidden' name='controller' value='students.php' />";

		$hiddenId = "<input type='hidden' name ='score_id' value=" . $score -> id . " />";
		$col_score = "<td><textarea  disabled name ='score'  >" . $score -> score . "</textarea></td>";
		$col_code = "<td><textarea disabled class='inputText'  name='code'>" . $score -> code . "</textarea></td>";
		$col_notes = "<td><textarea disabled  class='inputText'  name='notes'>" . $score -> notes . "</textarea></td>";
		$col_date_created = "<td><div class='standard_value'> " . $score -> date_created . "</div> </td>";

		// TABLE COLUMN DATA ORDER
		$table .= $hiddenId . $col_code . $col_score . $col_notes. $col_date_created;
		$table .= '
		<td>
	
		<input type="submit" name="method" value="delete score"/>
		';
//	<input type="button" name="method" value="delete" onclick="Confirm.render(\'Are you sure?\',\'confirmDeletion\',' . $score -> id . ')" />

		$table .= "</form></td> ";
		$table .= "</tr>";
	}
	$table .= "</table>";
	//FORM FOR DELETION AFTER JAVASCRIPT CONFIRMATION
	$table .= '
	<form name="confirmDeletionForm" method ="post" action="' . $_SERVER['PHP_SELF'] . '">
	<input type="hidden" name="controller" value="students.php"/>
	<input type="hidden" name="method" value="delete"/>
	 <input id="score_id_for_delete" type="hidden" name ="score_id" value=" " />
</form>
	';

	$table .= "</div></div>";
	$table .= "
	
	<script>
	/*pupose:to put focus back on the search input textbox.*/
	setfocus();
		function setfocus()
		{
		document.getElementById('searchTextInput').focus()
		}
	</script>
	<script>
	function confirmDeletion(id){
		alert('confirmDeletion!');
		var uid = document.getElementById('score_id_for_delete');
		uid.value = id;
		document.confirmDeletionForm.submit();
	}
	</script>
	";
	return $table;
}

function searchForm_studentScores($controller,$user,$student) {
	$searchForm = "<div class='search_form'  >";
	$searchForm .= "<form method='post' action=$_SERVER[PHP_SELF] >";
	$searchForm .= "<input type='hidden' name='controller' value='" . $controller . "' />";
	$searchForm .= "
	<input   type='hidden' name='user_id'  value='" . $user -> user_id . "'  />
	<input   type='hidden' name='student_id' value='" . $student->student_id . "'   />
		<input id='searchTextInput' type='text' name='search_key'   />
		<input type='submit' name='method'    value='studentScoreSearch'/>
		";
	$searchForm .= "</form> ";
	return $searchForm;
}

 


?>
