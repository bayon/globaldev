<?php
include_once ("REQUIRED_HEAD.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='../../glib/global_css/custom_confirm.css'>
<script type="text/javascript" src="../../glib/global_js/custom_confirm.js"></script>
<?php
include_once("../../glib/global_v/custom_confirm_view.php");


/*----	REQUIRED UI COMPONENTS AND Javascript FUNCTION
 * 
//FORM ONE:
<input type="button" name="test" value="!!!!!" onclick="Confirm.render(\'Delete?\',\'confirmDeletion\',' . $user -> user_id . ')" />
 * 
 * 
// FORM TWO:
$table .= '
	<form name="confirmDeletionForm" method ="post" action="' . $_SERVER['PHP_SELF'] . '">
	<input type="hidden" name="controller" value="component.php"/>
	<input type="hidden" name="method" value="delete"/>
	 <input id="user_id_for_delete" type="hidden" name ="user_id" value=" " />
</form>';
 * 
 * 
// SCRIPT:
<script>
	function confirmDeletion(id){
		alert('confirmDeletion!');
		var uid = document.getElementById('user_id_for_delete');
		uid.value = id;
		document.confirmDeletionForm.submit();
	}
</script>

 * 
 */


?>

