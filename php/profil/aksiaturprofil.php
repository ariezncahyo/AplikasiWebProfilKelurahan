<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

//update profil
if ($menu=='aturprofil' and $aksi=='updateprofil'){
	$txtidh		=$_POST['txtidh'];
	$txtjudul	=$_POST['txtjudul'];
	$txtprofil	=$_POST['txtprofil'];

	// Perintah Update data
	$sql_ubah="UPDATE profil SET 
				nama_profil   ='$txtjudul',
				isi_profil  ='$txtprofil'
			  WHERE id_profil='$txtidh'";
	$edit_query=mysql_query($sql_ubah);
	if($edit_query){
	header('location:../../main.php?menu='.$menu.'&pesan=Ubah profil Sukses!');
	exit();
	}
	else{
	header('location:../../main.php?menu='.$menu.'&pesan=Gagal Ubah profil!');
	exit();
	}
	
}


?>