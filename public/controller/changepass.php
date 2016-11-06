<?php 
include '../../config/config.php';
include '../model/changepass_model.php';
include '../../lib/getData.php';

$oldErr = $newErr1 = $newErr2 = "";

$user = ""; // lay thong tin user
if (isset ( $_GET ['id'] )) {
	$user = getInfoById ( $_GET ['id'] );
} else if (isset ( $_SESSION ['user'] )) {
	$user = getInfo ( $_SESSION ['user'] );
} else {
	header ( "location: ../../index.php" );
}

if ($_SESSION['role'] < $user['role'] && $_SESSION ['user'] != $user['user']){
	header ( "location: ../../index.php" );
}

$check = 0;
$newpass = 0;
if (isset($_POST['changpass'])){
	if (empty($_POST['oldpass'])){
		$check++;
		$oldErr = "Bạn chưa nhập trường này";
	}
	if (empty($_POST['newpass1'])){
		$check++;
		$newErr1 = "Bạn chưa nhập trường này";
	}else {
		$newpass = test_input($_POST['newpass1']);
	}
	if (empty($_POST['newpass2'])){
		$check++;
		$newErr2 = "Bạn chưa nhập trường này";
	}else if ($newpass != test_input($_POST['newpass2'])){
		$newErr2 = "Nhập lại sai";
		$check++;
	}
	
	if ($check == 0){
		if (!checkPass($_SESSION['user'], test_input($_POST['oldpass']))){
			$check++;
			$oldErr = "Mật khẩu hiện tại không đúng";
		}
		
		if ($check == 0){
			changePass($user['id'], $newpass);
		}
	}

}

include '../view/changepass.php';
?>
