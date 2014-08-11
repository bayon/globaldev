<?php
class SingleButtonForm {
	public $label;
	public $method;

	function __construct($lable = "Default Label", $method = "Default Method") {
		if ($lable) {$this -> label = $lable;
		}
		if ($method) {$this -> method = $method;
		}
	}

	function make() {
		$rows = 1;
		$cols = 2;
		$columnWidthPercentsArray = array(45, 45);
		$gridMatrix[0][0] = $this -> label;
		$submitButton = new SubmitButton("method", $this -> method);
		$gridMatrix[0][1] = $submitButton -> make();
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

		$formObject = new FormObject("post", $_SERVER['PHP_SELF'], $gridObject -> make());
		$form = $formObject -> make();
		return $form;
	}

}

class LoginForm {
	public $username;
	public $password;
	public $controller;
	public $method;

	function __construct($username = "Default username", $password = "Default Password", $controller = "login", $method = "login") {
		if ($username) {$this -> username = $username;
		}
		if ($password) {$this -> password = $password;
		}
		if ($controller) {$this -> controller = $controller;
		}
		if ($method) {$this -> method = $method;
		}
	}

	function make() {

		$columnWidthPercentsArray = array(45, 45);
		$gridMatrix[0][0] = "Username:";
		$inputTextUsername = new InputText("username");
		$usernameInput = $inputTextUsername -> make();
		$gridMatrix[0][1] = $usernameInput;

		$gridMatrix[1][0] = "Password";
		$inputTextPassword = new InputText("password", array("foo"), "password");
		$passwordInput = $inputTextPassword -> make();
		$gridMatrix[1][1] = $passwordInput;

		$submitButton = new SubmitButton($this -> controller, "method", $this -> method);
		$gridMatrix[2][1] = $submitButton -> make();
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

		$formObject = new FormObject("post", $_SERVER['PHP_SELF'], $gridObject -> make());
		$form = $formObject -> make();
		return $form;
	}

}

class SignupForm {
	public $username;
	public $password;
	public $controller;
	public $method;

	function __construct($username = "Default username", $password = "Default Password", $controller = "signup", $method = "signup") {
		if ($username) {$this -> username = $username;
		}
		if ($password) {$this -> password = $password;
		}
		if ($controller) {$this -> controller = $controller;
		}
		if ($method) {$this -> method = $method;
		}
	}

	function make() {

		$columnWidthPercentsArray = array(45, 45);
		$gridMatrix[0][0] = "Username:";
		$inputTextUsername = new InputText("username");
		$usernameInput = $inputTextUsername -> make();
		$gridMatrix[0][1] = $usernameInput;

		$gridMatrix[1][0] = "Password";
		$inputTextPassword = new InputText("password", array("foo"), "password");
		$passwordInput = $inputTextPassword -> make();
		$gridMatrix[1][1] = $passwordInput;

		$submitButton = new SubmitButton($this -> controller, "method", $this -> method);
		$gridMatrix[2][1] = $submitButton -> make();
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

		$formObject = new FormObject("post", $_SERVER['PHP_SELF'], $gridObject -> make());
		$form = $formObject -> make();
		return $form;
	}

}

class ajaxForm {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	function __construct($ROOT_DIR = "project1") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	function make() {
		$ajaxForm = '
		<div>
			<button onClick="uniqueFunction()" >ajax</button>
			<div id="receiverId"><!--ajax  results--></div>
			<script>
			function uniqueFunction(){
				datastring="controller=ajax_controller&method=PremadeAjaxFormMethodCall";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="receiverId";
				//postAjaxForm(dataString,controller,receiverId);
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>
			</div>
			<hr>
			';
		return $ajaxForm;
	}

}

class DefaultGridMatrix {

	function __construct() {

	}

