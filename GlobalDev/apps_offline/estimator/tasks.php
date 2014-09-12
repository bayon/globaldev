<?php include_once('head/head.php'); ?>
<?php include_once('head/navigation.php'); ?>
<body onload='init();' >
	<div class="content">

		<h3>Task
		<span class='directions' style='margin-left:20px;font-weight:normal;font-size:11px;font-style:italic;'>
			A general list of tasks.</span>
		</h3>
		 
		  <button id='newTaskFormButton' onclick='openNewTaskForm();' >
				new task
			</button>
  		 <button id='TaskListButton' onclick='openTaskList();' >
				 task list
			</button>
  <div id='newTaskForm' style='display:none;'>
		<table border=1 class="estimatorTable">
			<form type="post"  >
				<tr>
					<td>task</td><td>
					<input type="text" id="name" name="task"    />
					</td>
				</tr>
				<tr>
					<td>min</td><td>
					<input type="number"  step="any" id="email" name="minutes"    />
					&nbsp;min</td>
				</tr>
				<tr>
					<td>&nbsp;</td><td>
					<input id="btn_add" class="addButton" type="submit" value="+"/>
					</td>
				</tr>
			</form>
		</table>
		

	</div>
	 
	 <table id="taskListTable" border=1 class="estimatorTable">
	  <thead><tr><th>Task</th><th title='Time to complete once.'>Minutes</th><th>Action</th></tr></thead>
	  <tbody id="taskListBody"></tbody>
	 </table>
  
  </div>
  
  <script src="tasks.js"></script>
  
</body>
</html>
<script>
$(document).ready(function() {
		
	});
	function init(){
		openDB_global();
		 
	}
	function openNewTaskForm(){
		var newTaskForm = document.getElementById('newTaskForm');
		newTaskForm.style.display="block";
	}
	function openTaskList(){
		var taskListTable = document.getElementById("taskListTable");
		var newTaskForm = document.getElementById('newTaskForm');
		newTaskForm.style.display="none";
		 findAll();
	}
</script>