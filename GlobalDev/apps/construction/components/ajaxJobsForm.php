<?php

class ajaxJobsForm {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	public $user_id;
	function __construct($ROOT_DIR = "project1" ,$user_id=0) {
		$this -> ROOT_DIR = $ROOT_DIR;
		$this ->user_id = $user_id;
		}

		function make() {
		$ajaxForm = ' <div id="ajaxJobsForm"> ';
		$ajaxFormHeader = '<div class="newFormHeader" style="float:left;">Add Job:<button id="newFormToggle" onclick="toggleNewFormOn()">+</button>';
		$ajaxFormHeader .= '<button id="newFormToggle" onclick="toggleNewFormOff()">-</button></div>';
		$ajaxFormHeader .='<div id="newFormBody" style="display:none;">';
		
		$ajaxForm .= $ajaxFormHeader;
		$gridMatrix[0][0] = " description:<input type='hidden' id='user_id' name='user_id' value='".$this ->user_id."' />";
		$gridMatrix[0][1] = '<input type="text" id="description" />';
		$gridMatrix[1][0] = '<button onClick="tableFormFunction()" >add</button>';
		$gridMatrix[1][1] = '<button onClick="toggleNewFormOff()" >cancel</button>';
		$gridMatrix[2][0] = '<div id="tableFormId" > <!--add--></div>';
		$rows = 3;
		$cols = 2;
		$columnWidthPercentsArray = array(40, 40);
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);
		
		$ajaxForm .= $gridObject->make();
		$ajaxForm .='</div></div>';
		$ajaxForm .='
			<script>
			function tableFormFunction(){
				 var user_id = document.getElementById("user_id");
				var description = document.getElementById("description");
				 
				 
				 user_id = user_id.value;
				description = description.value;
				
				
				toggleNewFormOff();
				
				datastring="controller=ajax_controller&method=ajaxJobsFormResults&user_id="+user_id+"&description="+description+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="tableFormId";
				alert(datastring);
				postAjaxForm(datastring, controller, receiverId);
			}
			function toggleNewFormOn(){
				//alert("newFormBody toggle");
				 document.getElementById("newFormBody").style.display = "block";
			}
			function toggleNewFormOff(){
				//alert("newFormBody toggle OFF");
				 document.getElementById("newFormBody").style.display = "none";
			}
			</script>';
		
		
		
		
		return $ajaxForm;
	}

	public function show(){
		echo("<script>alert('show');</script>");
	}
	public function hide(){
		echo("<script>alert('hide');</script>");
	}

}

?>