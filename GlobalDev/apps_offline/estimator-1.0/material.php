<?php include_once("html_head.php"); ?>
<!-- INCLUDE PAGE MODEL-->
<script type='text/javascript' src='material.js'></script>
<div class ='content'>
	<div class ='section'>
		<div class='page_controls'>
			<div class='page_title' >material</div>
			<button class = 'action_btn' onclick="openAddMaterialForm();">+</button>
			<button class = 'action_btn' onclick="closeAddMaterialForm();">-</button>
			<button class = 'action_btn' onclick="showMaterials();">show</button>
			<button class = 'action_btn' onclick="hideMaterials();">hide</button>
		</div>
		<div id="addMaterialForm" class="addForm"  >
			<input class = 'text_input' type="text" id="material" name="material" placeholder="What do you need?"   />
			<input class = 'text_input' type="text" id="cost" name="cost" placeholder="How much does it cost?"   />
			<input class = 'submit_btn' type="submit" value="add" onclick="addMaterial(); return false;"/>
		</div>
		<div id="materialList" style="display:none;">
			<table id="materialTable" class="listTable" border="0" width="100%">
				<thead>
					<tr><th>material</th><th>cost</th><th>action</th></tr>
				</thead>
				<tbody id="materialTBody">

				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	function openAddMaterialForm(){
		$("#addMaterialForm").css("display","block");
		document.getElementById("material").focus();
	}
	function closeAddMaterialForm(){
		$("#addMaterialForm").css("display","none");
	}
	function showMaterials(){
		getAllMaterials();
		$("#materialList").css("display","block");
	}
	function hideMaterials(){
		$("#materialList").css("display","none");
	}
</script>

<?php include_once("html_foot.php"); ?>