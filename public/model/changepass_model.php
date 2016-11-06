<?php
	function checkPass($user, $pass){
		$oldpass = test_input ( $_POST ['oldpass'] );
		if (mysql_num_rows ( mysql_query ( "SELECT pass FROM users WHERE user = '$user' AND pass = '$pass'" ) ) == 0) {
			$oldpassErr = "Mật khẩu hiện tại không đúng";
			return false;
		}
		return true;
	}
	function changePass($id, $pass){
		$sql = "UPDATE users SET
		pass = '$pass' WHERE users.id = '$id'";
		return mysql_query($sql);
	}
	function test_input($data) {
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
?>