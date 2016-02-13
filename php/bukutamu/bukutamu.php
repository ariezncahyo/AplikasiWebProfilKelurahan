<?php
echo("<h1>Bukutamu</h1>
		<table>");
include('php/paging.php');
		$sql_bktm="SELECT * FROM guestbook ORDER BY id desc limit $offset, $dataPerPage";
		$qry_bktm=mysql_query($sql_bktm) or die ("gagal menampilkan".mysql_error());
		while($hsl_bktm=mysql_fetch_array($qry_bktm)) {
			$tgl=substr($hsl_bktm['tanggal'],8,2);
			$bln=substr($hsl_bktm['tanggal'],5,2);
			$thn=substr($hsl_bktm['tanggal'],0,4);
			
			echo("
			<tr><th>Dikirim Oleh</th><th>Komentar</th></tr>
			<tr>
			<td rowspan='2'>
			Nama : $hsl_bktm[nama]<br />
			Email : $hsl_bktm[email]<br />
			Url : $hsl_bktm[url]<br />
			</td>
			<td>$hsl_bktm[komentar]</td>
			</tr>
			<tr>
			<td>Dikirim: $tgl-$bln-$thn
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>
			");
		}
		echo("</table>");
		include('php/linkpaging.php');
?>

<h1>Isi Bukutamu</h1>
<form method="post" action="php/bukutamu/simpan.php">
<table>
<tr><td>Nama Pengunjung</td><td><input type="text" name="nama"></td></tr>
<tr><td>Email</td><td><input type="text" name="email"></td></tr>
<tr><td>URL</td><td><input type="text" name="url" value="http://"></td></tr> 
<tr><td>Komentar</td><td><textarea name="komentar"></textarea></td></tr>

<tr><td>Masukkan Kode Verifikasi</td><td><img src="php/antispam/spam.php"></td></tr>
<tr><td></td><td><input type="text" name="kode"></td></tr>

<tr><td></td><td><input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset"></td></tr>
</table>
<?php
	echo($_GET['pesan_bktm']);
?>
</form>