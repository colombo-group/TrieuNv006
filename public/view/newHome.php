<html>
<head>
<title>home</title>
</head>
<link rel="stylesheet" type="text/css" href="supportHome/home.css">
<link rel="stylesheet" type="text/css" href="supportHome/jquery-ui.css">
<link rel="stylesheet" type="text/css"
	href="supportHome/jquery.dataTables.min.css">
<body style="background-image: url(../../src/img3.jpg)">
	<?php require '../view/header.php'; ?>
	<div id="main">
		<div id="content">
			<div class="center" style="width: 100%;">
				<div id="slide-contain">
					<div id="option">
						<!-- <input id="check-thumbnail" type="checkbox" name="thumbnail" checked="checked"> thumbnail  -->
						<input id="check-dot" type="checkbox" name="dot" checked="checked">
						dots <select id="select">
							<option value="0" selected="selected">slide</option>
							<option value="1">fade</option>
						</select>
					</div>
					<div id="c1">
						<div id="view-slides">
							<!-- 							<img src="supportHome/img/slide1.jpg">
							<img src="supportHome/img/slide2.jpg">
							<img src="supportHome/img/slide3.jpg">
							<img src="supportHome/img/slide4.jpg">
							<img src="supportHome/img/slide5.jpg">
							<img src="supportHome/img/slide6.jpg"> -->
							<?php foreach ($slides as $slide) :?>
							<span style="width: 800px; height: 100%; float: left;"> <img
								id="avatar" alt="avatar"
								src="<?php echo avatarPath .$slide['avatar']; ?>">
							<?php echo $slide['firstname'] ."&nbsp" .$slide['lastname']?>
							<br>
							<?php echo $slide['description']?>
							</span>
							<?php endforeach; ?>

						</div>
					</div>
					<span class="arrow" id="prev"><</span> <span class="arrow"
						id="next">></span>
					<div class="thumbnail" id="imgleft"></div>
					<div class="thumbnail" id="imgright"></div>
					<ul id="chose">

					</ul>
				</div>
			</div>
			<div class="center"
				style="box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 20px 15px; margin-top: 15px; min-height: 500px;">
				<table id="table_id" class="display">
					<thead>
						<tr>
							<th>Ảnh đại diện</th>
							<th>Tên</th>
							<th>Giới thiệu</th>
							<th>Ngày Tham gia</th>
							<?php if (isset($_SESSION['role']) && $_SESSION['role'] > 1) :?>
							<th>Xóa</th>
							<?php endif;?>
						</tr>
					</thead>
					<tbody>
					    	<?php foreach ($records as $record) :?>
					        <tr>
							<td><img style="width: 100px;"
								src="<?php echo avatarPath .$record['avatar']; ?>"></td>
							<td><a title="Xem thông tin chi tiết"
								href="../controller/profile.php?id=<?php echo $record['id'] ?>"><?php echo $record['firstname']." &nbsp".$record['lastname'] ?></a>
							</td>
							<td><?php echo $record['description'] ?></td>
							<td><?php echo $record['date'] ?></td>
							<?php if (isset($_SESSION['role']) && $_SESSION['role'] > $record['role']) :?>
								<td><button>
									<a style="font-size: 14px;"
										href="delete.php?id=<?php echo $record['id'] ?>">Xoá</a>
								</button></td>
							<?php endif;?>
						</tr>
							<?php endforeach;?>
					    </tbody>
				</table>

			</div>
		</div>
		<?php require '../view/footer.php'; ?>
	</div>

</body>
<script type="text/javascript" src="supportHome/jquery-3.1.1.js"></script>
<script type="text/javascript"
	src="supportHome/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="supportHome/jquery-ui.js"></script>
<script type="text/javascript" src="supportHome/slides.js"></script>
<script type="text/javascript">
$("#table_id").DataTable({
});
</script>
</html>