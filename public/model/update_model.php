<?php
function changeInfo($mail, $firstName, $lastName, $phone, $bDay, $sex, $id) {
	echo $id;
	$sql = "UPDATE users SET
	 mail = '$mail', lastname = '$lastName', firstname = '$firstName', phone = '$phone', birthday = '$bDay', sex = '$sex' WHERE users.id = '$id'";
	echo $sql;
	return mysql_query ( $sql ); // update ???;
}
function adminchangeInfo($mail, $firstName, $lastName, $phone, $bDay, $sex, $role, $id) {
	echo $id;
	$sql = "UPDATE users SET
	mail = '$mail', lastname = '$lastName', firstname = '$firstName', phone = '$phone', birthday = '$bDay', sex = '$sex', role = '$role' WHERE users.id = '$id'";
	echo $sql;
	mysql_query ( $sql ); // update ???;
}
function checkFields() { // kiem tra cac truong nhap vao co hop le k
	if (! checkEmpty ())
		return false;
	if (! checkExist ())
		return false;
	return true;
}
function checkEmpty() { // check empty, if(!empty) set user, pass,...
	global $fnameErr, $lnameErr, $mailErr, $phoneErr, $passErr, $bdayErr, $sexErr, $mailErr;
	global $mail, $newpass, $firstName, $lastName, $phone, $bDay, $sex;
	$i = 0;
	if (empty ( $_POST ["firstname"] )) { // check firstname
		$fnameErr = "Chưa nhập trường này";
		$i ++;
	} else {
		$firstName = test_input ( $_POST ['firstname'] );
		if (! preg_match ( "/^[a-zA-Z]*$/", $firstName )) {
			$fnameErr = "Họ tên chỉ được là chữ";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["lastname"] )) { // check lastname
		$lnameErr = "Chưa nhập trường này";
		$i ++;
	} else {
		$lastName = test_input ( $_POST ['lastname'] );
		if (! preg_match ( "/^[a-zA-Z]*$/", $lastName )) {
			$lnameErr = "Họ tên chỉ được là chữ";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["mail"] )) { // check mail
		$mailErr = "Chưa nhập trường này";
		$i ++;
	} else {
		$mail = test_input ( $_POST ['mail'] );
		if (! filter_var ( $mail, FILTER_VALIDATE_EMAIL )) {
			$mailErr = "Email không có thực";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["phone"] )) { // check phone
		$phoneErr = "Chưa nhập trường này";
		$i ++;
	} else {
		$phone = test_input ( $_POST ['phone'] );
		if (! preg_match ( "/^[0-9]{9,14}$/", $_POST ["phone"] )) {
			$phoneErr = "Số điện thoại không có thực";
			$i ++;
		}
	}
	
	if (empty ( $_POST ["bday"] )) { // check birthday
		$bdayErr = "Chưa nhập trường này";
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
	
	/*
	 * $pass1;
	 * if (empty ( $_POST ["pass1"] )) { // check pass1
	 * $passErr = "Chưa nhập 1 trong 2 trường";
	 * $i ++;
	 * } else {
	 * $pass1 = test_input ( $_POST ['pass1'] );
	 * }
	 *
	 * if (empty ( $_POST ["pass2"] )) { // check pass2 and set pass
	 * $passErr = "Chưa nhập trường này";
	 * $i ++;
	 * } else {
	 * $newpass = test_input ( $_POST ['pass2'] );
	 * if ($pass1 !== $newpass) {
	 * $passErr = "Nhập lại chưa đúng";
	 * $i ++;
	 * }
	 * // $pass = md5($pass); Mã hóa pass bằng md5,....
	 * }
	 */
	
	if (empty ( $_POST ["sex"] )) { // check sex
		$sexErr = "Chưa nhập trường này";
		$i ++;
	} else {
		$sex = test_input ( $_POST ['sex'] );
	}
	if ($i > 0)
		return false;
	return true;
}
function checkExist() {
	global $mailErr, $oldpassErr;
	$i = 0;
	
	global $mail, $id;
	if (mysql_num_rows ( mysql_query ( "SELECT `mail` FROM `users` WHERE `mail` = '$mail' and `id` != '$id'" ) )) {
		$mailErr = "Email đã có người sử dụng!";
		$i ++;
	}
	$oldpass = test_input ( $_POST ['oldpass'] );
	if (mysql_num_rows ( mysql_query ( "SELECT pass FROM users WHERE id = '$id' AND pass = '$oldpass'" ) ) == 0) {
		$oldpassErr = "Mật khẩu hiện tại không đúng";
		$i ++;
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