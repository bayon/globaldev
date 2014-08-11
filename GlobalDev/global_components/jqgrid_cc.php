<?php ?>
<body>
<div   class='container' >
	<table id="list2"></table>
	<div id="pager2"></div>
</div>
</body>
</html>
<script>
	$(document).ready(function() {
		console.log('jsgrid is ok');
		jQuery("#list2").jqGrid({
			url : 'http://localhost/GlobalDev/global_components/cc_load_json_data/server.php?q=2',
			datatype : "json",
			colNames : ['pk',   'id', 'code', 'statement' ],
			colModel : [{
				name : 'pk',
				index : 'pk',
				width : 55
			}, {
				name : 'id',
				index : 'id',
				width : 180,
				align : "left"
			}, {
				name : 'code',
				index : 'code',
				width : 180,
				align : "left"
			}, {
				name : 'statement',
				index : 'statement',
				width : 580,
				align : "left"
			} ],
			rowNum : 10,
			rowList : [10, 20, 30],
			pager : '#pager2',
			sortname : 'pk',
			viewrecords : true,
			sortorder : "desc",
			caption : "JSON Example"
		});
		jQuery("#list2").jqGrid('navGrid', '#pager2', {
			edit : false,
			add : false,
			del : false
		});
	}); 
</script>