<?php
function signup() {
	global $user, $mail, $pass1, $pass, $firstName, $lastName, $phone, $bDay, $sex, $pre;
	
	$sql = "INSERT INTO users(`user`,`mail`, `lastname`, `firstname`, `pass`, `phone`, `birthday`, `sex`, `presenter`)
			VALUES ('$user','$mail','$lastName','$firstName','$pass','$phone','$bDay','$sex', '$pre')" ;
	return mysql_query ($sql);
}
function signin($user_mail, $pass) {
	return mysql_num_rows ( mysql_query ( "SELECT `pass` FROM `users` WHERE (user = '$user_mail' OR mail = '$user_mail') AND pass = '$pass'" ) ) == 1;
}
function checkRole($user_mail) {
	return mysql_fetch_array ( mysql_query ( "SELECT `role`, `user` FROM `users` WHERE user = '$user_mail' OR mail = '$user_mail'" ) );
}
function checkFields() { // kiem tra cac truong nhap vao co hop le k
	if (! checkEmpty ())
		return false;
	if (! checkExist ())
		return false;
	return true;
}
function checkEmpty() { // check empty, if(!empty) set user, pass,...
	global $nameErr, $firstErr, $mailErr, $userErr, $phoneErr, $pass1Err, $pass2Err, $bdayErr, $sexErr, $mailErr;
	global $user, $mail, $pass1, $pass, $firstName, $lastName, $phone, $bDay, $sex;
	$i = 0;
	if (empty ( $_POST ["firstname"] )) { // check firstname
		$nameErr = "Bạn chưa nhập họ/tên";
		$i ++;
	} else {
		$firstName = test_input ( $_POST ['firstname'] );
		if (! preg_match ( "/^[a-zA-Z]*$/", $firstName )) {
			$nameErr = "Họ tên chỉ được là chữ";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["lastname"] )) { // check lastname
		$nameErr = "Bạn chưa nhập họ/tên";
		$i ++;
	} else {
		$lastName = test_input ( $_POST ['lastname'] );
		if (! preg_match ( "/^[a-zA-Z]*$/", $lastName )) {
			$nameErr = "Họ tên chỉ được là chữ";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["user"] )) { // check user
		$userErr = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$user = test_input ( $_POST ['user'] );
	}
	
	if (empty ( $_POST ["mail"] )) { // check mail
		$mailErr = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$mail = test_input ( $_POST ['mail'] );
		if (! filter_var ( $mail, FILTER_VALIDATE_EMAIL )) {
			$mailErr = "Email không có thực";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["reg_pass1"] )) { // check pass1
		$pass1Err = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$pass1 = test_input ( $_POST ['reg_pass1'] );
	}
	
	if (empty ( $_POST ["reg_pass2"] )) { // check pass2 and set pass
		$pass2Err = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$pass = test_input ( $_POST ['reg_pass2'] );
		if ($pass1 !== $_POST ['reg_pass2']) {
			$pass2Err = "Nhập lại chưa đúng";
			$i ++;
		}
		// $pass = md5($pass); Mã hóa pass bằng md5,....
	}
	
	if (empty ( $_POST ["phone"] )) { // check phone
		$phoneErr = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$phone = test_input ( $_POST ['phone'] );
		if (! preg_match ( "/^[0-9]{9,14}$/", $_POST ["phone"] )) {
			$phoneErr = "Số điện thoại không có thực";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["bday"] )) { // check birthday
		$bdayErr = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$bDay = date ( test_input ( $_POST ['bday'] ) );
		/*
		 * if (!preg_match("\^[0-3][0-9]/[0-1][0-9]/[1-2][0-9]{3}\$",$bDay)){
		 * $bdayErr = "Ngày sinh không hợp lệ";
		 * $i ++;
		 * }
		 */
	}
	
	if (empty ( $_POST ["sex"] )) { // check sex
		$sexErr = "Bạn chưa nhập trường này";
		$i ++;
	} else {
		$sex = test_input ( $_POST ['sex'] );
	}
	if ($i > 0)
		return false;
	return true;
}
function checkExist() {
	global $user;
	global $userErr, $mailErr;
	$i = 0;
	if (mysql_num_rows ( mysql_query ( "SELECT `user` FROM `users` WHERE user = '$user'" ) )) {
		$userErr = "Tài khoản đã tồn tại!";
		$i ++;
	}
	
	global $mail;
	if (mysql_num_rows ( mysql_query ( "SELECT `mail` FROM `users` WHERE mail = '$mail'" ) )) {
		$mailErr = "Email đã có người sử dụng!";
		$i ++;
	}
	if (empty ( $_POST ['presenter'] )) {
		global $pre;
		$pre = "";
	} else {
		global $pre;
		$pre = test_input ( $_POST ['presenter'] );
		if (mysql_num_rows ( mysql_query ( "SELECT `user` FROM `users` WHERE user = '$pre'" ) ) == 0) {
			global $preErr;
			$preErr = "Không tồn tài thành viên này";
			$i ++;
		}
	}
	return ($i > 0) ? false : true;
}
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}

?>