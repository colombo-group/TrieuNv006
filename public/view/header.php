<!DOCTYPE html>
<html>
<body>
	<div id="topmost"></div>
	<div id="head">
		<div class="center" style="position: relative; min-height: 100px;";>
			<a style="position: absolute; left: 0px" href="../../index.php" title="Trang chủ"> <img
				src="../../src/logo.jpg">
			</a>
			<div style="float: right; position: absolute; top: 12px; right: 0px;">
					
					<?php
						if (isset ( $_SESSION ['role'] )) :
						$curUser = getInfo ( $_SESSION ['user'] );
						?>
		
					<a class="btl" href="../controller/profile.php" title="Trang cá nhân"><img class="avatar"
					src="<?php echo avatarPath .$curUser['avatar']; ?>"><b>&nbsp<?php echo $curUser['firstname']." " .$curUser['lastname']; ?></b></a>
				<a class="btl" title="Thoát tài khoản" href="../../lib/logout.php" title="Thoát tài khoản">Đăng
					xuất</a>
						
					<?php else : ?>
					<a class="btl" href="signup_in.php" title="Đăng ký / đăng nhập">Đăng nhập / đăng ký</a>
					<?php endif; ?>
				</div>
			<div style="clear: both;"></div>
		</div>
	</div>
</body>
<style type="text/css">
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

div#topmost {
	width: 100%;
	height: 15px;
}

div#head {
	width: 100%;
}

img.avatar {
	height: 35px;
	vertical-align: middle;
}
</style>
</html>