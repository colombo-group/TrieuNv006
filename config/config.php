<?php
	session_start();
	$kn = mysql_connect('localhost', 'colombo', '123456');
	mysql_select_db('bai_6');
	define('avatarPath','../../src/avatar/');
?>