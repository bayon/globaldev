<?php
function actionList($data) {
	$table = "<div class=' actionList_container'><div class='textAlignLeft'><div class='actionList_title'>Toolbox</div>";
	$table .= searchForm('pageX.php');
	$table .= "</div>";

	$table .= "<div  id='actionList' >";
	$table .= "<table  width=100%  border=0 cellpadding=0 cellspacing=0 >";
	$table .= "<tr><th width=30%  >title</th><th width=30%>os</th><th width=5% >description</th><th width=10% >action</th>";
	foreach ($data as $row) {
		$toolbox = new Toolbox($row['id'], $row['os'], $row['title'], $row['description']);

		$table .= "<tr>";
		$table .= " <form id='editToolboxForm' method='post' action=$_SERVER[PHP_SELF] >";
		$table .= "<input type='hidden' name='controller' value='pageX.php' />";

		$hiddenId = "<input type='hidden' name ='id' value=" . $toolbox -> id . " />";
		$col_os = "<td><textarea  name ='os'  >" . $toolbox -> os . "</textarea></td>";
		$col_title = "<td><textarea class='inputText'  name='title'>" . $toolbox -> title . "</textarea></td>";
		//$col_description = "<td><div class='standard_value'> " . $toolbox -> description . "</div> </td>";
		$col_description = "<td><textarea id=" . $toolbox -> id . " class='inputText'  name='description'>" . $toolbox -> description . "</textarea></td>";

		// TABLE COLUMN DATA ORDER
		$table .= $hiddenId . $col_title . $col_os . $col_description;
		$id = $toolbox -> id;
$table .= "
		 <td>
		<div><input type='button' title='expand' onClick='expand($id)' value='+'></input>
		<input type='button' title='collapse' onClick='collapse($id)' value='-'></input></div>
		 
		
		";
		$table .= '
		
		<input type="submit" name="method" value="edit"/>
	<input type="button" name="method" value="delete" onclick="Confirm.render(\'Are you sure?\',\'confirmDeletion\',' . $toolbox -> id . ')" />
		';

		$table .= "</form></td> ";
		$table .= "</tr>";
	}
	$table .= "</table>";
	//FORM FOR DELETION AFTER JAVASCRIPT CONFIRMATION
	$table .= '
	<form name="confirmDeletionForm" method ="post" action="' . $_SERVER['PHP_SELF'] . '">
	<input type="hidden" name="controller" value="pageX.php"/>
	<input type="hidden" name="method" value="delete"/>
	 <input id="id_for_delete" type="hidden" name ="id" value=" " />
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
		var uid = document.getElementById('id_for_delete');
		uid.value = id;
		document.confirmDeletionForm.submit();
	}
	</script>
	";
	$table .= "<script>
	function expand(id){	
		document.getElementById(id).style.height='300px';
	}
	function collapse(id){	
		document.getElementById(id).style.height='30px';
	}
	</script>";
	return $table;
}

function searchForm($controller) {
	$searchForm .= "<div class='search_form'  >";
	$searchForm .= "<form method='post' action=".$_SERVER[PHP_SELF]." >";
	$searchForm .= "<input type='hidden' name='controller' value='" . $controller . "' />";
	
	$searchForm .= "
		<input id='searchTextInput' type='text' name='search_key'   />
		<input type='submit' name='method'    value='search'/>
		";
	$searchForm .= "</form> ";
	return $searchForm;
}

//purpose: get all users if no search word has been entered.//
if (!isset($_POST['search_key'])) {
	//$data = getAllUsers();
	$data = getAllToolbox();
}
//echo("<pre>");print_r($data_toolbox); echo("</pre>");
$form = actionList($data);
echo($form);
?>
