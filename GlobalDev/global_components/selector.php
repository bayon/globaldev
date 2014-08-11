<?php

$selector = new SelectStart('defaultSelector');
$selectElement = $selector->make();
$array = array(1,2,3,4,5);
$options = new SelectOptions($array);
$selectOptionElement = $options ->make();

echo("<div >selector:".$selectElement.$selectOptionElement."</div>");


?>