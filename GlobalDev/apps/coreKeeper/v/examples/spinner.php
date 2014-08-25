<script>
	$(function() {
		var spinner = $("#spinner").spinner();

		$("#disable").click(function() {
			if (spinner.spinner("option", "disabled")) {
				spinner.spinner("enable");
			} else {
				spinner.spinner("disable");
			}
		});
		$("#destroy").click(function() {
			if (spinner.spinner("instance")) {
				spinner.spinner("destroy");
			} else {
				spinner.spinner();
			}
		});
		$("#getvalue").click(function() {
			alert(spinner.spinner("value"));
		});
		$("#setvalue").click(function() {
			spinner.spinner("value", 5);
		});

		$("button").button();
	}); 
</script>

<p>
	<label for="spinner">Select a value:</label>
	<input id="spinner" name="value">
</p>

<p>
	<button id="disable">
		Toggle disable/enable
	</button>
	<button id="destroy">
		Toggle widget
	</button>
</p>

<p>
	<button id="getvalue">
		Get value
	</button>
	<button id="setvalue">
		Set value to 5
	</button>
</p>