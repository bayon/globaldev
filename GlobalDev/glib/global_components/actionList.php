<?php
function actionList($data) {
	$table = "<div class=' actionList_container'><div class='textAlignLeft'><div class='actionList_title'>Users</div>";
	$table .= searchForm('component.php');
	$table .= "</div>";

	$table .= "<div  id='actionList' >";
	$table .= "<table  width=100%  border=0 cellpadding=0 cellspacing=0 >";
	$table .= "<tr><th width=30%  >password</th><th width=30%>username</th><th width=5% >email</th><th width=10% >action</th>";
	foreach ($data as $row) {
		$user = new User($row['user_id'], $row['username'], $row['password'], $row['email']);

		$table .= "<tr>";
		$table .= " <form id='editUserForm' method='post' action=$_SERVER[PHP_SELF] >";
		$table .= "<input type='hidden' name='controller' value='component.php' />";

		$hiddenId = "<input type='hidden' name ='user_id' value=" . $user -> user_id . " />";
		$col_username = "<td><textarea  name ='username'  >" . $user -> username . "</textarea></td>";
		$col_password = "<td><textarea class='inputText'  name='password'>" . $user -> password . "</textarea></td>";
		$col_email = "<td><div class='standard_value'> " . $user -> email . "</div> </td>";

		// TABLE COLUMN DATA ORDER
		$table .= $hiddenId . $col_password . $col_username . $col_email;
		$table .= '
		<td>
		<input type="submit" name="method" value="edit"/>
	<input type="button" name="method" value="delete" onclick="Confirm.render(\'Are you sure?\',\'confirmDeletion\',' . $user -> user_id . ')" />
		';

		$table .= "</form></td> ";
		$table .= "</tr>";
	}
	$table .= "</table>";
	//FORM FOR DELETION AFTER JAVASCRIPT CONFIRMATION
	$table .= '
	<form name="confirmDeletionForm" method ="post" action="' . $_SERVER['PHP_SELF'] . '">
	<input type="hidden" name="controller" value="component.php"/>
	<input type="hidden" name="method" value="delete"/>
	 <input id="user_id_for_delete" type="hidden" name ="user_id" value=" " />
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
		var uid = document.getElementById('user_id_for_delete');
		uid.value = id;
		document.confirmDeletionForm.submit();
	}
	</script>
	";
	return $table;
}

function searchForm($controller) {
	$searchForm .= "<div class='search_form'  >";
	$searchForm .= "<form method='post' action=$_SERVER[PHP_SELF] >";
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
	$data = getAllUsers();
}

$form = actionList($data);
echo($form);
?>
