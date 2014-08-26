<?php

function navigation() {
	$html = createHeader();
	$html .= "<div  id='navigation '   ><form method='get' action='$_SERVER[PHP_SELF]' >";
	$html .= "
	<div class='nav_container main_gradient' >
	<input id='nav1' type='submit' class='nav_buttons main_gradient' name='navigation' value='home'/>
	
	<input id='nav5'  type='submit' class='nav_buttons main_gradient' name='navigation' value='codes'/>
	<input id='nav6'  type='submit' class='nav_buttons main_gradient' name='navigation' value='schedule'/>
	</div>
	";
	$html .= "</form></div>";

	return ($html);

}
function subnavigation($controller,$kvArray) {
	//PARAMS:
	 //kvArray ('id'=>'subnav1','value'='sub1','subnav_function' => 'ajaxSubNavigate("appointment","subnavToAppt")')
	 
	$html = "<div  id='subnavigation '  >";
	$html .= "
	<div class='subnav_container main_gradient' >
	<input type='hidden' name='controller' value ='".$controller."'/>";
	
	foreach($kvArray as $a){
		$html .= "<input 
		id='".$a['id']."' 
		type='submit' 
		class='subnav_buttons main_gradient' 
		name='subnavigation' 
		onclick='".$a['subnav_function']."'
		value='".$a['value']."'/>";
	}
	 
	
	$html .= "</div>";
	$html .= "</div>";
	$html .= "
		<script>
			function ajaxSubNavigate(subcontroller,method) {
			
			datastring = 'subcontroller=' + subcontroller + '&method=' + method + '';
			controller = '../' + app + '/c/subnavigation_controller.php';
			receiverId = 'content';
			postAjaxForm(datastring, controller, receiverId);
			}
		</script>
		";
	// TRY and pull this from js constants, currently in js/index.js
	//var app = 'projectX';

	return ($html);

}
function subnavigation_OLD($controller,$kvArray) {
	 //kvArray ('id'=>'subnav1','value'='sub1')
	$html = "<div  id='subnavigation '  ><form method='get' action='$_SERVER[PHP_SELF]' >";
	$html .= "
	<div class='subnav_container main_gradient' >
	<input type='hidden' name='controller' value ='".$controller."'/>";
	
	foreach($kvArray as $a){
		$html .= "<input id='".$a['id']."' type='submit' class='subnav_buttons main_gradient' name='subnavigation' value='".$a['value']."'/>";
	}
	 
	
	$html .= "</div>";
	$html .= "</form></div>";

	return ($html);

}

function customCSSMenu() {
	$html = "<div  class=''  style='margin-top:50px;text-align:center;width:100%;'><form method='post' action='$_SERVER[PHP_SELF]' >";
	$theme1_selected = " selected ";
	$theme2_selected = " ";
	$theme3_selected = " ";
	if (isset($_SESSION['custom_theme'])) {
		switch ($_SESSION['custom_theme']) {
			case 'theme1' :
				$theme1_selected = " selected ";
				break;
			case 'theme2' :
				$theme2_selected = " selected ";
				break;
			case 'theme3' :
				$theme3_selected = " selected ";
				break;
			default :
				$theme1_selected = " selected ";
				$theme2_selected = " ";
				$theme3_selected = " ";

				break;
		}
	}

	$html .= "
	<div class='customCSSMenu' >
	<select name='override_css'>
		<option " . $theme1_selected . ">theme1</option>
		<option " . $theme2_selected . ">theme2</option>
		<option " . $theme3_selected . ">theme3</option>
		 
	</select>
	<input type='submit' class='nav_buttons main_gradient' name='submit' value='change'/>
	</div>
	";
	$html .= "</form></div>";
	return ($html);

}

function createHeader() {
	$html = "<div id='site_header' class='main_gradient'>";
	$html .= "<div id='site_logo' >@</div>";
	$html .= "<div id='site_name'>common core</div>";
	$html .= "</div>";

	return $html;
}
?>