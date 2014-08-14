<?php

function searchDB_TABLE_KeyValueArray_OrderByField($db, $table, $keyValueArray, $orderByField) {
	$sql = "SELECT * from " . $db . "." . $table . " 
	WHERE 1=1";
	foreach ($keyValueArray as $k => $v) {
		$sql .= " AND " . $k . " LIKE '%" . $v . "%'";
	}
	$sql .= " ORDER BY " . $orderByField . " ; ";
	$data = getDataFromSQL($sql);
	return $data;
}

function sortBasicDB_TABLE_SortByField($db, $table, $sortByField) {
	$sql = "SELECT * from " . $db . "." . $table . " 
	WHERE 1=1";
	$sql .= " ORDER BY " . $sortByField . " ; ";
	$data = getDataFromSQL($sql);
	return $data;
}

function sortDB_TABLE_KeyValueArray_SortByField($db, $table, $keyValueArray, $sortByField) {
	$sql = "SELECT * from " . $db . "." . $table . " 
	WHERE 1=1";
	foreach ($keyValueArray as $k => $v) {
		$sql .= " AND " . $k . " LIKE '%" . $v . "%'";
	}
	$sql .= " ORDER BY " . $sortByField . " ; ";
	$data = getDataFromSQL($sql);
	return $data;
}

function getDataFromSQL($sql) {
	if (!$sql) {
		return array();
	}

	$host = HOST_DB;
	$user = USERNAME;
	$pword = PASSWORD;
	mysql_connect($host, $user, $pword);
	//echo(mysql_error());
	$array = null;
	$result = mysql_query($sql) or die(mysql_error() . '<br>' . $sql);
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = $row;
		}
	}
	return $data;
}
?>