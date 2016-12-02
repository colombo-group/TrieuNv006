<?php
	session_start();
	$kn = mysql_connect('localhost', 'root', '');
	mysql_select_db('bai_6');
	define('avatarPath','../../src/avatar/');
?>