<?php

function createAnchorTableWith_Data_HeaderTextAndFieldsArray($data,$headers,$controller,$previousSearchCriteria) {
	 
	$html .= "<div class='anchorTable_table_container'><table border=0 cellpadding=0 cellspacing=0  width=100% >";
	$html .= "<tr>";
	foreach ($headers as $header) {
		$html .= "<th><a href='" . $_SERVER['PHP_SELF'] . "?controller=".$controller."&method=sort&sortField=" . $header['field'] . "" . $previousSearchCriteria . "'>" . $header['text'] . "</a></th>";
	}
 	//$html .= "<th>Details</th>";
 	$html .= "<th>Actions</th>";
	$html .= "</tr>";
	$rowNum = 0;

	foreach ($data as $record) {
		$html .= "<tr>";
		//MANUAL MANIPULATION REQUIRED:
		//define links for each row's data
		$startLink = "<td><a href='" . $_SERVER['PHP_SELF'] . "?controller=".$controller."&method=select_row&anchorTable_id=" . $record['id'] . "&title=" . $record['title'] . "&os=" . $record['os'] . "&id=" . $record['id'] . "  '  >";
		$endLink = "</a></td>";
		
		$startCode="<td><textarea id='" . $record['id'] . "'  class='inputText'>";
		$endCode = "</textarea></td>";
		//define the displayed link text
		$html .= $startLink . $record[$headers[0]['field']] . $endLink;
		$html .= $startLink . $record[$headers[1]['field']] . $endLink;
		$html .= $startLink . $record[$headers[2]['field']] . $endLink;
		$html .= $startCode . $record[$headers[3]['field']] . $endCode;
		
		$html .= "<td><div><input type='button' title='expand' onClick='expand(" . $record['id'] . ")' value='+'></input>
		<input type='button' title='collapse' onClick='collapse(" . $record['id'] . ")' value='-'></input></div></td>";
		//$html .= "<td style='text-align:center;'><a  href='/" . $_SERVER['PHP_SELF'] . "?controller=pageX.php&method=view&pkey=" . $record['id'] . "'> 
		//<img src='/images/ico_view.gif' alt='View ' border='0' ></a></td>";
		$html .= "</tr>";
	}

	$html .= "</table></div>";
	
	$html .= "<script>
	function expand(id){	
		document.getElementById(id).style.height='300px';
		document.getElementById(id).style.width='300px';
	}
	function collapse(id){	
		document.getElementById(id).style.height='30px';
		document.getElementById(id).style.width='40px';
	}
	</script>";
	/*
	 *  // SAVE THIS- it can be it's own thing. an anchor with an image.
	$html .= '<div style="margin-top:10px;margin-bottom:10px;">
	<a  href="/' . $_SERVER[PHP_SELF] . '?action=search_license_form&submit=search_licenses"> 
	<img src="../../global_img/zeroBackground.png" alt="Search Licenses" border="0" >
	License Search Form</a>
	</div>';
	 * 
	 */

	return $html;

}

//Controller and Model code
$db = "training";
$table = "task";
if (!isset($_GET['sortField'])) {
	$sql = "SELECT * FROM " . $db . ".".$table." ";
	$data = getDataFromSQL($sql) ;
} else {
	$db = "training";
	$table = "task";
	$keyValueArray = array('id'=>$_GET['id'],'os'=>$_GET['os'],'title'=>$_GET['title']);
	$sortByField =$_GET['sortField'];
	$data = sortBasicDB_TABLE_SortByField($db, $table,  $sortByField);
}
 //preparation 
$headers = array( array("text" => "Id", "field" => "id"), array("text" => "os", "field" => "os"), array("text" => "title", "field" => "title"), array("text" => "description", "field" => "description"));
$controller="pageX.php";
$previousSearchCriteria = "&id=" . $_GET['id'] . "&os=" . $_GET['os'] . "&title=" . $_GET['title'] . "";

$anchorTable = createAnchorTableWith_Data_HeaderTextAndFieldsArray($data,$headers,$controller,$previousSearchCriteria);
echo($anchorTable);

 
?>