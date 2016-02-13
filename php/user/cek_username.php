<?php
	$module=$_GET['module'];
	$cek=mysql_query("select username from user");
	$hasil_cek=mysql_fetch_array($cek);
	if($_POST['username']==$hasil_cek['username']){
		header('location:../../main.php?module='.$module.'&pesan=username sudah ada, proses gagal!');
	}
?>