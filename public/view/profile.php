<!DOCTYPE html>
<html>
<head>
<title>home</title>
<script type="text/javascript">
		function change(){
			document.getElementById("form1").disabled = false;
			document.getElementById("change").type = 'submit';
			document.getElementById("cancel").disabled = false;
			document.getElementById('oldpass').type = 'password';
		}
		function cancel(){
			 window.location.replace(window.location.href);
		}
	</script>
</head>

<body style="background-image: url('../../src/img3.jpg');">
	<div id="main">
		<?php require '../view/header.php'; ?>
		<div id="content">
			<div class="center center1">
				<img id="avatar" alt="avatar"
					src="<?php echo avatarPath .$user['avatar']; ?>">
				<?php if (empty($_SESSION['user'])) :?>
				<div
					style="min-width: 700px; min-height: 400px; border: 1px solid; float: left; text-align: center;">
					<p style="font-size: 22px; color: red"><?php echo $user['lastname']." ".$user['firstname'] ?></p>
					<br> <a class="btl" href="signup_in.php"
						title="Đăng ký / đăng nhập">Đăng nhập / đăng ký</a> Để xem chi
					tiết !
				</div>
				<?php endif; ?>
				<?php if (isset($_SESSION['user'])) :?>
				<form id="tb1" method="post">
					<fieldset disabled="true" id="form1">
						<legend>
							<b style="font-size: 24px; color: red;"><?php echo $user['lastname']." ".$user['firstname'] ?></b>
						</legend>
						<table style="border-spacing: 11px;">
							<tr>
								<td>Họ :</td>
								<td><input type="text" name="lastname"
									value="<?php echo $user['lastname']; ?>"></td>
								<td><span class="error"> <?php echo $lnameErr;?></span></td>
							</tr>
							<tr>
								<td>Tên :</td>
								<td><input type="text" name="firstname"
									value="<?php echo $user['firstname']; ?>"></td>
								<!-- <td><span class="error"> <?php echo $fnameErr;?></span></td> -->

								<td><span class="error"> <?php echo $fnameErr;?></span></td>
							</tr>
							<tr>
								<td>Email :</td>
								<td><input type="text" name="mail"
									value="<?php echo $user['mail'];?>"></td>
								<td><span class="error"> <?php echo $mailErr;?></span></td>
							</tr>
							<tr>
								<td>Số điện thoại :</td>
								<td><input type="tel" name="phone"
									value="<?php echo $user['phone'];?>"></td>
								<td><span class="error"> <?php echo $phoneErr;?></span></td>
							</tr>

							<tr>
								<td>Ngày sinh :</td>
								<td><input type="date" name="bday"
									value="<?php echo $user['birthday'];?>"></td>
								<td><span class="error"> <?php echo $bdayErr;?></span></td>
							</tr>
							<tr>
								<td>Giới tính :</td>
								<td id="sex"><input type="radio" name="sex" value="1"
									<?php if ($user['sex'] == 1) echo 'checked="checked"'; ?>><label>Nam</label>&nbsp
									<input type="radio" name="sex" value="2"
									<?php if ($user['sex'] == 2) echo 'checked="checked"'; ?>><label>Nữ</label>&nbsp
									<input type="radio" name="sex" value="3"
									<?php if ($user['sex'] == 3) echo 'checked="checked"'; ?>><label>Khác</label></td>
								<td><span class="error"> <?php echo $sexErr;?></span></td>

							</tr>
							<tr>
								<td>Vị trí:</td>
								<?php if ($_SESSION['role'] < 3 || $_SESSION['user'] == $user['user']): ?>
								<td><select name="role"><option
											value="<?php echo $user['role'] ?>" selected><?php echo $role ?></option></select></td>
								<?php elseif ($_SESSION['role'] == 3): ?>
								<td><select name="role">
										<option value="1"
											<?php if ($user['role'] == 1) echo "selected"; ?>>Member</option>
										<option value="2"
											<?php if ($user['role'] == 2) echo "selected"; ?>>Admod</option>
								</select></td>
								<?php endif; ?>
							</tr>
							<tr>
								<td colspan="2"><input type="hidden" id="oldpass" name="oldpass"
									style="width: 100%;" placeholder="Mật khẩu hiện tại (bắt buộc)"></td>
								<td><span class="error"> <?php echo $oldpassErr;?></span></td>
								<td><?php if ($_SESSION['role'] > $user['role'] || $_SESSION['user'] == $user['user']) :?>
								<input type="hidden" name="change" id="change"
									value="Đồng ý thay đổi">
									<?php endif; ?>
									</td>
							</tr>
							<tr>

							</tr>
						</table>
					</fieldset>
				</form>

				<div style="clear: both; padding: 2px;"></div>

				<div style="width: 100%; margin: auto; background-color: #fff;">
					<form method="post" enctype="multipart/form-data"
						style="float: left;">
					<?php if ($_SESSION['role'] > $user['role'] || $_SESSION['user'] == $user['user']) :?>	
						<input type="file" name="file" size="20" style="width: 190px;"> <input
							type="submit" value="Upload" name="upload">
					</form>
					<button onclick="cancel()" id="cancel" disabled="true"
						style="float: right;">Hủy</button>
					<button onclick="change()" style="float: right; margin: 0px 10px;">Chỉnh
						sửa</button>
					<a href="changepass.php?id=<?php echo $user['id']?>"
						id="changepass">Thay đổi mật khẩu</a>
					<div style="clear: both; padding: 2px; background-color: #eee;"></div>
					<?php endif; ?>
					<div style="width: 1000px; margin: auto; margin-top: 30px;">

						Những người được <b><?php echo $user['lastname']." ".$user['firstname'] ?></b> giới thiệu:
					<?php
					// $row = mysql_num_rows ( getPre ($user['user'] ) );
					$s = getPre ( $user ['user'] );
					echo "<b>";
					while ( $row = mysql_fetch_assoc ( $s ) ) {
						print_r ( $row ['user'] );
						echo " &nbsp";
					}
					echo "</b>";
					?>
					</div>

				</div>
				<?php endif;?>
			</div>
		</div>
		<?php require '../view/footer.php'; ?>
	</div>

</body>
<style type="text/css">
* {
	margin: 0px;
	line-height: 1.5
}

div#main {
	width: 100%;
	padding: 0px;
	margin: 0px;
}

img#avatar {
	width: 300px;
	float: left;
	margin: 0px 5px;
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

a.btl {
	text-decoration: none;
	border: 1px solid #eee;
	font-size: 22px;
	padding: 8px;
}

.btl:hover {
	box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0
		rgba(0, 0, 0, 0.19);
}

form#tb1 {
	background-color: #fff;
	float: left;
	min-width: 800px;
}

#tb1 td {
	height: 35px;
}

#tb1 input {
	height: 100%;
	font-size: 16px;
}

a#changepass {
	text-decoration: none;
	background-color: #bbb;
	text-align: center;
	display: block;
	width: 200px;
	height: 23px;
	border: 1px solid #444;
	float: right;
}

span.error {
	color: #f00;
	font-size: 16px;
}
</style>
</html>