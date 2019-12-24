<?php
	$db_name = "test";
	$db_user = "admin";
	$db_pass = ":VrH}5dYJzN!-$*#";
	$db_host = "192.168.1.3";
	$baglanti = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Veritabanı bağlantı hatası!");
	$baglanti->query("SET NAMES utf8");
?>
