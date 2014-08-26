<?php
//echo(GLOBAL_DIR);die();
$global_dir = "C:/xampp/htdocs/GlobalDev";
require_once $global_dir.'/global_jq_suite/jq-config-projectX.php';
// include the jqGrid Class

require_once ABSPATH . "php/jqGrid.php";
// include the driver class
require_once ABSPATH . "php/jqGridPdo.php";
// Connection to the server
$conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
// Tell the db that we use utf-8
$conn -> query("SET NAMES utf8");

// Create the jqGrid instance
$grid_pageX = new jqGridRender($conn);
// Write the SQL Query
$grid_pageX -> SelectCommand = 'SELECT id,os,title,date FROM task';
// Set output format to json
$grid_pageX -> dataType = 'json';
// Let the grid create the model
// boolean setColModel( [ $model = null], [ $params = null], [ $labels = null]  )
$Model = array(
    array("name"=>"id","width"=>40,"editable"=>false,"key"=>true),
    array("name"=>"os","width"=>40,"editable"=>false),
    array("name"=>"title","width"=>40,"editable"=>false),
    array("name"=>"date","editable"=>false)
    );
	 
   // array("name"=>"description","width"=>440,"editable"=>false),

$grid_pageX -> setColModel($Model);
$grid_pageX->setPrimaryKeyId('id');
// Set the url from where we obtain the data
//ORIGINAL : $grid_pageX -> setUrl('http://localhost/GlobalDev/global_components/jq_searchable_grid/grid.php');
$grid_pageX -> setUrl('http://localhost/GlobalDev/apps/projectX/v/pageX/jq_searchable_grid/grid.php');
// Set some grid options
$grid_pageX -> setGridOptions(array("rowNum" => 10, "rowList" => array(10, 20, 30), "sortname" => "id"));
// Change some property of the field(s)
//$grid_pageX -> setColProperty("os", array("formatter" => "date", "formatoptions" => array("srcformat" => "Y-m-d H:i:s", "newformat" => "m/d/Y")));
//$grid_pageX -> setColProperty("description", array("width" => "50"));
// Enable navigator OrderID
$grid_pageX -> navigator = true;
// Enable search
$grid_pageX -> setNavOptions('navigator', array("excel" => false, "add" => false, "edit" => false, "del" => false, "view" => false));
// Activate single search
$grid_pageX -> setNavOptions('search', array("multipleSearch" => false));
// Enjoy
$grid_pageX -> renderGrid('#grid', '#pager', true, null, null, true, true);
$conn = null;
?>
