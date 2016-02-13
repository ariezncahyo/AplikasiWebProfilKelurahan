<?php
$dir="php/bukutamu/aksiaturbukutamu.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<h1>Pengaturan Bukutamu</h1>
		".$_GET['pesan_bktm']."
		<table class='data'>
			<tr>
				<td colspan='2'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturbukutamu&aksi=caribukutamu'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='pengirim'>Pengirim</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan='2'><center><b>Daftar Bukutamu</b></center></td>
			</tr>");
	
		include('php/paging.php');
		$sql_bktm="SELECT * FROM guestbook ORDER BY id desc limit $offset, $dataPerPage";
		$qry_bktm=mysql_query($sql_bktm) or die ("gagal menampilkan".mysql_error());
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($hsl_bktm=mysql_fetch_array($qry_bktm)) {
			$tgl=substr($hsl_bktm['tanggal'],8,2);
			$bln=substr($hsl_bktm['tanggal'],5,2);
			$thn=substr($hsl_bktm['tanggal'],0,4);
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo ("<tr>
			<th>Dikirim Oleh</th><th>Komentar</th></tr>
			<tr bgcolor='".$warna."'>
			<td rowspan='2'>
			Nama : $hsl_bktm[nama]<br />
			Email : $hsl_bktm[email]<br />
			Url : $hsl_bktm[url]<br />
			</td>
			<td>$hsl_bktm[komentar]</td>
			</tr>
			<tr bgcolor='".$warna."'>
			<td>Dikirim: $tgl-$bln-$thn
			<a href=$dir?menu=aturbukutamu&aksi=hapusbukutamu&id=$hsl_bktm[id]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturbukutamu&aksi=editbukutamu&id=$hsl_bktm[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a>
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>
			");
			$counter++;
		}
		echo("</table>
		<a href=?menu=aturbukutamu&aksi=tambahbukutamu><img src='images/tambah.png' title='Tambah Bukutamu' alt='Tambah Bukutamu' width='30' height='30' border='0' /></a><br /><br />");
		include('php/linkpaging.php');
	break;
	
	case"caribukutamu";
	echo("<h1>Pengaturan Bukutamu</h1>");
	$filter=$_GET['filter'];
	$keyword=$_GET['keyword'];
	include('php/paging.php');
	if ($filter=='pengirim')
	{	$sql_bktm="select * from guestbook where nama like '%$keyword%' order by id desc limit $offset, $dataPerPage";
	}
	$qry_bktm=mysql_query($sql_bktm) or die ("gagal menampilkan".mysql_error());
	$row=mysql_num_rows($qry_bktm);
	echo("
	".$_GET['pesan_bktm']."
	<table class='data'>
			<tr>
				<td colspan='2'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturbukutamu&aksi=caribukutamu'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='pengirim'>Pengirim</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>");
			if($row > 0){
			echo("
			<tr>
				<td colspan='2'><center><b>Daftar Bukutamu</b></center></td>
			</tr>");
	
	
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
	$counter = 1;
	while($hsl_bktm=mysql_fetch_array($qry_bktm)) {
  	$tgl=substr($hsl_bktm['tanggal'],8,2);
		$bln=substr($hsl_bktm['tanggal'],5,2);
		$thn=substr($hsl_bktm['tanggal'],0,4);
		if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo ("<tr>
			<th>Dikirim Oleh</th><th>Komentar</th></tr>
			<tr bgcolor='".$warna."'>
			<td rowspan='2'>
			Nama : $hsl_bktm[nama]<br />
			Email : $hsl_bktm[email]<br />
			Url : $hsl_bktm[url]<br />
			</td>
			<td>$hsl_bktm[komentar]</td>
			</tr>
			<tr bgcolor='".$warna."'>
			<td>Dikirim: $tgl-$bln-$thn
			<a href=$dir?menu=aturbukutamu&aksi=hapusbukutamu&id=$hsl_bktm[id]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturbukutamu&aksi=editbukutamu&id=$hsl_bktm[id]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a>
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>");
			$counter++;
  }
	echo("</table>
	<a href=?menu=aturbukutamu&aksi=tambahbukutamu><img src='images/tambah.png' title='Tambah Bukutamu' alt='Tambah Bukutamu' width='30' height='30' border='0' /></a>
	&nbsp;&nbsp;<a href=?menu=aturbukutamu><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0'></a><br /><br />");
	include('php/linkpaging.php');
	}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
	break;
	
	case"tambahbukutamu":
	echo("<h1>Form Tambah Buku Tamu</h1>
	".$_GET['pesan_bktm']."
	<form method='post' action='$dir?menu=aturbukutamu&aksi=simpanbukutamu'>
	<table>
	<tr><td>Nama Pengunjung</td><td><input type='text' name='nama'></td></tr>
	<tr><td>Email</td><td><input type='text' name='email'></td></tr>
	<tr><td>URL</td><td><input type='text' name='url' value='http://'></td></tr> 
	<tr><td>Komentar</td><td><textarea name='komentar'></textarea></td></tr>

	<tr><td>Masukkan Kode Verifikasi</td><td><img src='php/antispam/spam.php'></td></tr>
	<tr><td></td><td><input type='text' name='kode'></td></tr>
  </table>
	<input type='image' src='images/simpan.png' title='Simpan' alt='Simpan' width='30' height='30' \>&nbsp;&nbsp;
	<a href=?menu=aturbukutamu><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
	</form>");
	break;
	
	case"editbukutamu":
		$sql_bktm="SELECT * FROM guestbook WHERE id='$_GET[id]'";
		$qry_bktm=mysql_query($sql_bktm) or die ("gagal menampilkan".mysql_error());
		$hsl_bktm=mysql_fetch_array($qry_bktm);
		$data_id	=$hsl_bktm['id'];
		$data_nama = $hsl_bktm['nama'];
		$data_email		=$hsl_bktm['email'];
		$data_url	=$hsl_bktm['url'];
		$data_komentar	=$hsl_bktm['komentar'];
		$data_tanggal	=$hsl_bktm['tanggal'];
		$tgl =substr("$data_tanggal",8,2);
		$bln =substr("$data_tanggal",5,2);
		$thn =substr("$data_tanggal",0,4);

		echo("<h1>Form Ubah Buku Tamu</h1>
		".$_GET['pesan_bktm']."
	<form method='post' action='$dir?menu=aturbukutamu&aksi=updatebukutamu'>
	<input type='hidden' name='id' value='$data_id' />
	<table>
	<tr><td>Nama Pengunjung</td><td><input type='text' name='nama' value='$data_nama' /></td></tr>
	<tr><td>Email</td><td><input type='text' name='email' value='$data_email' /></td></tr>
	<tr><td>URL</td><td><input type='text' name='url' value='$data_url' /></td></tr> 
	<tr><td>Komentar</td><td><textarea name='komentar' cols='30' rows='10'>$data_komentar</textarea></td></tr>
	<tr><td>Tanggal kirim</td><td>$tgl-$bln-$thn</td></tr>
	</table>
	<input type='image' src='images/simpan.png' title='Update' alt='Update' width='30' height='30' \>&nbsp;&nbsp;
	<a href='?menu=aturbukutamu'><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
	</form>");
	break;
}
?>