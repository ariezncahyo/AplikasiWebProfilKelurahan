<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

//cari pengumuman
if($menu=='pengumuman' and $aksi=='caripengumuman'){
$filter=$_POST['filter'];
$keyword=$_POST['keyword'];

if(isset($_SESSION['username'])){
	header('location:../../main.php?menu='.$menu.'&aksi=caripengumuman&filter='.$filter.'&keyword='.$keyword);
}
elseif(!isset($_SESSION['username'])){
	header('location:../../index.php?menu='.$menu.'&aksi=caripengumuman&filter='.$filter.'&keyword='.$keyword);
}
}
?>