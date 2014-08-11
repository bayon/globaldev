<?php
//config.php
$host = "localhost";
$user = "root";
$pword = "";
$db = "globaldev";
$table = "simple_feedback";
?>
<?php
mysql_connect($host, $user, $pword);
echo(mysql_error());
$sqlSlider = "SELECT answer_4 FROM " . $db . ".simple_feedback ";
$resSlider = mysql_query($sqlSlider);
while ($rowSlider = mysql_fetch_assoc($resSlider)) {
	$a_data[] = $rowSlider;
}
//-----PREPARE DATA for json encode
$count = count($a_data);
$i = 0;
while ($i < $count) {
	$dataset1[] = "[" . $i . ", " . (int)$a_data[$i]['answer_4'] . "]";
	$i++;
}
//JSON ENCODE
$json_dataSet = json_encode($dataset1);
//CREATE JSON ENCODED VARIABLE
echo("<script>var json_dataSet = '['+" . $json_dataSet . "+']';</script>");
?>

<div id="placeholder" class='component_container flot_graph_container' style=""></div>
<script type="text/javascript">
	var myJson = $.parseJSON(json_dataSet);
	//alert(myJson);

	$(function() {
		var d1 = [];
		for (var i = 0; i < 14; i += 0.5)
			d1.push([i, Math.sin(i)]);

		var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];

		var d3 = [];
		for (var i = 0; i < 14; i += 0.5)
			d3.push([i, Math.cos(i)]);

		var d4 = [];
		for (var i = 0; i < 14; i += 0.1)
			d4.push([i, Math.sqrt(i * 10)]);

		var d5 = [];
		for (var i = 0; i < 14; i += 0.5)
			d5.push([i, Math.sqrt(i)]);

		var d6 = [];
		for (var i = 0; i < 14; i += 0.5 + Math.random())
			d6.push([i, Math.sqrt(2 * i + Math.sin(i) + 5)]);

		$.plot($("#placeholder"), [{
			data : myJson,
			lines : {
				show : true,
				fill : true
			}
		}, {
			data : myJson,
			bars : {
				show : true
			}
		}, {
			data : myJson,
			points : {
				show : true
			}
		}, {
			data : myJson,
			lines : {
				show : true
			}
		}, {
			data : myJson,
			lines : {
				show : true
			},
			points : {
				show : true
			}
		}, {
			data : myJson,
			lines : {
				show : true,
				steps : true
			}
		}]);
	}); 
</script>

