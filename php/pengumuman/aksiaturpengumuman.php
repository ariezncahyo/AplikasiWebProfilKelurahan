<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

//cari pengumuman
if($menu=='aturpengumuman' and $aksi=='caripengumuman'){
	$filter=$_POST['filter'];
	$keyword=$_POST['keyword'];
	header('location:../../main.php?menu='.$menu.'&aksi=caripengumuman&filter='.$filter.'&keyword='.$keyword);
}

//simpan pengumuman
if ($menu=='aturpengumuman' and $aksi=='simpanpengumuman'){
	$txtjudul=$_POST['txtjudul'];
	$txtpengumuman=$_POST['txtpengumuman'];
	$txtpengirim=$_POST['txtpengirim'];
	$txtrating=$_POST['txtrating'];
	
	if($txtjudul=="" or $txtpengumuman=="" or $txtpengirim=="" or $txtrating=""){
		header('location:../../main.php?menu='.$menu.'&aksi=tambahpengumuman&pesan=Data Harus Diisi Semua!');
		exit();
	}
	
	$sql_simpan="INSERT INTO pengumuman(id_pengumuman,jdl_pengumuman,isi_pengumuman,pengirim,jml_baca,tgl_pengumuman)
		VALUES ('','$txtjudul','$txtpengumuman','$txtpengirim','$txtrating','".date('Y-m-d')."')";
	$query_simpan=mysql_query($sql_simpan);
	if($query_simpan){
		header('location:../../main.php?menu='.$menu.'&pesan=Tambah Pengumuman Berhasil!');
		exit();
	}
	else{
		header('location:../../main.php?menu='.$menu.'&pesan=Gagal Tambah Pengumuman!');
		exit();
	}
	
//}
}

//update pengumuman
if ($menu=='aturpengumuman' and $aksi=='updatepengumuman'){
	$txtidh		=$_POST['txtidh'];
	$txtjudul	=$_POST['txtjudul'];
	$txtpengumuman	=$_POST['txtpengumuman'];
	$txtpengirim=$_POST['txtpengirim'];
	$txtrating = $_POST['txtrating'];
	
	if($txtjudul=="" or $txtpengumuman=="" or $txtpengirim=="" or $txtrating=""){
		header('location:../../main.php?menu='.$menu.'&aksi=editpengumuman&id='.$txtidh.'&pesan=Data Harus Diisi Semua!');
		exit();
	}
	// Perintah Update data
	$sql_ubah="UPDATE pengumuman SET 
				jdl_pengumuman   ='$txtjudul',
				isi_pengumuman  ='$txtpengumuman',
				pengirim='$txtpengirim',
				jml_baca='$txtrating',
				tgl_pengumuman='".date('Y-m-d')."' 
			  WHERE id_pengumuman='$txtidh'";
	$query_ubah=mysql_query($sql_ubah);
	if($query_ubah){
		header('location:../../main.php?menu='.$menu.'&pesan=Update Pengumuman Berhasil!');
		exit();	
	}
	else{
		header('location:../../main.php?menu='.$menu.'&aksi=editpengumuman&id='.$txtidh.'&pesan=Update Pengumuman Berhasil!');
		exit();
	}
	
}

// Hapus pengumuman
if ($menu=='aturpengumuman' AND $aksi=='hapuspengumuman'){
  $query_delete=mysql_query("DELETE FROM pengumuman where id_pengumuman='$_GET[id]'");
  if($query_delete){
	header('location:../../main.php?menu='.$menu.'&pesan=Hapus Pengumuman Berhasil!');
	exit();
  }
  else{
	header('location:../../main.php?menu='.$menu.'&pesan=Gagal Hapus Pengumuman !');
	exit();
  }
  
}

?>