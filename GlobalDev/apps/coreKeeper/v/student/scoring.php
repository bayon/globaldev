<?php
include_once ('./ajax_constants.php');
?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>

	<?php $scoreForm = "<div id='scoringFormContainer' >";
	$scoreForm .= "<form name='js_activated_form' method ='get' action='" . $_SERVER['PHP_SELF'] . "'>
			<input type='hidden' name='controller' 	value='students.php'/>
			<input type='hidden' name='method' 	value='studentCodeScore'/>
			<input type='hidden' name='attach_id' 	value='attach_id'/>
			<input type='hidden' name='student_id' 	value='" . $student -> student_id . "'/>
			";

	$gridMatrix[0][0] = "<div style='float:left;'>comprehension score</div> <input type = 'hidden' id='student_id' name='student_id' 	value='" . $student -> student_id . "'/>";
	$gridMatrix[1][0] = "<input type = 'text' id='firstName' name='firstName' value='" . $student -> firstName . "'/>";
	$gridMatrix[2][0] = "<input type = 'text' id='code' name='code' value='" . $_GET['ccode'] . "'/>";
	$gridMatrix[3][0] = "<input type = 'text' id='score' name='score' />";
	$gridMatrix[4][0] = '<input type="range" name="slider-fill" id="slider-fill" onchange="showValue()" value="60" min="0" max="100" data-highlight="true" />';
	$gridMatrix[5][0] = "<textarea   id='notes' name='notes' ></textarea>";
	
	
	
	$gridMatrix[6][0] = "<button style='width:100%;' onClick=\"if(confirm('Are you sure?'))
	{ verify();}
	else { deny();}\">
		score
	</button>";
	
	
	
	$rows = 7;
	$cols = 1;
	$columnWidthPercentsArray = array(90);
	$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

	$scoreForm .= $gridObject -> make();
	echo($scoreForm);

	$scoreForm .= "</form></div>";
	?>
	<div>
	<?php print_r($_GET); ?>
	</div>
	
</div>


<script>
	
	function showValue(){
		var value = $('#slider-fill').attr('value');
		$('#score').val(value);
	}
	
	function submitform() {
		document.js_activated_form.submit();
	}

	function verify() {
		submitform();
	}

	function deny() {
		//alert("you denied");
	}
</script>
<?php ?>
