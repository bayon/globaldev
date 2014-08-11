<?php

function sanitize($data) {
	$data = mysql_real_escape_string($data);
	$data = htmlspecialchars($data);
	return $data;
}

function preventDuplicates($data, $value) {
	//*warning: This loops through a typical multi-dimensional array created by mysql_query();
	//			It is NOT specific to any particular field !
	$alreadyExists = false;
	foreach ($data as $row => $rowArray) {
		foreach ($rowArray as $field => $fieldValue) {
			if ($fieldValue != $value) {
				//leave boolean false
			} else {
				//set flag
				$alreadyExists = true;
			}
		}
	}

	return $alreadyExists;
}

function mailIt($to, $subject, $message) {
	echo("<br>utility.php - mailIt()");
	//mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
	mail($to, $subject, $message);

}

function corruptDataCheck($data) {
	//IN: multi-dimensional array from mysql
	//OUT: $data OR ( 1 if corrupt)
	//check: for php or javascript injection
	if (is_array($data)) {
		foreach ($data as $parcel) {
			if (strpos($parcel, '<?') !== false || strpos($parcel, '<script') !== false) {
				// CORRUPT !
				$array[] = true;
			} else {
				$array[] = false;
			}
		}
		//If any data in the array was corrupted...
		if (in_array(1, $array)) {
			return 1;
		} else {
			return $data;
		}
	} else {
		if (strpos($data, '<?') !== false || strpos($data, '<script') !== false) {
			// CORRUPT !
			$corrupt = true;
			return 1;
		} else {
			$corrupt = false;
			return $data;
		}
	}
}

function corruptionWarning() {
	$warning = "<p>You are entering data that could be construed as malicious code.</p>
			<p>Please refrain.</p> ";
	return $warning;
}

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

	$host = "localhost";
	$user = "root";
	$pword = "";
	mysql_connect($host, $user, $pword);
	echo(mysql_error());
	$array = null;
	$result = mysql_query($sql) or die(mysql_error() . '<br>' . $sql);
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = $row;
		}
	}
	return $data;
}

function anchorTo_File_Action_LinkText_Icon($file, $action, $anchorText, $icon) {
	$anchor = " <a href='/" . $file . "?" . $action . "'>
                  <img src='/images/" . $icon . "' alt='" . $anchorText . "' border='0'>
                  &nbsp; " . $anchorText . "</a> ";
	return $anchor;
}

function round_eighth($input) {
	$stepone = $input * 8;
	// mult by 8
	$steptwo = ceil($stepone);
	// roundup
	$stepthree = $steptwo / 8;
	// should be up to nearest eighth
	return $stepthree;
}
?>