<?php

include_once ('HEADS/custom_confirm_head.php');
?>

<?php echo(navigation()); ?>
<div id='content'>
	<p>
		COMPONENT
	</p>
	<?php $user = unserialize($_SESSION['user']);
		$viewUserData = false;
		if ($viewUserData) {
			if ($user) {
				echo("<br>user_id:" . $user -> user_id);
				echo("<br>username:" . $user -> username);
				echo("<br>user_password:" . $user -> password);
				$_SESSION['user'] = serialize($user);
			}
		}
	?>

	<?php //include_once (GLOBAL_DIR . '/global_components/contactForm.php'); ?>
	<?php //include_once(GLOBAL_DIR.'/global_components/mail_html.php'); ?>

	<?php

	$rows = 2;
	$cols = 2;
	$columnWidthPercentsArray = array(45, 45);
	$gridMatrix[0][0] = "";
	$gridMatrix[0][1] = "
	<select name='selected_component'>
		<option>map</option>
		<option>datepicker</option>
		<option>attachments</option>
		<option>actionList</option>
		<option>anchorTable</option>
		<option>graph</option>
		<option>ajax</option>
		<option>email html</option>
		<option>calendar</option>
		 
	</select>
	";
/*
 * REQUIRES PURCHASE OF JQSUITE:
		<option>jqgrid_cc</option>
		<option>searchable jq grid</option>
		<option>jq scheduler</option>
 * */
 
	$gridMatrix[1][0] = "";
	$submitButton = new SubmitButton("component.php", "method", "selectComponent");
	$gridMatrix[1][1] = $submitButton -> make();

	$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

	$formObject = new FormObject("post", $_SERVER['PHP_SELF'], $gridObject -> make());
	$form = $formObject -> make();
	echo $form;

	switch ($_POST['selected_component']) {
		case 'map' :
			include_once ('HEADS/geocode_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/map.php');
			break;
		case 'datepicker' :
			include_once ('HEADS/datepicker_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/datepicker.php');
			break;
		case 'attachments' :
			include_once (GLOBAL_DIR . '/glib/global_components/attachments.php');
			break;
		case 'actionList' :
			include_once ('HEADS/custom_confirm_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/actionList.php');
			break;
		case 'anchorTable' :
			include_once (GLOBAL_DIR . '/glib/global_components/anchor_table.php');
			break;
		case 'graph' :
			include_once ('HEADS/graph_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/graph.php');
			break;
		case 'ajax' :
			include_once ('HEADS/default_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/ajax_examples.php');

		case 'email html' :
			include_once ('HEADS/default_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/email_html.php');

		case 'calendar' :
			include_once ('HEADS/default_head.php');
			include_once (GLOBAL_DIR . '/glib/global_components/calendar.php');
			break;

		
			/*
		case 'jqgrid_cc' :
			include_once ('HEADS/jq_suite_head.php');
			include_once (GLOBAL_DIR . '/global_components/jqgrid_cc.php');
			break;
		case 'searchable jq grid' :
			include_once ('HEADS/jq_suite_head.php');
			include_once (GLOBAL_DIR . '/global_components/jq_searchable_grid/default.php');
			break;

		case 'jq scheduler' :
			include_once ('HEADS/default_head.php');
			include_once (GLOBAL_DIR . '/global_components/jq_scheduler/index.php');
			break;
		 */
		default :
			//include_once ('HEADS/custom_confirm_head.php');
			//include_once (GLOBAL_DIR . '/global_components/actionList.php');
			//echo("<div>POST:<pre>");print_r($_POST);echo("</pre></div>");
			//echo("<div>GET:<pre>");print_r($_GET); echo("</pre></div>");
			if ($_POST['method'] == 'search') {
				include_once ('HEADS/custom_confirm_head.php');
				include_once (GLOBAL_DIR . '/glib/global_components/actionList.php');
			}
			break;
	}
	?>
</div>
<?php
//include_once ('/includes/html_foot.php');
//SEARCH: background-image !!
?>

