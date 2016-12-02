<?php
	session_start();
	$kn = mysql_connect('localhost', 'colombo', '');
	mysql_select_db('bai_6');
	define('avatarPath','../../src/avatar/');
?>