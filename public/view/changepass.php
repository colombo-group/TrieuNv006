<!DOCTYPE html>
<html>
<head>
<title>home</title>
</head>

<body>
	<div id="main">
		<?php require '../view/header.php'; ?>
		<div id="content">
			<div class="center center1">
				<form method="post"
					style="width: 600px; margin: auto; background-color: #fff;">
					<fieldset>
						<legend>Thay đổi mật khẩu tài khoản <b style="color: red; font-size: 24px;"><?php echo $user['user'] ?></b></legend>
						<table>
							<tr>
								<td><input type="password" name="oldpass"
									placeholder="Mật khẩu hiện tại của bạn"></td>
								<td class="err"><?php echo $oldErr?></td>
							</tr>
							<tr>
								<td><input type="password" name="newpass1"
									placeholder="Mật khẩu mới (độ dài > 6)"></td>
								<td class="err"><?php echo $newErr1 ?></td>
							</tr>
							<tr>
								<td><input type="password" name="newpass2"
									placeholder="Nhập lại mật khẩu"></td>
								<td class="err"><?php echo $newErr2 ?></td>
							</tr>
							<tr>
								<td><input type="submit" name="changpass" value="Thay đổi"></td>
								<td><button><a href="profile.php?id=<?php echo $user['id']?>" title="Hủy thay đổi">Hủy</a></button></td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
		</div>
		<?php require '../view/footer.php'; ?>
	</div>

</body>
<style type="text/css">
* {
	line-height: 1.5;
	margin: 0px;
	text-align: center;
	
}

div#main {
	width: 100%;
	padding: 0px;
	margin: 0px;
}

div#content {
	width: 100%;
}

div.center {
	width: 1124px;
	margin: auto;
}

.center1 {
	box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0
		rgba(0, 0, 0, 0.19);
	padding: 20px 0px;
	margin-top: 15px;
	min-height: 500px;
}

form input {
	margin: 10px 5px;
	width: 400px;
	height: 30px;
	font-size: 18px;
}

.err {
	color: red;
	max-width: 100px;
}
</style>
</html>