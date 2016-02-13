<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];

//cari bukutamu
if($menu=='aturbukutamu' and $aksi=='caribukutamu'){
	$filter=$_POST['filter'];
	$keyword=$_POST['keyword'];
	header('location:../../main.php?menu='.$menu.'&aksi=caribukutamu&filter='.$filter.'&keyword='.$keyword);
}

//simpan bukutamu
if ($menu=='aturbukutamu' and $aksi=='simpanbukutamu'){
	
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

		if ($hasil){
		$pesan_bktm="Pengisian buku tamu sukses";
		}
		else 
		{ $pesan_bktm="Pengisian buku tamu gagal";
		}
	}
	else 
	{ $pesan_bktm="Anda salah memasukkan kode verifikasi";
	}
}
else
{
   $pesan_bktm="Maaf komentar Anda mengandung kata-kata yang tidak sopan";
}
		
	header('location:../../main.php?menu='.$menu.'&pesan_bktm='.$pesan_bktm);
	exit();
//}
}

//update berita
if ($menu=='aturbukutamu' and $aksi=='updatebukutamu'){
	
	$badWords = array("sex","xxx","viagra","http","porn");
	
	$id = $_POST['id'];
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
	// Perintah Update data
	$sql_ubah="UPDATE guestbook SET 
				nama   ='$nama',
				email  ='$email',
				url ='$url',
				komentar='$komentar',
				tanggal='$tanggal' 
			  WHERE id='$id'";
	$hasil_ubah = mysql_query($sql_ubah);
	if($hasil_ubah) $pesan_bktm="Updata data berhasil !";
	else $pesan_bktm="Updata data gagal !";
}
else $pesan_bktm="Maaf komentar Anda mengandung kata-kata yang tidak sopan !";

header('location:../../main.php?menu='.$menu.'&pesan_bktm='.$pesan_bktm);
exit();
}

// Hapus berita
if ($menu=='aturbukutamu' AND $aksi=='hapusbukutamu'){
  $query_delete=mysql_query("DELETE FROM guestbook where id='$_GET[id]'");
  if($query_delete){
	header('location:../../main.php?menu='.$menu.'&pesan_bktm=Hapus Bukutamu Berhasil!');
	exit();
  }
  else{
  header('location:../../main.php?menu='.$menu.'&pesan_bktm=Gagal Hapus Bukutamu !');
	exit();
  }	
}

?>