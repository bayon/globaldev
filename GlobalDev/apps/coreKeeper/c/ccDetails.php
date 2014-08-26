<?php
function displayCCDetails($cc_code){
	$ccmath = new CCMATH();
	$ccmath->getDetailsForCCode($cc_code);
	include_once ('v/ccDetails.php');
}

function displayAttachments($ccode){
			$arrayOfUploads = scandir(BASE_PATH . '/uploads/');
			//print_r($arrayOfUploads);
			$scrollOfFiles = "<div style='height:150px;overflow-y:scroll;border: solid 1px #222;' >";
			$scrollOfFiles .= "<p>ccode::".$ccode."</p>";
			foreach ($arrayOfUploads as $a) {
				$explodeA = explode("_",$a);
				if($explodeA[0] == $ccode){
					$scrollOfFiles .= '<br><a href="' . BASE_URL . 'uploads/' . $a . '" target="_blank">' . $a . '</a>' ;
				}
			}
			$scrollOfFiles .= "</div>";
			echo $scrollOfFiles;
}

if (isset($_GET)) {
//print_r($_GET);
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'whatever' :
				break;

			default :
				//echo("<br> ccDetails controller ....get method default");
				//include_once ('v/whatever_view.php');
				include_once ('v/ccDetails.php');
				//print_r($_GET);
				break;
		}
	}else{
		//navigation without method
		if(isset($_GET['ccode'])){
			displayCCDetails($_GET['ccode']);
		}else{
			displayCCDetails($_POST['file_name_prefix']);
			//include_once ('v/ccDetails.php');
		}	
	}

} else if (isset($_POST)) {
	//print_r($_POST);
	if (isset($_POST['method'])) {
		switch ($_POST['method']) {
			case 'whatever' :
				break;
			 
			case 'uploadFile':
				echo('<br>uploadFile fn from the controller</br>');
				break;
			
			
			default :
				echo("<br> ccDetails controller ....post method else");
				include_once ('v/whatever_view.php');
				print_r($_POST);
				break;
		}
	}
}



?>
