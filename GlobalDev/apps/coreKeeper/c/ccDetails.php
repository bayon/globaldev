<?php
function displayCCDetails($cc_code){
	$ccmath = new CCMATH();
	$ccmath->getDetailsForCCode($cc_code);
	include_once ('v/ccDetails.php');
}

function displayAttachments($user,$ccode){
			//$arrayOfUploads = scandir(BASE_PATH . '/uploads/'); // array of uploads is an array of filenames.
			//SAVE ATTACHMENT INFORMATION HERE
			$arrayOfUploads = getAllAttachments($user);
			//print_r($arrayOfUploads);
			$scrollOfFiles = "<div style='height:150px;overflow-y:scroll;border: solid 1px #222;padding:20px;' >";
			$scrollOfFiles .= "<p>ccode::".$ccode."</p>";
			//echo(count($arrayOfUploads));
			if(count($arrayOfUploads) > 0){
				foreach ($arrayOfUploads as $a) {
					//echo("<pre>");print_r($a);echo("</pre>");
					$explodeA = explode("_",$a['filename']);
					if($explodeA[0] == $ccode){
						$scrollOfFiles .= '<br><a href="' . BASE_URL . 'uploads/' . $a['filename'] . '" target="_blank" style="float:left;">' . $a['filename'] . '</a>' ;
						
						$cc_codeExplode = explode("_",$a['filename']);
						$cc_code = $cc_codeExplode[0];
						$scrollOfFiles .= '<a href="' . BASE_URL . 'index.php?controller=ccDetails.php&method=deleteAttachment&user_id='.$user->user_id.'&filename='.$a['filename'].'&cc_code='.$cc_code.'&id=' . $a['id'] . '" style="float:right;">delete</a>';
					}
				}
			}
			
			
			$scrollOfFiles .= "</div>";
			echo $scrollOfFiles;
}

if (isset($_GET)) {
//print_r($_GET);
	if (isset($_GET['method'])) {
		switch($_GET['method']) {
			case 'deleteAttachment' :
				//echo("ready to delete");//ready to deleteArray ( [controller] => ccDetails.php [method] => deleteAttachment [id] => 3 ) 
				//print_r($_GET);
				deleteAttachmentWithId($_GET['id']);
				$arrayOfUploads = scandir(BASE_PATH . '/uploads/'); // array of uploads is an array of filenames.
				foreach ($arrayOfUploads as $a) {
					if($a == $_GET['filename']){
						//echo("<script>alert('delete and move :".$_GET['filename']."'); </script>");
						rename(BASE_PATH . '/uploads/'.$_GET['filename'],BASE_PATH . '/uploads/trashed/'.$_GET['user_id'].'_'.$_GET['filename']);
					} 
				}
				displayCCDetails($_GET['cc_code']);
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
