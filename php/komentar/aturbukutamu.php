<?php
$dir="php/bukutamu/aksiaturbukutamu.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<table>
			<tr><th colspan='2'>Pengaturan Bukutamu</th></tr>
			<tr>
				<td colspan='2'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?module=aturbukutamu&aksi=caribukutamu'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='pengirim'>Pengirim</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='submit' value='cari' />
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan='2'><b>Daftar Bukutamu</b></td>
			</tr>");
	
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
			<a href=$dir?module=aturbukutamu&aksi=hapusbukutamu&id=$hsl_bktm[id]>Hapus</a> |
					<a href=?module=aturbukutamu&aksi=editbukutamu&id=$hsl_bktm[id]>Ubah</a>
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>
			");
		}
		echo("</table>
		<a href=?module=aturbukutamu&aksi=tambahbukutamu><button type=button>Tambah bukutamu</button></a><br /><br />");
		include('php/linkpaging.php');
		echo($_GET['pesan']);
	break;
	
	case"caribukutamu";
	echo("<table>
			<tr><th colspan='2'>Pengaturan Bukutamu</th></tr>
			<tr>
				<td colspan='2'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?module=aturbukutamu&aksi=caribukutamu'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='pengirim'>Pengirim</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='submit' value='cari' />
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan='2'><b>Daftar Bukutamu</b></td>
			</tr>");
	
	$filter=$_GET['filter'];
	$keyword=$_GET['keyword'];
	include('php/paging.php');
	if ($filter=='pengirim')
	{	$sql_bktm="select * from guestbook where nama like '%$keyword%' order by id desc limit $offset, $dataPerPage";
	}
	$qry_bktm=mysql_query($sql_bktm) or die ("gagal menampilkan".mysql_error());
	while($hsl_bktm=mysql_fetch_array($qry_bktm)) {
  	$tgl=substr($hsl_bktm['tanggal'],8,2);
		$bln=substr($hsl_bktm['tanggal'],5,2);
		$thn=substr($hsl_bktm['tanggal'],0,4);
 
		echo("<tr><th>Dikirim Oleh</th><th>Komentar</th></tr>
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
			<a href=$dir?module=aturbukutamu&aksi=hapusbukutamu&id=$hsl_bktm[id]>Hapus</a> |
					<a href=?module=aturbukutamu&aksi=editbukutamu&id=$hsl_bktm[id]>Ubah</a>
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>");
  }
	echo("</table>
	<a href=?module=aturbukutamu>Tampilkan Semua</a><br /><br />
	<a href=?module=aturbukutamu&aksi=tambahbukutamu><button type=button>Tambah bukutamu</button></a><br /><br />");
	include('php/linkpaging.php');
	break;
	
	case"tambahbukutamu":
	echo("
	<h1>Buku Tamu</h1>
	<form method='post' action='$dir?module=aturbukutamu&aksi=simpanbukutamu'>
	<table>
	<tr><td>Nama Pengunjung</td><td><input type='text' name='nama'></td></tr>
	<tr><td>Email</td><td><input type='text' name='email'></td></tr>
	<tr><td>URL</td><td><input type='text' name='url' value='http://'></td></tr> 
	<tr><td>Komentar</td><td><textarea name='komentar'></textarea></td></tr>

	<tr><td>Masukkan Kode Verifikasi</td><td><img src='php/antispam/spam.php'></td></tr>
	<tr><td></td><td><input type='text' name='kode'></td></tr>

	<tr><td></td><td><input type='submit' name='submit' value='Submit'> <input type='reset' name='reset' value='Reset'></td></tr>
	</table>
	</form>");
	echo($_GET['pesan']);
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

		echo("
	<h1>Buku Tamu</h1>
	<form method='post' action='$dir?module=aturbukutamu&aksi=updatebukutamu'>
	<input type='hidden' name='id' value='$data_id' />
	<table>
	<tr><td>Nama Pengunjung</td><td><input type='text' name='nama' value='$data_nama' /></td></tr>
	<tr><td>Email</td><td><input type='text' name='email' value='$data_email' /></td></tr>
	<tr><td>URL</td><td><input type='text' name='url' value='$data_url' /></td></tr> 
	<tr><td>Komentar</td><td><textarea name='komentar'>$data_komentar</textarea></td></tr>
	<tr><td>Tanggal kirim</td><td>$tgl-$bln-$thn</td></tr>
	<tr><td></td><td><input type='submit' name='submit' value='Update'> <a href='?module=aturbukutamu'><button type='button'>Batal</button></a></td></tr>
	</table>
	</form>");
	echo($_GET['pesan']);
	break;
}
?>