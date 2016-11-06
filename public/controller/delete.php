<?php
include '../../config/config.php';
include '../../lib/getData.php';

$user = [];
if (isset ( $_GET ['id'] )) {
	$user = getInfoById ( $_GET ['id'] );
} else{
	header ( "location: ../../index.php" );
}
if ($_SESSION['role'] < $user['role'] ){
	header ( "location: ../../index.php" );
}
$id = $user['id'];

echo "DELETE FROM `users` WHERE `id` = '$id'";
 mysql_query("DELETE FROM `users` WHERE `id` = '$id'");
header ( "location: ../../index.php" );

?>
