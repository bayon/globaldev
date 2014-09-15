<?php include_once("html_head.php"); ?>
	
<div class ='section'>
		<p>
			task <button class = 'action_btn' onclick="openAddTaskForm();">+</button><button  class = 'action_btn' onclick="closeAddTaskForm();">-</button>
			<button  class = 'action_btn' onclick="showTasks();">show</button><button  class = 'action_btn' onclick="hideTasks();">hide</button>
		</p>
		<div id="addTaskForm" class="addForm" style="display:none;">
			<input class = 'text_input' type="text" id="task" name="task" placeholder="What do you need to do?"   />
			<input class = 'text_input' type="text" id="time" name="time" placeholder="How many minutes will it take?"   />
			<input class = 'submit_btn' type="submit" value="add" onclick="addTask(); return false;"/>
		</div>
		<div id="taskList" style="display:none;">
			<table id="taskTable" class="listTable" border="1" width="100%">
				<tbody id="taskTBody">

				</tbody>
			</table>
		</div>
</div>


<script>
	function openAddTaskForm(){
		$("#addTaskForm").css("display","block");
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