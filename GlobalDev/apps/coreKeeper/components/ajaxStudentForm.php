<?php

class ajaxStudentForm {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	function __construct($ROOT_DIR = "project1") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	function make() {
		$ajaxForm = ' <div> ';
		
		$gridMatrix[0][0] = "first name:";
		$gridMatrix[0][1] = '<input type="text" id="first_name" />';
		$gridMatrix[1][0] = "middle name:";
		$gridMatrix[1][1] = '<input type="text" id="middle_name" />';
		$gridMatrix[2][0] = "last name:";
		$gridMatrix[2][1] = '<input type="text" id="last_name" />';
		$gridMatrix[3][0] = "email:";
		$gridMatrix[3][1] = '<input type="text" id="email" />';
		$gridMatrix[4][0] = "phone:";
		$gridMatrix[4][1] = '<input type="text" id="phone" />';
		
		
		$gridMatrix[5][0] = '<button onClick="tableFormFunction()" >ajax table</button>';
		$gridMatrix[6][0] = '<div id="tableFormId" > <!--ajax  results--></div>';
		$rows = 7;
		$cols = 2;
		$columnWidthPercentsArray = array(40, 40);
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);
		
		$ajaxForm .= $gridObject->make();
		$ajaxForm .='</div>';
		$ajaxForm .='
			<script>
			function tableFormFunction(){
				 
				var firstname = document.getElementById("first_name");
				var middlename = document.getElementById("middle_name");
				var lastname = document.getElementById("last_name");
				var email = document.getElementById("email");
				var phone = document.getElementById("phone");
				 
				 
				firstname = firstname.value;
				middlename = middlename.value;
				lastname = lastname.value;
				email = email.value;
				phone = phone.value;
				
				datastring="controller=ajax_controller&method=ajaxStudentFormResults&first_name="+firstname+"&middle_name="+middlename+"&last_name="+lastname+"&email="+email+"&phone="+phone+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="tableFormId";
				
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>';
		
		
		
		
		return $ajaxForm;
	}

}

?>