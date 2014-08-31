<?php
include_once ('./ajax_constants.php');
?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>

	<?php $scoreForm = "<div id='scoringFormContainer' ><form name='js_activated_form' method ='get' action='" . $_SERVER['PHP_SELF'] . "'>
			<input type='hidden' name='controller' 	value='students.php'/>
			<input type='hidden' name='method' 	value='studentCodeScore'/>";

	$gridMatrix[0][0] = "<div style='float:left;'>comprehension score</div> <input type = 'hidden' id='student_id' name='student_id' 	value='" . $student -> student_id . "'/>";
	$gridMatrix[1][0] = "<input type = 'text' id='firstName' name='firstName' value='" . $student -> firstName . "'/>";
	$gridMatrix[2][0] = "<input type = 'text' id='ccode' name='ccode' value='" . $_GET['ccode'] . "'/>";
	$gridMatrix[3][0] = "<input type = 'text' id='score' name='score' />";
	$gridMatrix[4][0] = '<input type="range" name="slider-fill" id="slider-fill" onchange="showValue()" value="60" min="0" max="100" data-highlight="true" />';
	$gridMatrix[5][0] = "<button style='width:100%;' onClick=\"if(confirm('Are you sure?'))
	{ verify();}
	else { deny();}\">
		score
	</button>";
	$rows = 6;
	$cols = 1;
	$columnWidthPercentsArray = array(90);
	$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

	$scoreForm .= $gridObject -> make();
	echo($scoreForm);

	$scoreForm .= "</form></div>";
	?>
</div>

<script>
	function documentScore() {
		var code = document.getElementById("ccode").value;
		var student_id = document.getElementById("student_id").value;
		var score = document.getElementById("score").value;
		alert(code + ":" + student_id + ":" + score);
	}
	function showValue(){
		var value = $('#slider-fill').attr('value');
		
		$('#score').val(value);
	}
	
	function submitform() {
		document.js_activated_form.submit();
	}

	function verify() {
		//alert("you confirmed!");
		submitform();
	}

	function deny() {
		//alert("you denied");
	}
</script>
<?php ?>
