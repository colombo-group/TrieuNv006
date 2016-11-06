<?php
function getInfo($user) {
	$row = mysql_fetch_array ( mysql_query ( "SELECT * FROM `users` WHERE user = '$user'" ) );
/* 	if ($row ['role'] == 1) {
		$row ['role'] = "Member";
	} else if ($row ['role'] == 2) {
		$row ['role'] = "Admod";
	} else if ($row ['role'] == 3) {
		$row ['role'] = "Admin";
	} */
/* 	if ($row ['sex'] == 1) {
		$row ['sex'] = "Nam";
	} else if ($row ['sex'] == 2) {
		$row ['sex'] = "Nu";
	} else {
		$row ['sex'] = "Khac";
	} */
	return $row;
}
function getInfoById($id) {
	$row = mysql_fetch_array ( mysql_query ( "SELECT * FROM `users` WHERE id = '$id'" ) );
/* 	if ($row ['role'] == 1) {
		$row ['role'] = "Member";
	} else if ($row ['role'] == 2) {
		$row ['role'] = "Admod";
	} else if ($row ['role'] == 3) {
		$row ['role'] = "Admin";
	} */
/* 	if ($row ['sex'] == 1) {
		$row ['sex'] = "Nam";
	} else if ($row ['sex'] == 2) {
		$row ['sex'] = "Nu";
	} else {
		$row ['sex'] = "Khac";
	} */
	return $row;
}
function getPre($user) { // nhung nguoi dc gioi thieu boi $user
	return mysql_query ( "SELECT users.user FROM `users`,`users` as `u2` WHERE users.presenter = u2.user && u2.user = '$user'" );
}
function getRecords($what = 1, $how = 1, $start = 0, $end = 5) { // what = 1/2 sap xep theo ten/ngay tham gia , how = 1/2 sap xep tang/giam

	if ($what == 1) {
		$what = "firstname";
	}
	if ($what == 2) {
		$what = "date";
	}
	if ($how == 1) {
		$how = "ASC";
	}
	if ($how == 2) {
		$how = "DESC";
	}
	$query = mysql_query ( "SELECT * FROM `users` ORDER BY $what $how LIMIT $start, $end;" );
	while ( $row = mysql_fetch_assoc ( $query ) ) { // ??
		$data [] = $row;
	}
	return $data;
}
function coutUser() {
	$sql = "SELECT * FROM users";
	$query = mysql_query ( $sql );
	return mysql_num_rows ( $query );
}
?>