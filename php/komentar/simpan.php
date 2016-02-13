<?php
session_start();
include("../connect.php");
$menu=$_GET['menu'];

$badWords = array("sex","xxx","viagra","http","porn");

$nama = strip_tags($_POST['nama']);
$email = strip_tags($_POST['email']);
$url = strip_tags($_POST['url']);
$komentar = strip_tags($_POST['komentar']);
$kode = $_POST['kode'];
$tanggal = date("Y-m-d");
$id_news = $_POST['id_news'];

$status = "tak ada";

for($i = 0; $i <= count($badWords)-1; $i++)
{
   if (!(strpos($komentar, $badWords[$i]) == false))
   {
      // jika ditemukan sebuah bad word dalam komentar, maka status menjadi 'ada'
      // proses looping langsung dihentikan
 
      $status = "ada";
      break;
   }
}

if($nama=="" or $email=="" or $komentar=="" or $kode==""){
	$pesan_kmntr="Data Harus Diisi!";
}
else{
if ($status == "tak ada")
{
	if (strtoupper($kode) == $_SESSION['kodeRandom'])
	{
		$kueri = "INSERT INTO komentar(nama, email, url, komentar, tanggal, id_news)
          VALUES('$nama', '$email', '$url', '$komentar', '$tanggal', '$id_news')";
		$hasil = mysql_query($kueri);

		if ($hasil) $pesan_kmntr="Pengisian komentar sukses";
		else $pesan_kmntr="Pengisian komentar gagal";
	}
	else $pesan_kmntr="Anda salah memasukkan kode verifikasi";
}
else
{
   $pesan_kmntr="Maaf komentar Anda mengandung kata-kata yang tidak sopan";
}
}
if (isset($_SESSION['username'])){
	header('location:../../main.php?menu=berita&aksi=detail&id='.$id_news.'&pesan_kmntr='.$pesan_kmntr);
}
elseif (!isset($_SESSION['username'])){
	header('location:../../index.php?menu=berita&aksi=detail&id='.$id_news.'&pesan_kmntr='.$pesan_kmntr);
}	
exit;
?>