	function make() {
		$gridMatrix[0][0] = "1";
		$gridMatrix[0][1] = "2";
		$gridMatrix[1][0] = "3";
		$gridMatrix[1][1] = "4";
		$gridMatrix[2][0] = "5";
		$gridMatrix[2][1] = "6";

		$rows = 3;
		$cols = 2;
		$columnWidthPercentsArray = array(40, 40);
		$gridObject = new GridObject($gridMatrix, $columnWidthPercentsArray);

		return $gridObject;
	}

}

class ajaxTableForm {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	function __construct($ROOT_DIR = "project1") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	function make() {
		$ajaxForm = '
		<div>
		<lable >Enter a number 1-3</label><br><input type="text" id="text2Ajax" /><br>
			<button onClick="tableFormFunction()" >ajax table</button>
			<div id="tableFormId" > <!--ajax  results--></div>
			<script>
			function tableFormFunction(){
				var textbox = document.getElementById("text2Ajax");
				 
				text = textbox.value;
				datastring="controller=ajax_controller&method=ajaxTableResults&text="+text+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="tableFormId";
				
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>
			</div>
			<hr>
			';
		return $ajaxForm;
	}

}

class ajaxSelectToTable {
	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	function __construct($ROOT_DIR = "projectX") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	function make($data) {
		$ajaxForm = '
		<div>
		<lable >select to table</label><br>
			<select id="ajaxSelection" name="ajaxSelection"  onChange="ajaxSelectToTable()">';
		foreach ($data as $user) {
			$ajaxForm .= '<option value="' . $user['user_id'] . '">' . $user['username'] . '</option>';
		}
		$ajaxForm .= '</select>
			<div id="selectToTableResults" > <!--ajax table results--></div>
			<script>
			function ajaxSelectToTable(){
				var select = document.getElementById("ajaxSelection");
				option = select.value;
				datastring="controller=ajax_controller&method=ajaxSelectToTable&option="+option+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="selectToTableResults";
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>
		</div>
		<hr>
		';
		return $ajaxForm;
	}

}

class ajaxAPICall {
	public $ROOT_DIR;
	public $secret = "!9966youllNeverKnowEat1100!";
	public $wrong_secret = "duh?";
	function __construct($ROOT_DIR = "projectX") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	/*
	 * <?php
	 $secret="!9966youllNeverKnowEat1100!";
	 $wrong_secret="duh?";

	 // LEFT OFF HERE maybe off to a false start ...better check
	 //http://localhost/GlobalDev/apps/global_api/api_1.php

	 ?>
	 <form method="post" action="../../global_api/api_1.php" >
	 <input type="hidden" name="secret" value="<?=$secret;?>"/>
	 <input type="submit" name ="method" value="get_users"/>
	 </form>
	 */
	function make($data) {
		$ajaxForm = '
<div>
	<lable > ajax API call</label> <br>
		<input id="method" type="button" name ="method"  onclick="callAPI()" value="get_users"/>
		 <input id="secret" type="hidden" name="secret" value="'.$this->secret.'"/>
		<div id="apiResults" >
			<!--ajax table results-->
		</div>
		
		<script>
			function callAPI(){
				alert("call api js function");
				var secretElement = document.getElementById("secret");
			var methodElement = document.getElementById("method");
			var secret =secretElement.value;
			var method = methodElement.value;
			datastring="controller=../../global_api/api_1.php&method="+method+"&secret="+secret+"";
			controller="../' . $this -> ROOT_DIR . '/../../global_api/api_1.php";
			receiverId="apiResults";
			 postAjaxForm(datastring, controller, receiverId);
			 alert("foo");
			}
		</script>
</div>
<hr>
';
		return $ajaxForm;
	}

}
/*
 * <input id="secret" type="hidden" name="secret" value="'.$this->secret.'"/>
 * 
 * var secretElement = document.getElementById("secret");
			var methodElement = document.getElementById("method");
			var secret =
			var method = methodElement.value;
			datastring="controller=ajax_controller&method="+method+"&secret="+secret+"";
			controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
			receiverId="apiResults";
			 postAjaxForm(datastring, controller, receiverId);
			 alert("foo");
 */
?>