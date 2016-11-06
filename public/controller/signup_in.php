<?php
include ('../../config/config.php');
include ('../model/model_up_in.php');
$nameErr = $firstErr = $userErr = $phoneErr = $pass1Err = $pass2Err = $bdayErr = $sexErr = $mailErr = $logErr = $preErr = "";
// $user, $pass1, $pass, $firstName, $lastName, $phone, $bDay, $sex;

if (isset ( $_POST ['signup'] )) {
	if (checkFields ()) {
		signup ();
 		$_SESSION ['role'] = 1;
		$_SESSION ['user'] = $user;
		header ( "location: ../../index.php" );
	}
}

if (isset ( $_POST ['login'] )) {
	if (empty ( $_POST ['log_user'] ) || empty ( $_POST ['log_pass'] )) {
		$logErr = "Bạn chưa nhâp đủ thông tin !";
	} else if (isset ( $_COOKIE ['errlog'] ) && $_COOKIE ['errlog'] > 2) {
		$logErr = "Nhập sai quá 3 lần, quay lại sau 1h";
	} else {
		$user_mail = test_input ( $_POST ['log_user'] );
		$logpass = test_input ( $_POST ['log_pass'] );
		// $logpass = md5($logpass); mã hóa log pass bằng md5,.... *****************
		if (signin ( $user_mail, $logpass )) {
			$_SESSION ['role'] = checkRole ( $user_mail ) ['role'];
			$_SESSION ['user'] = checkRole ( $user_mail ) ['user'];
			
			setcookie ( 'errlog', "", time () - 3600 );
			//dieu huong
			header ( "location: ../../index.php" );
		} else {
			$logErr = "Sai mật khẩu hoặc tài khoản !";
			if (isset ( $_COOKIE ['errlog'] )) {
				if ($_COOKIE ['errlog'] > 2) {
					$logErr = "Nhập sai quá 3 lần, quay lại sau 1h";
					setcookie ( 'errlog', 2, time () + 3600 );
				} else {
					setcookie ( 'errlog', $_COOKIE ['errlog'] + 1, time () + 60 );
				}
			} else {
				setcookie ( 'errlog', 0, time () + 60 );
			}
		}
	}
}

include ('../view/login_out.php');
?>