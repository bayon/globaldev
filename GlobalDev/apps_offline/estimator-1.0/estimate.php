<?php
include_once ("html_head.php");
?>
<!-- INCLUDE PAGE MODEL-->
<script type='text/javascript' src='estimate.js'></script>
<script type='text/javascript' src='task.js'></script>
<script type='text/javascript' src='taskSelection.js'></script>
<script type='text/javascript' src='taskForEstimate.js'></script>
<script type='text/javascript' src='materialSelection.js'></script>
<script type='text/javascript' src='materialForEstimate.js'></script>
<script type='text/javascript' src='sumForEstimate.js'></script>

<div class ='content'>
	<div class ='section'>
		<div class='page_controls'>
			<div class='page_title' >
				estimate
			</div>
			<button class = 'action_btn' onclick="openAddEstimateForm();">
				+
			</button>
			<button class = 'action_btn' onclick="closeAddEstimateForm();">
				-
			</button>
			<button class = 'action_btn' onclick="showEstimates();">
				show
			</button>
			<button class = 'action_btn' onclick="hideEstimates();">
				hide
			</button>
		</div>
		<div id="addEstimateForm" class="addForm"  >
			<input class = 'text_input' type="text" id="estimate" name="estimate" placeholder="What job is it?"   />
			<input class = 'text_input' type="text" id="hourlyRate" name="hourlyRate" placeholder="Hourly Rate?"   />
			<input class = 'submit_btn' type="submit" value="add" onclick="addEstimate(); return false;"/>
		</div>
		<div id="estimateList" style="display:none;">
			<span class='code_location'>renderAllEstimates()</span>
			<table id="estimateTable" class="listTable" border="1" width="100%">

				<tbody id="estimateTBody"></tbody>
			</table>
		</div>
		<div id="estimateSelected">

		</div>
		<div id="taskSelection" class='hidden'>
			<!-- taskSelection.js getAllTasksForSelection() -->
			<?php
				include ("taskSelection.php");
			?>
		</div>
		<div id="materialSelection" class='hidden'>
			<!-- materialSelection.js getAllMaterialsForSelection() -->
			<?php
				include ("materialSelection.php");
			?>
		</div>
		<div id="selectedTasks" class='hidden'>
			<?php
			include_once ("taskForEstimate.php");
			?>
		</div>
		<div id="selectedMaterials" class='hidden'>
			<?php
			include_once ("materialForEstimate.php");
			?>
		</div>
		<div id="sumEstimate" class='hidden'>
			<?php
			include_once ("sumForEstimate.php");
			?>
		</div>
	</div>
</div>

<script>
	function openAddEstimateForm() {
		$("#addEstimateForm").css("display", "block");
		document.getElementById("estimate").focus();
	}

	function closeAddEstimateForm() {
		$("#addEstimateForm").css("display", "none");
	}

	function showEstimates() {
		getAllEstimates();
		$("#estimateList").css("display", "block");
	}

	function hideEstimates() {
		$("#estimateList").css("display", "none");
	}
</script>

<?php
	include_once ("html_foot.php");
?>