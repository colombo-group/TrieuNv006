<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login, regist</title>
</head>
<body style="background-color: #eee;">
	<div id="login">
		<div id="logo">
			<a href="home.php" title="Về trang chủ"><img src="../../src/logo.jpg"></<a></a>
		
		</div>
		<form method="post">
			<table style="margin: auto; border-spacing: 3px; margin-top: 0px;">
				<tr>
					<td
						style="text-align: left; font-family: arial; color: #fff; font-size: 14px;">Email
						/ User</td>
					<td
						style="text-align: left; font-family: arial; color: #fff; font-size: 14px;">Mật
						khẩu</td>
				</tr>
				<tr>
					<td><input type="text" name="log_user" placeholder="Tên tài khoản"
						value="<?php echo isset($_POST['log_user'])?$_POST['log_user']:"" ?>"></td>
					<td><input type="password" name="log_pass" placeholder="Mật khẩu"></td>
					<td><input type="submit" name="login" value="Đăng nhập"></td>
				</tr>
				<tr>
					<td colspan="2"><span class="error"><?php echo $logErr; ?></span></td>
				</tr>
			</table>
		</form>

	</div>
	<div id="regist">
		<div
			style="font-family: courier; font-weight: bold; font-size: 36px; margin: auto; text-align: center;">Đăng
			ký</div>
		<form method="post">
			<table id="tb2">
				<tr>
					<td><input type="text" name="lastname" placeholder="Họ"
						value="<?php echo isset($_POST['lastname'])?$_POST['lastname']:"" ?>">
					</td>
					<td><input type="text" name="firstname" placeholder="Tên"
						value="<?php echo isset($_POST['firstname'])?$_POST['firstname']:"" ?>">

					</td>
					<td><span class="error"> <?php echo $nameErr;?></span></td>
				
				
				<tr>
					<td colspan="2"><input type="text" name="user"
						placeholder="Tên đăng nhập (độ dài > 5)"
						value="<?php echo isset($_POST['user'])?$_POST['user']:"" ?>"></td>
					<td><span class="error"> <?php echo $userErr;?></span></td>
				</tr>
				<tr>
					<td colspan="2"><input type="email" name="mail" placeholder="Email"
						value="<?php echo isset($_POST['mail'])?$_POST['mail']:"" ?>"></td>
					<td><span class="error"> <?php echo $mailErr;?></span></td>
				</tr>
				<tr>
					<td colspan="2"><input type="tel" name="phone"
						placeholder="Số điện thoại (là số)"
						value="<?php echo isset($_POST['phone'])?$_POST['phone']:"" ?>"></td>
					<td><span class="error"> <?php echo $phoneErr;?></span></td>
				</tr>
				<tr>
					<td colspan="2"><input type="password" name="reg_pass1"
						placeholder="Mật khẩu (độ dài > 6)"
						value="<?php echo isset($_POST['reg_pass1'])?$_POST['reg_pass1']:"" ?>"></td>
					<td><span class="error"> <?php echo $pass1Err;?></span></td>
				</tr>
				<tr>
					<td colspan="2"><input type="password" name="reg_pass2"
						placeholder="Nhập lại mật khẩu"
						value="<?php echo isset($_POST['reg_pass2'])?$_POST['reg_pass2']:"" ?>"></td>
					<td><span class="error"> <?php echo $pass2Err;?></span></td>
				</tr>
				<tr>
					<td><div style="font-size: 20px; text-align: left; margin: auto;">Ngày
							sinh</div></td>
					<!-- 				</tr>
				<tr> -->
					<td><input type="date" name="bday" placeholder="dd/mm/yyyy"
						; value="<?php echo isset($_POST['bday'])?$_POST['bday']:"" ?>"></td>
					<td><span class="error"> <?php echo $bdayErr;?></span></td>
				</tr>
				<tr>
					<td><div style="font-size: 20px; text-align: left; margin: auto;">Giới
							tính</div></td>
					<td id="sex"><input type="radio" name="sex" value="1"><label>Nam</label>
						<input type="radio" name="sex" value="2"><label>Nữ</label> <input
						type="radio" name="sex" value="3"><label>Khác</label></td>
					<td><span class="error"> <?php echo $sexErr;?></span></td>
				</tr>
				<tr>
					<td colspan="2"><input type="text" name="presenter"
						placeholder="Người giới thiệu (không nhất thiết)"
						value="<?php echo isset($_POST['presenter'])?$_POST['presenter']:"" ?>"></td>
					<td><span class="error"> <?php echo $preErr;?></span></td>
				</tr>
				<tr>
					<td><input type="submit" name="signup" value="Đăng ký"></td>
				</tr>
				</tr>
			</table>

		</form>

	</div>
</body>
<style type="text/css">
* {
	line-height: 1.3;
	margin: 0px;
}

table#tb2 {
	margin: auto;
	border-spacing: 10px;
}

#tb2 td {
	height: 40px;
	text-align: left;
}

div#login {
	position: relative;
	background-color: #06f;
	text-align: center;
	width: 1000px;
	border: 1px dotted #eee;
	margin: auto;
	min-width: 1000px;
	min-height: 80px;
	font-size: 14px;
	color: #fff;
}

div#logo {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0
		rgba(0, 0, 0, 0.19);
	position: absolute;
	height: 80px;
	background-color: #fff;
	left: 0px;
}

div#regist {
	background-color: #fff;
	text-align: center;
	width: 1000px;
	min-width: 1000px;
	border: 1px dotted #eee;
	margin: auto;
}

table#tb2 input {
	border-radius: 4px;
	width: 100%;
	height: 100%;
	font-size: 18px;
	padding-left: 5px;
}

td#sex input {
	width: auto;
	height: auto;
	margin: 5px;
}

td#sex label {
	text-align: left;
	margin-right: 20px;
}

span.error {
	color: #f00;
	font-size: 16px;
}
</style>
</html>