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

if ($status == "tak ada")
{
	if (strtoupper($kode) == $_SESSION['kodeRandom'])
	{
		$kueri = "INSERT INTO guestbook(nama, email, url, komentar, tanggal)
          VALUES('$nama', '$email', '$url', '$komentar', '$tanggal')";
		$hasil = mysql_query($kueri);

		if ($hasil) $pesan_bktm="Pengisian buku tamu sukses";
		else $pesan_bktm="Pengisian buku tamu gagal";
	}
	else $pesan_bktm="Anda salah memasukkan kode verifikasi";
}
else
{
   $pesan_bktm="Maaf komentar Anda mengandung kata-kata yang tidak sopan";
}
if(isset($_SESSION['username'])){
	header('location:../../main.php?menu=bukutamu&pesan_bktm='.$pesan_bktm);
	exit();}
else{
	header('location:../../index.php?menu=bukutamu&pesan_bktm='.$pesan_bktm);
	exit();
}
?>