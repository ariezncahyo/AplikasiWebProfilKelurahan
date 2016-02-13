<?php
session_start();
include "../connect.php";

$menu=$_GET[menu];
$aksi=$_GET[aksi];
//cari komentar
if($menu=='aturkomentar' and $aksi=='carikomentar'){
	$bagianWhere = "";
	if (isset($_POST['pengirim_komen']) and isset($_POST['txtpengirim_komen'])){
		$txtpengirim_komen = $_POST['txtpengirim_komen'];
		if (empty($bagianWhere))
   {
        $bagianWhere .= "nama LIKE '$txtpengirim_komen'";
   }
	}
 
	if (isset($_POST['tanggal_komen']) and isset($_POST['txttanggal_komen'])){
		$txttanggal_komen = $_POST['txttanggal_komen'];
		if (empty($bagianWhere)){
        $bagianWhere .= "date_format(tanggal, '%D %M %Y') = '$txttanggal_komen'";
		}
   else{
        $bagianWhere .= " AND date_format(tanggal, '%D %M %Y') = '$txttanggal_komen'";
   }
	}
	header('location:../../main.php?menu='.$menu.'&aksi=carikomentar&bagianWhere='.$bagianWhere);
}

if ($menu=='aturkomentar' and $aksi=='updatekomentar'){
	
	$badWords = array("sex","xxx","viagra","http","porn");
	
	$id = $_POST['id'];
	$nama = strip_tags($_POST['nama']);
	$email = strip_tags($_POST['email']);
	$url = strip_tags($_POST['url']);
	$komentar = strip_tags($_POST['komentar']);
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
	$sql_ubah="UPDATE komentar SET 
				nama   ='$nama',
				email  ='$email',
				url ='$url',
				komentar='$komentar',
				tanggal='$tanggal' 
			  WHERE id_komentar='$id'";
	$hasil_ubah = mysql_query($sql_ubah);
	if($hasil_ubah) 
	{ $pesan_kmntr="Updata data berhasil !";
	}
	else{ 
	$pesan_kmntr="Updata data gagal !";
	}
}
else {
$pesan_kmntr="Maaf komentar Anda mengandung kata-kata yang tidak sopan !";
}

header('location:../../main.php?menu='.$menu.'&pesan_kmntr='.$pesan_kmntr);
exit();
}

if ($menu=='aturkomentar' AND $aksi=='hapuskomentar'){
  $query_hapus=mysql_query("DELETE FROM komentar where id_komentar='$_GET[id]'");
  if($query_hapus){
	header('location:../../main.php?menu='.$menu.'&pesan_kmntr=Hapus Komentar Berhasil !');
	exit();
  }
  else{
  header('location:../../main.php?menu='.$menu.'&pesan_kmntr=Gagal Hapus Komentar !');
  exit();
  }
}

?>