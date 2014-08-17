<?php

 class ajaxSortableCCMathTable{
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
		<img id="up1" src="'.GLOBAL_URL.'/glib/global_img/arrowUp1.png" onClick = "getagents(\'ContactID\',\'\');clearimgs();setupimg(\'up1\');">
		Contact ID
		<img id="down1" src="'.GLOBAL_URL.'/glib/global_img/arrowDown1.png" onClick = "getagents(\'ContactID\',\'desc\');clearimgs();setdownimg(\'down1\');">
		</th>
		
		<th  class="ast_width_20pct">
		<img id="up2" src="'.GLOBAL_URL.'/glib/global_img/arrowUp1.png" onClick = "getagents(\'ContactFullName\',\'\');clearimgs();setupimg(\'up2\');">
		Contact Name
		<img id="down2" src="'.GLOBAL_URL.'/glib/global_img/arrowDown1.png" onClick = "getagents(\'ContactFullName\',\'desc\');clearimgs();setdownimg(\'down2\');">
		</th>
		
		<th  class="ast_width_20pct">
		<img id="up3" src="'.GLOBAL_URL.'/glib/global_img/arrowUp1.png" onClick = "getagents(\'ContactSalutation\',\'\');clearimgs();setupimg(\'up3\');">
		Salut
		<img id="down3" src="'.GLOBAL_URL.'/glib/global_img/arrowDown1.png" onClick = "getagents(\'ContactSalutation\',\'desc\');clearimgs();setdownimg(\'down3\');">
		</th>
		
		<th class="ast_width_20pct" >
		<img id="up4" src="'.GLOBAL_URL.'/glib/global_img/arrowUp1.png" onClick = "getagents(\'ContactTel\',\'\');clearimgs();setupimg(\'up4\');">
		Telephone
		<img id="down4" src="'.GLOBAL_URL.'/glib/global_img/arrowDown1.png" onClick = "getagents(\'ContactTel\',\'desc\');clearimgs();setdownimg(\'down4\');">
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
?>