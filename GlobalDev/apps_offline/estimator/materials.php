<?php include_once('head/head.php'); ?>
<?php include_once('head/navigation.php'); ?>
<body onload='openDB_global();' >
	<div class="content">

		<h3>Materials</h3>
		<div class='directions' style='font-size:11px;font-style:italic;'>
			A general list of materials.
		</div>
		  
  <hr>
		<table border=1 class="estimatorTable">
			<form type="post" onsubmit="addMaterial(); return false;">
				<tr>
					<td>material</td><td>
					<input type="text" id="name" name="material"    />
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
		<table id="materialItems" border=1 class="estimatorTable"></table>

	</div>
  <script src="materials.js"></script>
  
</body>
</html>