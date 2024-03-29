<style>
	#draggable {
		width: 100px;
		height: 100px;
		padding: 0.5em;
		float: left;
		margin: 10px 10px 10px 0;
		border: solid red 1px;
	}
	#droppable {
		width: 150px;
		height: 150px;
		padding: 0.5em;
		float: left;
		margin: 10px;
		border: solid black 1px;
	}
	.ui-state-highlight {
		background-color: lightblue;
	}
</style>
<script>
	$(function() {
		$("#draggable").draggable();
		$("#droppable").droppable({
			drop : function(event, ui) {
				$(this).addClass("ui-state-highlight").find("p").html("Dropped!");
			}
		});
	}); 
</script>

<div class="container ">
	<div id="draggable" class="ui-widget-content">
		<p>
			Drag me to my target
		</p>
	</div>

	<div id="droppable" class="ui-widget-header">
		<p>
			Drop here
		</p>
	</div>
</div>
