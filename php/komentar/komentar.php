<?php
echo("<table>
<tr>
				<td colspan='2'><b>Daftar Komentar</b></td>
			</tr>");
	
		include('php/paging.php');
		$sql="SELECT * FROM komentar WHERE id_news='$id_news' ORDER BY id_komentar desc limit $offset, $dataPerPage";
		$qry=mysql_query($sql) or die ("gagal menampilkan".mysql_error());
		while($hsl=mysql_fetch_array($qry)) {
			$tgl=substr($hsl['tanggal'],8,2);
			$bln=substr($hsl['tanggal'],5,2);
			$thn=substr($hsl['tanggal'],0,4); 
			echo("
			<tr><th>Dikirim Oleh</th><th>Komentar</th></tr>
			<tr>
			<td rowspan='2'>
			Nama : $hsl[nama]<br />
			Email : $hsl[email]<br />
			Url : $hsl[url]<br />
			</td>
			<td>$hsl[komentar]</td>
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
<h1>Komentar</h1>

<form method="post" action="php/komentar/simpan.php">
<input type='hidden' name='id_news' value='<?php echo($id_news); ?>' />
<table>
<tr><td>Nama Pengunjung</td><td><input type="text" name="nama"></td></tr>
<tr><td>Email</td><td><input type="text" name="email"></td></tr>
<tr><td>URL</td><td><input type="text" name="url" value="http://"></td></tr> 
<tr><td>Komentar</td><td><textarea name="komentar"></textarea></td></tr>

<tr><td>Masukkan Kode Verifikasi</td><td><img src="php/antispam/spam.php"></td></tr>
<tr><td></td><td><input type="text" name="kode"></td></tr>

<tr><td></td><td><input type='image' src='images/simpan.png' title='Submit' alt='Submit' width='30' height='30' \> &nbsp; &nbsp;<input type='image' src='images/delete.png' title='Reset' alt='Reset' width='30' height='30' \></td></tr>
</table>
<?php
	echo($_GET['pesan_kmntr']);
?>
</form>