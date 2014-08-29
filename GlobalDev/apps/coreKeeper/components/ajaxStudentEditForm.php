<?php

class ajaxStudentEditForm {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	public $user_id;
	public $student;
	function __construct($ROOT_DIR = "project1" ,$user_id=0,$student="") {
		$this -> ROOT_DIR = $ROOT_DIR;
		$this ->user_id = $user_id;
		$this ->student = $student;
		}

		function make() {
		$ajaxForm = ' <div id="ajaxStudentForm"> ';
		$ajaxFormHeader = '<div class="newFormHeader" style="float:left;">Edit Student:<button id="newFormToggle" onclick="toggleNewFormOn()">+</button>';
		$ajaxFormHeader .= '<button id="newFormToggle" onclick="toggleNewFormOff()">-</button></div>';
		$ajaxFormHeader .='<div id="newFormBody" style="display:none;">';
		$ajaxFormHeader .="<input type='hidden' id='user_id' name='user_id' value='".$this ->user_id."' />";
		$ajaxFormHeader .="<input type='hidden' id='student_id' name='student_id' value='".$this ->student->student_id."' />";
		
		$ajaxForm .= $ajaxFormHeader;
		$gridMatrix[0][0] = " first name:";
		$gridMatrix[0][1] = '<input type="text" id="first_name" value="'.$this->student->firstName.'"/>';
		$gridMatrix[1][0] = "middle name:";
		$gridMatrix[1][1] = '<input type="text" id="middle_name" value="'.$this->student->middleName.'"/>';
		$gridMatrix[2][0] = "last name:";
		$gridMatrix[2][1] = '<input type="text" id="last_name" value="'.$this->student->lastName.'"/>';
		$gridMatrix[3][0] = "email:";
		$gridMatrix[3][1] = '<input type="text" id="email" value="'.$this->student->email.'"/>';
		$gridMatrix[4][0] = "phone:";
		$gridMatrix[4][1] = '<input type="text" id="phone" value="'.$this->student->phone.'"/>';
		
		
		$gridMatrix[5][0] = '<button onClick="tableFormFunction()" >update</button>';
		$gridMatrix[5][1] = '<button onClick="deleteStudent()" >delete</button>';
		$gridMatrix[6][0] = '<div id="tableFormId" > <!--ajax  results--></div>';
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
				 var student_id = document.getElementById("student_id");
				var firstname = document.getElementById("first_name");
				var middlename = document.getElementById("middle_name");
				var lastname = document.getElementById("last_name");
				var email = document.getElementById("email");
				var phone = document.getElementById("phone");
				 
				 user_id = user_id.value;
				 student_id = student_id.value;
				firstname = firstname.value;
				middlename = middlename.value;
				lastname = lastname.value;
				email = email.value;
				phone = phone.value;
				
				
				toggleNewFormOff();
				
				datastring="controller=ajax_controller&method=ajaxStudentFormEdit&user_id="+user_id+"&student_id="+student_id+"&first_name="+firstname+"&middle_name="+middlename+"&last_name="+lastname+"&email="+email+"&phone="+phone+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="tableFormId";
				
				postAjaxForm(datastring, controller, receiverId);
			}
			function deleteStudent(){
				alert("Delete Functionality Does Not Exist Yet.");
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