<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

//cari berita
if($menu=='aturberita' and $aksi=='cariberita'){
	$filter=$_POST['filter'];
	$keyword=$_POST['keyword'];
	header('location:../../main.php?menu='.$menu.'&aksi=cariberita&filter='.$filter.'&keyword='.$keyword);
}

//simpan berita
if ($menu=='aturberita' and $aksi=='simpanberita'){
	$txtjudul=$_POST['txtjudul'];
	$txtberita=$_POST['txtberita'];
	$txtpengirim=$_POST['txtpengirim'];
	$txtrating=$_POST['txtrating'];
	
	$sql_simpan="INSERT INTO news(id_news,judul,berita,pengirim,dibaca,date)
		VALUES ('','$txtjudul','$txtberita','$txtpengirim','$txtrating','".date('Y-m-d')."')";
	$query_simpan=mysql_query($sql_simpan);            
	if($query_simpan){  if($query_simpan)
	header('location:../../main.php?menu='.$menu.'&pesan=Tambah berita sukses!');
	exit();
	}
	else{
	header('location:../../main.php?menu='.$menu.'&pesan=Gagal tambah berita!');
	exit();
	}
//}
}

//update berita
if ($menu=='aturberita' and $aksi=='updateberita'){
	$txtidh		=$_POST['txtidh'];
	$txtjudul	=$_POST['txtjudul'];
	$txtberita	=$_POST['txtberita'];
	$txtpengirim=$_POST['txtpengirim'];
	$txtrating = $_POST['txtrating'];

	// Perintah Update data
	$sql_ubah="UPDATE news SET 
				judul   ='$txtjudul',
				berita  ='$txtberita',
				pengirim='$txtpengirim',
				dibaca='$txtrating',
				date='".date('Y-m-d')."' 
			  WHERE id_news='$txtidh'";
	$edit_query=mysql_query($sql_ubah);
	if($edit_query){
	header('location:../../main.php?menu='.$menu.'&pesan=Ubah Berita Sukses!');
	exit();
	}
	else{
	header('location:../../main.php?menu='.$menu.'&pesan=Gagal Ubah Berita!');
	exit();
	}
	
}

// Hapus berita
if ($menu=='aturberita' AND $aksi=='hapusberita'){
  $delete_query=mysql_query("DELETE FROM news where id_news='$_GET[id]'");
  if($delete_query){
  header('location:../../main.php?menu='.$menu.'&pesan=Hapus Berita sukses!');
  exit();
  }
  else{
  header('location:../../main.php?menu='.$menu.'&pesan=Gagal Hapus Berita!');
  exit();
  }
}

?>