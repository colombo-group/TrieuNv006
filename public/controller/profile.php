<?php
include '../../config/config.php';
include '../../lib/getData.php';
include '../model/update_model.php';
include '../../lib/upImg.php';

$fnameErr = $lnameErr = $mailErr = $phoneErr = $passErr = $bdayErr = $sexErr = $mailErr = $oldpassErr = "";

$user = ""; // lay thong tin user
if (isset ( $_GET ['id'] )) {
	$user = getInfoById ( $_GET ['id'] );
} else if (isset ( $_SESSION ['user'] )) {
	$user = getInfo ( $_SESSION ['user'] );
} else {
	header ( "location: ../../index.php" );
}

$id = $user ['id'];
$userName = $user ['user'];

if (isset ( $_POST ['change'] )) {
	if (checkFields ()) {
		if ($_SESSION['role'] == 3){
			$role = $_POST['role'];
			if ($role > 3 || $role < 1) $role = 1;
			adminchangeInfo($mail, $firstName, $lastName, $phone, $bDay, $sex, $role, $id);
		}else {
			echo ".!=3";
			changeInfo ( $mail, $firstName, $lastName, $phone, $bDay, $sex, $id );
		}
	}
}
if (isset ( $_POST ['upload'] )) {
	uploadAvatar ( $userName );
}
$role = "";
if ($user ['role'] == 1) {
	$role = "Member";
} else if ($user ['role'] == 2) {
	$role = "Admod";
} else if ($user ['role'] == 3) {
	$role = "Admin";
}
echo $user ['role'];
include '../view/profile.php';
?>