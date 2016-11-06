<?php
function uploadAvatar($userName) {
	if ($_FILES ['file'] ['name'] != NULL) {
		// check upload file
		if ($_FILES ['file'] ['type'] == "image/jpeg" || $_FILES ['file'] ['type'] == "image/png" || $_FILES ['file'] ['type'] == "image/gif") {
			
			if ($_FILES ['file'] ['size'] > 1048576) {
				echo "File không được lớn hơn 1mb";
			} else {
				
				$tmp_name = $_FILES ['file'] ['tmp_name'];
				echo $name = $_FILES ['file'] ['name'];
				echo $type = $_FILES ['file'] ['type'];
				echo $size = $_FILES ['file'] ['size'];
				// Upload file
				$name = $userName . ".jpg";
				move_uploaded_file ( $tmp_name, avatarPath . $name );
				
				if (mysql_query ( "UPDATE users SET avatar='$name' WHERE users.user = '$userName'" )) {
				} else {
					echo "<script>
						    alert('Đã xảy ra sự cố');
						</script>";
				}
			}
		} else {
			// không phải file ảnh
			echo "Kiểu file không hợp lệ (jpg, png, jpeg";
		}
	}
}
?>