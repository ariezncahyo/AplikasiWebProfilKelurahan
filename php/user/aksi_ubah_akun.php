<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];


// Update user
if ($menu=='ubahakun' AND $aksi=='update'){
	if(($_POST['username']=="") or ($_POST['nama_lengkap']=="")){
		header('location:../../main.php?menu='.$menu.'&aksi=ubahuser_akun&id='.$_POST['id'].'&pesan=Semua Data Harus Diisi!');
		exit();
	}
	$query_update=("UPDATE user SET username       = '$_POST[username]',
                                  nama_lengkap   = '$_POST[nama_lengkap]'
                           WHERE  username       = '$_SESSION[username]'");
	$user_update=mysql_query($query_update);	
	if($user_update){
		header('location:../../main.php?menu='.$menu.'&pesan=Update berhasil dilakukan!');
		exit();
	}	
  else{
		header('location:../../main.php?menu='.$menu.'&aksi=ubahuser_akun&id='.$_POST['id'].'&pesan=Username sudah ada, update gagal!');
		exit();
	}
}
// update password
elseif($menu='ubahakun' AND $aksi=='updatepass'){
	$passlama=md5($_POST['passlama']);
	$passbaru=md5($_POST['passbaru']);
	if(($_POST['passlama']=="") or ($_POST['passbaru']=="") or ($_POST['confirm_passbaru']=="")){
		header('location:../../main.php?menu='.$menu.'&aksi=ubahpass_akun&id='.$_POST['id'].'&pesan=Data Harus Diisi Semua!');
		exit();
	}
	if($passlama==$_POST['lama']){
		if($_POST['passbaru']==$_POST['confirm_passbaru']){
			mysql_query("UPDATE user SET password='$passbaru' where username='$_SESSION[username]'");
			header("location:../../main.php?menu=".$menu."&pesan=password berhasil di update");
			exit();	
		}
		else{
		header('location:../../main.php?menu='.$menu.'&aksi=ubahpass_akun&id='.$_POST['id'].'&pesan=konfirmasi password salah, update password gagal');
		exit();
		}
	}
	else{
		header('location:../../main.php?menu='.$menu.'&aksi=ubahpass_akun&id='.$_POST['id'].'&pesan=password lama yang anda masukan salah!');
		exit();
	}
}
?>
