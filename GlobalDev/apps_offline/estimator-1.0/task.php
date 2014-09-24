<?php include_once("html_head.php"); ?>
<!-- INCLUDE PAGE MODEL-->
<script type='text/javascript' src='task.js'></script>
		
<div class ='content'>
	<div class ='section'>
		<div class='page_controls'>
			<div class='page_title' >task</div>
			<button class = 'action_btn' onclick="openAddTaskForm();">+</button>
			<button class = 'action_btn' onclick="closeAddTaskForm();">-</button>
			<button class = 'action_btn' onclick="showTasks();">show</button>
			<button class = 'action_btn' onclick="hideTasks();">hide</button>
		</div>
		<div id="addTaskForm" class="addForm"  >
			<input class = 'text_input' type="text" id="task" name="task" placeholder="What do you need to do?"   />
			<input class = 'text_input' type="text" id="time" name="time" placeholder="How many minutes will it take?"   />
			<input class = 'submit_btn' type="submit" value="add" onclick="addTask(); return false;"/>
		</div>
		<div id="taskList" style="display:none;">
			<table id="taskTable" class="listTable" border="1" width="100%">
				<thead>
					<tr><th>task</th><th>time</th><th>action</th></tr>
				</thead>
				<tbody id="taskTBody">

				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	function openAddTaskForm(){
		$("#addTaskForm").css("display","block");
		document.getElementById("task").focus();
	}
	function closeAddTaskForm(){
		$("#addTaskForm").css("display","none");
	}
	function showTasks(){
		getAllTasks();
		$("#taskList").css("display","block");
	}
	function hideTasks(){
		$("#taskList").css("display","none");
	}
</script>

<?php include_once("html_foot.php"); ?>