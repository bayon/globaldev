<?php

class ajaxStudentForm {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	public $user_id;
	function __construct($ROOT_DIR = "project1" ,$user_id=0) {
		$this -> ROOT_DIR = $ROOT_DIR;
		$this ->user_id = $user_id;
		}

		function make() {
		$ajaxForm = ' <div id="ajaxStudentForm"> ';
		$ajaxFormHeader = '<div class="newFormHeader" style="float:left;">Add Student:<button id="newFormToggle" onclick="toggleNewFormOn()">+</button>';
		$ajaxFormHeader .= '<button id="newFormToggle" onclick="toggleNewFormOff()">-</button></div>';
		$ajaxFormHeader .='<div id="newFormBody" style="display:none;">';
		
		$ajaxForm .= $ajaxFormHeader;
		$gridMatrix[0][0] = " first name:<input type='hidden' id='user_id' name='user_id' value='".$this ->user_id."' />";
		$gridMatrix[0][1] = '<input type="text" id="first_name" />';
		$gridMatrix[1][0] = "middle name:";
		$gridMatrix[1][1] = '<input type="text" id="middle_name" />';
		$gridMatrix[2][0] = "last name:";
		$gridMatrix[2][1] = '<input type="text" id="last_name" />';
		$gridMatrix[3][0] = "email:";
		$gridMatrix[3][1] = '<input type="text" id="email" />';
		$gridMatrix[4][0] = "phone:";
		$gridMatrix[4][1] = '<input type="text" id="phone" />';
		
		
		$gridMatrix[5][0] = '<button onClick="tableFormFunction()" >add</button>';
		$gridMatrix[5][1] = '<button onClick="toggleNewFormOff()" >cancel</button>';
		$gridMatrix[6][0] = '<div id="tableFormId" > <!--add--></div>';
		$rows = 7;
		$cols = 2;
		$columnWidthPercentsArray = array(40, 40);
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);
		
		$ajaxForm .= $gridObject->make();
		$ajaxForm .='</div></div>';
		$ajaxForm .='
			<script>
			function tableFormFunction(){
				 var user_id = document.getElementById("user_id");
				var firstname = document.getElementById("first_name");
				var middlename = document.getElementById("middle_name");
				var lastname = document.getElementById("last_name");
				var email = document.getElementById("email");
				var phone = document.getElementById("phone");
				 
				 user_id = user_id.value;
				firstname = firstname.value;
				middlename = middlename.value;
				lastname = lastname.value;
				email = email.value;
				phone = phone.value;
				
				toggleNewFormOff();
				
				datastring="controller=ajax_controller&method=ajaxStudentFormResults&user_id="+user_id+"&first_name="+firstname+"&middle_name="+middlename+"&last_name="+lastname+"&email="+email+"&phone="+phone+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="tableFormId";
				
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