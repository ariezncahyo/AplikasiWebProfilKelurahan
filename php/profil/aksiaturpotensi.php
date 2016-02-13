<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

//cari potensi
if($menu=='aturpotensi' and $aksi=='caripotensi'){
	$filter=$_POST['filter'];
	$keyword=$_POST['keyword'];
	header('location:../../main.php?menu='.$menu.'&aksi=caripotensi&filter='.$filter.'&keyword='.$keyword);
}

//simpan potensi
if ($menu=='aturpotensi' and $aksi=='simpanpotensi'){
	$txtnama_potensi=$_POST['txtnama_potensi'];
	$txtpotensi=$_POST['txtberita'];
	$txtusername=$_POST['txtusername'];
	
	$sql_simpan="INSERT INTO potensi(id_potensi,nama_potensi,potensi_daerah,username,tgl_posting)
		VALUES ('','$txtnama_potensi','$txtpotensi','$txtusername','".date('Y-m-d')."')";
	$query_simpan=mysql_query($sql_simpan);            
	if($query_simpan){  if($query_simpan)
	header('location:../../main.php?menu='.$menu.'&pesan=Tambah potensi sukses!');
	exit();
	}
	else{
	header('location:../../main.php?menu='.$menu.'&pesan=Gagal tambah potensi!');
	exit();
	}
//}
}

//update potensi
if ($menu=='aturpotensi' and $aksi=='updatepotensi'){
	$txtidh		=$_POST['txtidh'];
	$txtnama_potensi	=$_POST['txtnama_potensi'];
	$txtpotensi	=$_POST['txtpotensi'];
	$txtusername=$_POST['txtusername'];

	// Perintah Update data
	$sql_ubah="UPDATE potensi SET 
				nama_potensi   ='$txtnama_potensi',
				potensi_daerah  ='$txtpotensi',
				username='$txtusername',
				tgl_posting='".date('Y-m-d')."' 
			  WHERE id_potensi='$txtidh'";
	$edit_query=mysql_query($sql_ubah);
	if($edit_query){
	header('location:../../main.php?menu='.$menu.'&pesan=Ubah potensi Sukses!');
	exit();
	}
	else{
	header('location:../../main.php?menu='.$menu.'&pesan=Gagal Ubah potensi!');
	exit();
	}
	
}

// Hapus potensi
if ($menu=='aturpotensi' AND $aksi=='hapuspotensi'){
  $delete_query=mysql_query("DELETE FROM potensi where id_potensi='$_GET[id]'");
  if($delete_query){
  header('location:../../main.php?menu='.$menu.'&pesan=Hapus potensi sukses!');
  exit();
  }
  else{
  header('location:../../main.php?menu='.$menu.'&pesan=Gagal Hapus potensi!');
  exit();
  }
}

?>