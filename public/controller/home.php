<?php
include '../../config/config.php';
include '../../lib/getData.php';
$curUser = "";
if (isset($_SESSION['user'])){
	$curUser = getInfo($_SESSION['user']);
}
$limit = 5;
if (isset ( $_POST ['show'] )) {
	$_SESSION ['limit'] = $_POST ['limit'];
	$limit = $_SESSION ['limit'];
}
if ($limit < 0 || $limit > 100) {
	$limit = 5;
}
$pages = ceil ( coutUser () / $limit );
if ($pages < 1)
	$pages = 1;

$curpage = 1;
if (isset ( $_GET ['cur'] )) {
	$curpage = $_GET ['cur'];
}
if ($curpage < 1)
	$curpage = 1;
if ($curpage > $pages)
	$curpage = $pages;

function paginator() {
	global $limit, $curpage, $pages;
	
	echo '<a href="' . $_SERVER ['PHP_SELF'] . '?cur=1' . '">' . "Đầu" . '</a>';
	for($i = 1; $i < $pages + 1; $i ++) {
		echo '<a href="' . $_SERVER ['PHP_SELF'] . '?cur=' . $i . '">' . "$i" . '</a>';
	}
	echo '<a href="' . $_SERVER ['PHP_SELF'] . '?cur=' . $pages . '">' . "Cuối" . '</a>';
}

$records = getRecords ( 1, 1, ($curpage - 1) * $limit, $limit );
$slides = getRecords(2, 2, 0, 5);
if (isset($_GET['what']) && isset($_GET['how'])){
	if ($_GET['what'] == 1){
		if ($_GET['how'] == 1) $records = getRecords ( 1, 1, ($curpage - 1) * $limit, $limit );
		if ($_GET['how'] == 2) $records = getRecords ( 1, 2, ($curpage - 1) * $limit, $limit );
	}else {
		if ($_GET['how'] == 1) $records = getRecords ( 2, 1, ($curpage - 1) * $limit, $limit );
		if ($_GET['how'] == 2) $records = getRecords ( 2, 2, ($curpage - 1) * $limit, $limit );
	}
}

include '../view/newHome.php';
?>