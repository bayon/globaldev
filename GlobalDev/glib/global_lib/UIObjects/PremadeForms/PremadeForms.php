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

?>