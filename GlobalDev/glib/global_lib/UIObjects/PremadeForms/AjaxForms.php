<?php

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
	function make() {
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
			controller="../' . $this -> ROOT_DIR . '/../../glib/global_api/api_1.php";
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
 
 class ajaxSortableTable_OLD{
 	//limitations: only one use per page, because of "unique" id and function.
	public $ROOT_DIR;
	function __construct($ROOT_DIR = "projectX") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	function make() {
		$ajaxSortableTable = ' <div>';
		 //column headers here
		 $ajaxSortableTable .='
		 
<table cellspacing="0" cellpadding="0"  width=100%  border=1 class="ajaxSortableTable">
	<tr>
		<th  class="ast_width_20pct">
		<img id="up1" src="arrows1.png" onClick = "getagents(\'ContactID\',\'\');clearimgs();setupimg(\'up1\');">
		Contact ID
		<img id="down1" src="arrows1.png" onClick = "getagents(\'ContactID\',\'desc\');clearimgs();setdownimg(\'down1\');">
		</th>
		
		<th  class="ast_width_20pct">
		<img id="up2" src="arrows1.png" onClick = "getagents(\'ContactFullName\',\'\');clearimgs();setupimg(\'up2\');">
		Contact Name
		<img id="down2" src="arrows1.png" onClick = "getagents(\'ContactFullName\',\'desc\');clearimgs();setdownimg(\'down2\');">
		</th>
		
		<th  class="ast_width_20pct">
		<img id="up3" src="arrows1.png" onClick = "getagents(\'ContactSalutation\',\'\');clearimgs();setupimg(\'up3\');">
		Salut
		<img id="down3" src="arrows1.png" onClick = "getagents(\'ContactSalutation\',\'desc\');clearimgs();setdownimg(\'down3\');">
		</th>
		
		<th class="ast_width_20pct" >
		<img id="up4" src="arrows1.png" onClick = "getagents(\'ContactTel\',\'\');clearimgs();setupimg(\'up4\');">
		Telephone
		<img id="down4" src="arrows1.png" onClick = "getagents(\'ContactTel\',\'desc\');clearimgs();setdownimg(\'down4\');">
		</th>
		
	</tr>
</table>
<div id="hiddenDIV" style="visibility:hidden; background-color:white;  "></div>	
		 ';
		 
		 $ajaxSortableTable .='
		 <script>
	function clearimgs() {
		//alert(\'clearimgs\');
		/*
		document.getElementById(\'up1\').src = upoff.src;
		document.getElementById(\'up2\').src = upoff.src;
		document.getElementById(\'up3\').src = upoff.src;
		document.getElementById(\'up4\').src = upoff.src;
		document.getElementById(\'down1\').src = downoff.src;
		document.getElementById(\'down2\').src = downoff.src;
		document.getElementById(\'down3\').src = downoff.src;
		document.getElementById(\'down4\').src = downoff.src;
		*/
	}

	function setupimg(thisid) {
		//alert(\'setupimg\');
		/*
		document.getElementById(thisid).src = "up1.gif";
		*/
	}

	function setdownimg(thisid) {
		//alert(\'setdownimg\');
		/*
		document.getElementById(thisid).src = "down1.gif";
		*/
	}
</script>
		 ';
		 
		$ajaxSortableTable .= '</div>';
		
		$ajaxSortableTable .= '<div id="ajaxSortableTableResults" > <!--ajax table results--></div>
			<script>
			function getagents(column, direc) {
				 
				datastring="controller=ajax_controller&method=ajaxSortableTable&column="+column+"&direc="+direc+"";
				controller="../' . $this -> ROOT_DIR . '/c/ajax_controller.php";
				receiverId="ajaxSortableTableResults";
				console.log(datastring);
				console.log(controller);
				console.log(receiverId);
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>
			
		</div>
		 
		';
		return $ajaxSortableTable;
	}
 }



class ajaxSortableTable {
	//limitations: only one use per page, because of "unique" id and function.
	// add SEARCH FIELD AS A PARAM AND NOTHING ELSE HAD TO CHANGE.
	public $ROOT_DIR;
	public $mainSearchField;
	public $user_id;
	function __construct($ROOT_DIR = "projectX",$mainSearchField,$user_id = 0) {
		$this -> ROOT_DIR = $ROOT_DIR;
		$this ->mainSearchField = $mainSearchField;
		$this ->user_id = $user_id;
	}

	function make($controller, $callBackFunction, $kvArrayOfHeaderFields) {
		$ajaxSortableTable = ' <div>';

		//"ContactID","ContactFullName","ContactSalutation","ContactTel"
		//column headers here
		$ajaxSortableTable .= '
		 <div class="ajaxSortableTable_container">
		 <div class="ajaxSearchDiv">
	<input id="user_id" type ="hidden" name="user_id" value="'.$this ->user_id.'" /> 
	<input id="searchKey" type ="text" name="searchKey" /> 
	<button id="searchButton" onClick = "getagentsBySearch(\''.$this ->mainSearchField.'\',\'desc\');" >search</button>
</div>
<table cellspacing="0" cellpadding="0"  width=100%  border=1 class="ajaxSortableTable">
	<tr>';

		// ???  HEADERS 2 and 4 are buggy !!!

		foreach ($kvArrayOfHeaderFields as $fieldHeader) {
			//echo("<hr><pre>");print_r($fieldHeader); echo("</pre>"); makes NO sense!
			$ajaxSortableTable .= '<th  class="ast_width_20pct">
		<img id="' . $fieldHeader['id_up'] . '" src="' . GLOBAL_URL . '/glib/global_img/arrowUp1.png" onClick = "getagents(\'' . $fieldHeader['fieldName'] . '\',\'asc\');clearimgs();setupimg(\'' . $fieldHeader['id_up'] . '\');">
		' . $fieldHeader['title'] . '
		<img id="' . $fieldHeader['id_down'] . '" src="' . GLOBAL_URL . '/glib/global_img/arrowDown1.png" onClick = "getagents(\'' . $fieldHeader['fieldName'] . '\',\'desc\');clearimgs();setdownimg(\'' . $fieldHeader['id_down'] . '\');">
		</th>';

			$fieldHeader = null;
		}

		$ajaxSortableTable .= '</tr>
</table>

<div id="hiddenDIV" style="visibility:hidden; background-color:white;  "></div>	
		 ';

		$ajaxSortableTable .= '
		 <script>
	function clearimgs() {
		//alert(\'clearimgs\');
		/*
		document.getElementById(\'up1\').src = upoff.src;
		document.getElementById(\'up2\').src = upoff.src;
		document.getElementById(\'up3\').src = upoff.src;
		document.getElementById(\'up4\').src = upoff.src;
		document.getElementById(\'down1\').src = downoff.src;
		document.getElementById(\'down2\').src = downoff.src;
		document.getElementById(\'down3\').src = downoff.src;
		document.getElementById(\'down4\').src = downoff.src;
		*/
	}

	function setupimg(thisid) {
		//alert(\'setupimg\');
		/*
		document.getElementById(thisid).src = "up1.gif";
		*/
	}

	function setdownimg(thisid) {
		//alert(\'setdownimg\');
		/*
		document.getElementById(thisid).src = "down1.gif";
		*/
	}
</script>
		 ';

		$ajaxSortableTable .= '</div>';

		$ajaxSortableTable .= '<div id="ajaxSortableTableResults" > <!--ajax table results--></div>';
		
		$ajaxSortableTable .= '	<script>
			function getagents(column, direc) {
				 var user_id = document.getElementById("user_id").value;
				datastring="controller=' . $controller . '&method=' . $callBackFunction . '&user_id="+user_id+"&column="+column+"&direc="+direc+"";
				//alert(datastring);//sending correct data for 2 and 4, yes!
				controller="../' . $this -> ROOT_DIR . '/c/' . $controller . '.php";
				receiverId="ajaxSortableTableResults";
				console.log(datastring);
				console.log(controller);
				console.log(receiverId);
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>';
		$ajaxSortableTable .= '	<script>
			function getagentsBySearch(column, direc) {
				 var user_id = document.getElementById("user_id").value;
				 var searchKey = document.getElementById("searchKey").value;
				datastring="controller=' . $controller . '&method=' . $callBackFunction . '&user_id="+user_id+"&column="+column+"&direc="+direc+"&searchKey="+searchKey+"";
				alert(datastring);
				controller="../' . $this -> ROOT_DIR . '/c/' . $controller . '.php";
				receiverId="ajaxSortableTableResults";
				console.log(datastring);
				console.log(controller);
				console.log(receiverId);
				postAjaxForm(datastring, controller, receiverId);
			}
			</script>';	
			
		$ajaxSortableTable .= '	
		</div>
		</div>
		 
		';
		return $ajaxSortableTable;
	}

}


?>