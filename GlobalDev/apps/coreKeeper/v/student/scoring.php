<?php
include_once ('./ajax_constants.php');
?>
<div id='content'>
	<div class='page_title'>
		Title
	</div>
	<p>
		scoring
	</p>

	<div>
		<form name="js_activated_form" method ='get' action="<?=$_SERVER['PHP_SELF']; ?>">
			<input type='hidden' 					name='controller' 	value='students.php'/>
			<input type='hidden' 					name='method' 		value='studentCodeScore'/>
			<input type = 'text' id='ccode' 		name='ccode' 		value='<?=$_GET['ccode']; ?>'/>
			<input type = 'text' id='firstName' 	name='firstName' 	value='<?=$student -> firstName; ?>'/>
			<input type = 'text' id='student_id' 	name='student_id' 	value='<?=$student -> student_id; ?>'/>
			<input type = 'text' id="score" 		name='score' 				/>
			</input>
		</form>
	</div>
	<div class=" jq_slider" style="width:200px;margin-left:20%;margin-top:50px;"></div>

	<button onclick="documentScore()">
		document
	</button>
	<button onClick="if(confirm('Are you sure?'))
	{ verify();}
	else { deny();}">
		smooth
	</button>

</div>

<script>
	function documentScore() {
		var code = document.getElementById("ccode").value;
		var student_id = document.getElementById("student_id").value;
		var score = document.getElementById("score").value;
		alert(code + ":" + student_id + ":" + score);
	}

	$(function() {
		$(".jq_slider").slider({
			max : 100,
			slide : function(event, ui) {
				var val = $(".jq_slider").slider("value");
				console.log(val);
				$('#score').val(val);
			}
		});
	});

</script>

<script type="text/javascript">
	function submitform() {
		document.js_activated_form.submit();
	}

	function verify() {
		alert("you confirmed!");
		submitform();
	}

	function deny() {
		alert("you denied");
	}
</script>

