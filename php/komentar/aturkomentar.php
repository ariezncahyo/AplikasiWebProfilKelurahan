<?php
$dir="php/komentar/aksiaturkomentar.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<h1>Pengaturan Komentar</h1>
		".$_GET['pesan_kmntr']."
		<table class='data'>
			<form onSubmit='return check_search_komen();' name='cari' method='post' action='$dir?menu=aturkomentar&aksi=carikomentar'>
				<tr><th colspan='2'>Pencarian Multikategori</th></tr>
				<tr><td><input type='checkbox' id='pengirim_komen' name='pengirim_komen'>Pengirim</td><td><input type='text' id='txtpengirim_komen' name='txtpengirim_komen' /></td></tr>
				<tr><td><input type='checkbox' id='tanggal_komen' name='tanggal_komen'>Tanggal Kirim</td><td>");
							$qry_tgl_komen = "SELECT DISTINCT date_format(tanggal, '%D %M %Y') as tgl_komen FROM komentar";
							$hsl_tgl_komen = mysql_query($qry_tgl_komen);
							echo("<select id='txttanggal_komen' name='txttanggal_komen'>");
							while ($dt_tgl_komen = mysql_fetch_array($hsl_tgl_komen)){
								echo "<option value='".$dt_tgl_komen['tgl_komen']."'>".$dt_tgl_komen['tgl_komen']."</option>";
							}
					echo("</select>
					</td></tr>
				<tr><td colspan='2'><input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \></td></tr>
				<tr><td colspan='2'><div class='error' id='keyword_komen_kosong'>Kata kunci harus diisi!<br></div></td></tr>
			</form>
			<tr>
				<td colspan='2'><center><b>Daftar komentar</b></center></td>
			</tr>");
	
		include('php/paging.php');
		$sql_komen="SELECT * FROM komentar ORDER BY id_komentar desc limit $offset, $dataPerPage";
		$qry_komen=mysql_query($sql_komen) or die ("gagal menampilkan".mysql_error());
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($hsl_komen=mysql_fetch_array($qry_komen)) {
			$jdl_brt="select judul from news where id_news='$hsl_komen[id_news]'";
			$qry_brt=mysql_query($jdl_brt);
			$hsl_brt=mysql_fetch_array($qry_brt);
			
			$tgl=substr($hsl_komen['tanggal'],8,2);
			$bln=substr($hsl_komen['tanggal'],5,2);
			$thn=substr($hsl_komen['tanggal'],0,4);
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo("
			<tr><th>Dikirim Oleh</th><th>Komentar</th></tr>
			<tr bgcolor='".$warna."'>
			<td rowspan='2'>
			Nama : $hsl_komen[nama]<br />
			Email : $hsl_komen[email]<br />
			Url : $hsl_komen[url]<br />
			Berita : $hsl_brt[judul]<br />
			</td>
			<td>$hsl_komen[komentar]</td>
			</tr>
			<tr bgcolor='".$warna."'>
			<td>Dikirim: $tgl-$bln-$thn
			<a href=$dir?menu=aturkomentar&aksi=hapuskomentar&id=$hsl_komen[id_komentar]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturkomentar&aksi=editkomentar&id=$hsl_komen[id_komentar]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a>
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>
			");
			$counter++;
		}
		echo("</table>");
		include('php/linkpaging.php');
	break;
	
	case"carikomentar":
		echo("<h1>Pengaturan Komentar</h1>
		<table class='data'>
			<form onSubmit='return check_search_komen();' name='cari' method='post' action='$dir?menu=aturkomentar&aksi=carikomentar'>
				<tr><th colspan='2'>Pencarian Multikategori</th></tr>
				<tr><td><input type='checkbox' id='pengirim_komen' name='pengirim_komen'>Pengirim</td><td><input type='text' id='txtpengirim_komen' name='txtpengirim_komen'></td></tr>
				<tr><td><input type='checkbox' id='tanggal_komen' name='tanggal_komen'>Tanggal Kirim</td><td>");
							$qry_tgl_komen = "SELECT DISTINCT date_format(tanggal, '%D %M %Y') as tgl_komen FROM komentar";
							$hsl_tgl_komen = mysql_query($qry_tgl_komen);
							echo("<select name='txttanggal_komen'>");
							while ($dt_tgl_komen = mysql_fetch_array($hsl_tgl_komen)){
								echo "<option value='".$dt_tgl_komen['tgl_komen']."'>".$dt_tgl_komen['tgl_komen']."</option>";
							}
					echo("</select>
					</td></tr>
				<tr><td colspan='2'><input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \></td></tr>
				<tr><td colspan='2'><div class='error' id='keyword_komen_kosong'>Kata kunci harus diisi!<br></div></td></tr>
			</form>
			<tr>
				<td colspan='2'><center><b>Daftar komentar</b></center></td>
			</tr>");
		
		$bagianWhere=stripslashes($_GET['bagianWhere']);
		include('php/paging.php');
		$sql_komen="SELECT * FROM komentar where ".$bagianWhere." ORDER BY id_komentar desc limit $offset, $dataPerPage";
		if($qry_komen=mysql_query($sql_komen)){
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($hsl_komen=mysql_fetch_array($qry_komen)) {
			$tgl=substr($hsl_komen['tanggal'],8,2);
			$bln=substr($hsl_komen['tanggal'],5,2);
			$thn=substr($hsl_komen['tanggal'],0,4);
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo("
			<tr><th>Dikirim Oleh</th><th>Komentar</th></tr>
			<tr bgcolor='".$warna."'>
			<td rowspan='2'>
			Nama : $hsl_komen[nama]<br />
			Email : $hsl_komen[email]<br />
			Url : $hsl_komen[url]<br />
			</td>
			<td>$hsl_komen[komentar]</td>
			</tr>
			<tr bgcolor='".$warna."'>
			<td>Dikirim: $tgl-$bln-$thn
			<a href=$dir?menu=aturkomentar&aksi=hapuskomentar&id=$hsl_komen[id]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturkomentar&aksi=editkomentar&id=$hsl_komen[id_komentar]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a>
			</td>
			</tr>
			<tr><td colspan='2'><hr /></td></tr>
			");
			$counter++;
		}
		}else{
			echo("<tr><td colpsan='2'>Data Tidak Ditemukan!</td></tr>");
		}
		echo("</table>");
		echo("<a href=?menu=aturkomentar><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0'></a><br /><br />");
		include('php/linkpaging.php');
		echo("<br /><br />".$_GET['pesan_kmntr']);
	break;
	
	case"editkomentar":
		$sql_komen="SELECT * FROM komentar WHERE id_komentar='$_GET[id]'";
		$qry_komen=mysql_query($sql_komen) or die ("gagal menampilkan".mysql_error());
		$hsl_komen=mysql_fetch_array($qry_komen);
		$data_id	=$hsl_komen['id_komentar'];
		$data_nama = $hsl_komen['nama'];
		$data_email		=$hsl_komen['email'];
		$data_url	=$hsl_komen['url'];
		$data_komentar	=$hsl_komen['komentar'];
		$data_tanggal	=$hsl_komen['tanggal'];
		$tgl =substr("$data_tanggal",8,2);
		$bln =substr("$data_tanggal",5,2);
		$thn =substr("$data_tanggal",0,4);
		$jum_komen = $hsl_komen['jum_kome'];
		$id_berita = $hsl_komen['id_news'];
		
		$sql_berita="select judul from news where id_news='$id_berita'";
		$qry_berita=mysql_query($sql_berita);
		$hsl_berita=mysql_fetch_array($qry_berita);
		$jdl_berita=$hsl_berita['judul'];

		echo("<h1>Form Ubah Komentar</h1>
	<form method='post' action='$dir?menu=aturkomentar&aksi=updatekomentar'>
	<input type='hidden' name='id' value='$data_id' />
	<table>
	<tr><td>Nama Pengirim</td><td><input type='text' name='nama' value='$data_nama' /></td></tr>
	<tr><td>Email</td><td><input type='text' name='email' value='$data_email' /></td></tr>
	<tr><td>URL</td><td><input type='text' name='url' value='$data_url' /></td></tr> 
	<tr><td>Tanggal kirim</td><td>$tgl-$bln-$thn</td></tr>
	<tr><td>Judul Berita</td><td>$jdl_berita</td></tr>
	<tr><td colspan='2'><textarea id='txtpengumuman' name='komentar' style='height: 170px; width: 500px;'>$data_komentar
	</textarea>
	<script language='javascript1.2'>
		WYSIWYG.attach('txtpengumuman',full);
	</script></td></tr>
	</table>
	<input type='image' src='images/simpan.png' title='Update' alt='Update' width='30' height='30' \>&nbsp;&nbsp;
	<a href='?menu=aturkomentar'><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
	</form>");
	echo($_GET['pesan_kmntr']);
	break;
	}
?>