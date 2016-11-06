<!DOCTYPE html>
<html>
<head>
<title>home</title>
</head>
<script type="text/javascript">
	function del(id){
		var answer = confirm("Bạn có thạt sự muốn xóa?")
		if (answer){
			//window.location.replace('delete.php?id=' + id); 
 			document.write(id);
	        document.write("hash:" +window.location.hash + "<br/>");
	        document.write("host:" +window.location.host + "<br/>");
	        document.write("hostname:" +window.location.hostname + "<br/>");
	        document.write("href:" +window.location.href + "<br/>");
	        document.write("origin:" +window.location.origin + "<br/>");
	        document.write("pathname:" +window.location.pathname + "<br/>");
	        document.write("port:" +window.location.port + "<br/>");
	        document.write("search:" +window.location.search + "<br/>");
		}
		else{
		        //some code
		}
	}
</script>
<body
	style="background-image: url('../../src/img1.jpg'); background-size: cover;">
	<div id="main">
		<?php require '../view/header.php'; ?>
		<div id="content">
			<div class="center">
				<div
					style="width: 100%; height: 30px; border: 1px solid #eee; margin-top: 50px; position: relative;">

					<form method="post">
						&nbsp Chọn số hiển thị : <select name="limit"
							style="height: 30px;">
							<option value="5"
								<?php if (isset($_SESSION['limit']) && $_SESSION['limit'] == 5) echo "selected"?>>5</option>
							<option value="10"
								<?php if (isset($_SESSION['limit']) && $_SESSION['limit'] == 10) echo "selected"?>>10</option>
							<option value="20"
								<?php if (isset($_SESSION['limit']) && $_SESSION['limit'] == 20) echo "selected"?>>20</option>
							<option value="50"
								<?php if (isset($_SESSION['limit']) && $_SESSION['limit'] == 50) echo "selected"?>>50</option>
							<option value="100"
								<?php if (isset($_SESSION['limit']) && $_SESSION['limit'] == 100) echo "selected"?>>100</option>
						</select> <input type="submit" name="show" style="height: 30px;"
							value="Hiển thị">
					</form>
					<!--					<form method="get" style="position: absolute; right: 250px; bottom: 0px; height: 100%;">
						<input type="search" name="seach" style="height: 100%; width: 200px;">
						<input type="submit" name="find" style="height: 100%;" value="Tìm kiếm">

					</form> -->
					<span id="sp"><?php paginator() ?></span>

				</div>
			</div>
			<div class="center"
				style="box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 20px 0px; margin-top: 15px; min-height: 500px;">
				<div class="frame" style="height: 30px; background: #eee">
					<span class="sp2"
						style="height: 30px; top: 5px; color: #f00; font-size: 18px;">Họ
						tên <a href="<?php echo $_SERVER['PHP_SELF']."?what=1&&how=1" ?>">&#8593;</a>
						<a href="<?php echo $_SERVER['PHP_SELF']."?what=1&&how=2" ?>">&#8595;</a>
					</span> <span class="sp4"
						style="height: 30px; top: 5px; color: #f00; font-size: 18px;">Miêu
						tả bản thân</span>
					<span class="sp3"
						style="height: 30px; top: 5px; color: #f00; font-size: 18px;">Ngày
						tham gia <a
						href="<?php echo $_SERVER['PHP_SELF']."?what=2&&how=1" ?>">&#8593;</a>
						<a href="<?php echo $_SERVER['PHP_SELF']."?what=2&&how=2" ?>">&#8595;</a>
					</span>
				</div>
				<?php foreach ($records as $record) :?>
				<div class="frame" style="<?php if (isset($_SESSION['user']) && ($_SESSION['user']) == $record['user']) echo 'background: #fff;'?> ">
					<span class="sp1"><img
						src="<?php echo avatarPath .$record['avatar']; ?>"></span> <span
						class="sp2"><a title="Xem thông tin chi tiết"
						href="../controller/profile.php?id=<?php echo $record['id'] ?>"><?php echo $record['firstname']." &nbsp".$record['lastname'] ?></a>
						<br> <label>Nhấn để xem chi tiết</label> </span> 
					<span class="sp4"><?php echo $record['description'] ?></span>
					<span class="sp3"><?php echo $record['date'] ?></span>
					
					<div style="clear: both;"></div>
					<?php if (isset($_SESSION['role']) && $_SESSION['role'] > $record['role']) :?>
					<button style="position: absolute; top: 25px; right: 1px;"><a style="font-size: 14px;" href="delete.php?id=<?php echo $record['id'] ?>">Xoá</a></button>
					<button onclick="del(<?php echo $record['id'] ?>)" style="position: absolute; top: 25px; right: 1px;">Xoá</button>
					<?php endif;?>
				</div>
				
				<?php endforeach; ?>
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

div#content {
	width: 100%;
}

#sp {
	position: absolute;
	right: 2px;
	bottom: 1px;
}

#sp a {
	text-decoration: none;
	margin: 2px;
}

#sp a:HOVER {
	font-weight: bold;
}

div.center {
	width: 1124px;
	margin: auto;
}

div.frame {
	height: 80px;
	width: 850px;
	margin: auto;
	margin-top: 10px;
	padding: 2px;
	border: 2px solid #eee;
	position: relative;
}

.frame img {
	height: 100%;
	float: left;
}

.frame span.sp1 {
	position: absolute;
	height: 100%;
	left: 5px;
}

.frame span.sp2 {
	position: absolute;
	top: 25px;
	left: 200px;
}

.frame span.sp3 {
	position: absolute;
	top: 25px;
	left: 650px;
	color: #f39;
}

.frame span.sp4 {
	position: absolute;
	top: 25px;
	left: 400px;
	width: 280px;
}

.frame a {
	text-decoration: none;
	font-size: 20px;
}

.frame a:HOVER {
	font-weight: bold;
	color: #0f0;
}
</style>
</html>