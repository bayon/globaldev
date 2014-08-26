<?php

class ajaxSortableStudentsTable {
	//limitations: only one use per page, because of "unique" id and function.
	// add SEARCH FIELD AS A PARAM AND NOTHING ELSE HAD TO CHANGE.
	public $ROOT_DIR;
	function __construct($ROOT_DIR = "coreKeeper") {
		$this -> ROOT_DIR = $ROOT_DIR;
	}

	function make($controller, $callBackFunction, $kvArrayOfHeaderFields) {
		$ajaxSortableTable = ' <div>';

		//"ContactID","ContactFullName","ContactSalutation","ContactTel"
		//column headers here
		$ajaxSortableTable .= '
		 <div class="ajaxSortableTable_container">
		 <div class="ajaxSearchDiv">
	
	<input id="searchKey" type ="text" name="searchKey" /> 
	<button id="searchButton" onClick = "getagentsBySearch(\'firstName\',\'desc\');" >search</button>
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
				 
				datastring="controller=' . $controller . '&method=' . $callBackFunction . '&column="+column+"&direc="+direc+"";
				//alert(datastring);sending correct data for 2 and 4, yes!
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
				 var searchKey = document.getElementById("searchKey").value;
				datastring="controller=' . $controller . '&method=' . $callBackFunction . '&column="+column+"&direc="+direc+"&searchKey="+searchKey+"";
				//alert(datastring);
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