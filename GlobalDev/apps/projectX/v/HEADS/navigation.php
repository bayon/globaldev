<?php

function navigation() {
	$html = createHeader();
	$html .= "<div  id='navigation '   ><form method='get' action='$_SERVER[PHP_SELF]' >";
	$html .= "
	<div class='nav_container main_gradient' >
	<input id='nav1' type='submit' class='nav_buttons main_gradient' name='navigation' value='home'/>
	<input id='nav2'  type='submit' class='nav_buttons main_gradient' name='navigation' value='pageX'/>
	<input id='nav3'  type='submit' class='nav_buttons main_gradient' name='navigation' value='examples' />
	<input id='nav4'  type='submit' class='nav_buttons main_gradient' name='navigation' value='components'/>
	<input id='nav5'  type='submit' class='nav_buttons main_gradient' name='navigation' value='schedule'/>
	<input id='nav6'  type='submit' class='nav_buttons main_gradient' name='navigation' value='ajaxTable'/>
	<input id='nav7'  type='submit' class='nav_buttons main_gradient' name='navigation' value='files'/>
	
	</div>
	";
	$html .= "</form></div>";

	return ($html);

}
function subnavigation($controller) {
	 
	$html = "<div  id='subnavigation '  ><form method='get' action='$_SERVER[PHP_SELF]' >";
	$html .= "
	<div class='subnav_container main_gradient' >
	<input type='hidden' name='controller' value ='".$controller."'/>
	<input id='subnav1' type='submit' class='subnav_buttons main_gradient' name='subnavigation' value='sub1'/>
	<input id='subnav2'  type='submit' class='subnav_buttons main_gradient' name='subnavigation' value='sub2'/>
	<input id='subnav3'  type='submit' class='subnav_buttons main_gradient' name='subnavigation' value='sub3' />
	<input id='subnav4'  type='submit' class='subnav_buttons main_gradient' name='subnavigation' value='sub4'/>
	 
	
	</div>
	";
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
	<input type='submit' class='nav_buttons main_gradient' name='submit' value='custom css'/>
	</div>
	";
	$html .= "</form></div>";
	return ($html);

}

function createHeader() {
	$html = "<div id='site_header ' class='main_gradient'>";
	$html .= "<div id='site_logo' >@</div>";
	$html .= "<div id='site_name'>X-Comp@ny</div>";
	$html .= "</div>";

	return $html;
}
?>