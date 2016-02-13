<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

if($menu=='user' AND $aksi=='cariuser'){
	$filter=$_POST['filter'];
	$keyword=$_POST['keyword'];
	header('location:../../main.php?menu='.$menu.'&aksi=cariuser&filter='.$filter.'&keyword='.$keyword);
}

// Hapus user
if ($menu=='user' AND $aksi=='hapus'){
  $user_delete=mysql_query("DELETE FROM user WHERE username='$_GET[id]'");
	if($user_delete){
  header('location:../../main.php?menu='.$menu.'&pesan=hapus pengguna sukses!');
	}
}

// Input user
elseif ($menu=='user' AND $aksi=='input'){
	$password=md5($_POST['txtpassword']);
  $user_input=mysql_query("INSERT INTO user(username,
                                 password,
                                 nama_lengkap, level) 
	                       VALUES('$_POST[txtusername]',
                                '$password',
                                '$_POST[txtnama_lengkap]','admin')");
	if($user_input){
  header('location:../../main.php?menu='.$menu.'&pesan=Tambah user sukses!');
	}
	else{
	header('location:../../main.php?menu='.$menu.'&aksi=tambahuser&pesan=Username sudah ada, tambah user gagal!');
	}
}


// Update user
elseif ($menu=='user' AND $aksi=='update'){
	if($_POST['username']=="" or $_POST['nama_lengkap']=="" or $_POST['level']=="" or $_POST['blokir']=="" or $_POST['email']=="" or $_POST['alamat']=="" or $_POST['telp']==""){
			header('location:../../main.php?menu='.$menu.'&aksi=edituser&id='.$_POST['id'].'&pesan=Data Harus Diisi Semua!');
			exit();
	}
	else{
	$query_update=("UPDATE user SET username       = '$_POST[username]',
                                  nama_lengkap   = '$_POST[nama_lengkap]'
                           WHERE  username       = '$_POST[id]'");
	$user_update=mysql_query($query_update);	
	if($user_update){
		header('location:../../main.php?menu='.$menu.'&pesan=Update berhasil dilakukan!');
	}	
  else{
		header('location:../../main.php?menu='.$menu.'&aksi=edituser&id='.$_POST['id'].'&pesan=Username sudah ada, update gagal!');
	}
}
}
// update password
elseif($menu='user' AND $aksi=='updatepass'){
	$passlama=md5($_POST['passlama']);
	$passbaru=md5($_POST['passbaru']);
	if($passlama==$_POST['lama']){
		if($_POST['passbaru']==$_POST['confirm_passbaru']){
			mysql_query("UPDATE user SET password='$passbaru' where username='$_POST[id]'");
			header("location:../../main.php?menu=".$menu."&pesan=password sudah di update"); 
		}
		else{
		header('location:../../main.php?menu='.$menu.'&aksi=editpass&id='.$_POST['id'].'&pesan=konfirmasi password salah, update password gagal');
		}
	}
	else{
		header('location:../../main.php?menu='.$menu.'&aksi=editpass&id='.$_POST['id'].'&pesan=password lama yang anda masukan salah!');
	}
}
?>
