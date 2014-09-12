<?php include_once('head/head.php'); ?>
<?php include_once('head/navigation.php'); ?>
<body onload='openDB_global();' >
	<div class="content">

		<h3>Tasks</h3>
		<div class='directions' style='font-size:11px;font-style:italic;'>
			A general list of tasks.
		</div>
		  
  <hr>
		<table border=1 class="estimatorTable">
			<form type="post" onsubmit="addTask(); return false;">
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
		<table id="taskItems" border=1 class="estimatorTable"></table>

	</div>
  <script src="tasks.js"></script>
  
</body>
</html>