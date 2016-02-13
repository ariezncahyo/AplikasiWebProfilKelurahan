<?php
$dir="php/pengumuman/aksiaturpengumuman.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<h1>Pengaturan Pengumuman</h1>
		<span class='pesan'>".$_GET['pesan']."</span>
		<table class='data'>
			<tr>
				<td colspan='4'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturpengumuman&aksi=caripengumuman'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='judul'>Judul</option>
						<option value='pengirim'>Pengirim</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus di isi!<br></div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan='4'><center><b>&raquo; &raquo; &raquo;&nbsp; D A F T A R&nbsp;&nbsp;&nbsp;P E N G U M U M A N &nbsp;&laquo; &laquo; &laquo; </b></font></center></td>
			</tr>
			<tr>
				<th>TGL KIRIM</th>
				<th>JUDUL PENGUMUMAN</th>
				<th>PENGIRIM</th>
				<th>PROSES</th>
			</tr>");
	
		include('php/paging.php');
		$sql="SELECT id_pengumuman,jdl_pengumuman,tgl_pengumuman, pengirim FROM pengumuman ORDER BY id_pengumuman DESC limit $offset, $dataPerPage";
		$qry=mysql_query($sql) or die ("gagal menampilkan".mysql_error());
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($hsl=mysql_fetch_array($qry)) {
			$tgl=substr($hsl['tgl_pengumuman'],8,2);
			$bln=substr($hsl['tgl_pengumuman'],5,2);
			$thn=substr($hsl['tgl_pengumuman'],0,4);
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo("<tr bgcolor='".$warna."'>
			<td>$tgl-$bln-$thn</td>
			<td>$hsl[jdl_pengumuman]</td>
			<td>$hsl[pengirim]</td>
			<td width='80'><center><a href=$dir?menu=aturpengumuman&aksi=hapuspengumuman&id=$hsl[id_pengumuman]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturpengumuman&aksi=editpengumuman&id=$hsl[id_pengumuman]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturpengumuman&aksi=previewpengumuman&id=$hsl[id_pengumuman]><img src='images/detail.png' title='Detail' alt='Detail' width='14' height='14'></a></center>
			</td>
			</tr>");
			$counter++;
		}
	echo("</table>");
	include('php/linkpaging.php');
	echo ("<center><a href=?menu=aturpengumuman&aksi=tambahpengumuman><input class='pengumuman' type='submit' value='' /></a></center>");
	break;
	
	case"caripengumuman";
	echo("<h1>Pengaturan pengumuman</h1>");
	$filter=$_GET['filter'];
	$keyword=$_GET['keyword'];
	include('php/paging.php');
	if ($filter=='judul')
	{	$sql="select id_pengumuman,jdl_pengumuman,tgl_pengumuman,pengirim from pengumuman where jdl_pengumuman like '%$keyword%' order by id_pengumuman DESC limit $offset, $dataPerPage";
	}
	elseif ($filter=='pengirim')
	{	$sql="select id_pengumuman,jdl_pengumuman,tgl_pengumuman,pengirim from pengumuman where pengirim like '%$keyword%' order by id_pengumuman DESC limit $offset, $dataPerPage";
	}
	$qry=mysql_query($sql) or die ("gagal menampilkan".mysql_error());
	$row=mysql_num_rows($qry);
	echo("
	<span class='pesan'>".$_GET['pesan']."</span>
	<table class='data'>
		<tr>
			<td colspan='4'>
				<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturpengumuman&aksi=caripengumuman'>
				<b>Pencarian : </b>
				<select name='filter'>
					<option value='judul'>Judul</option>
					<option value='pengirim'>Pengirim</option>
				</select>
				<input type='text' id='keyword' name='keyword' />
				<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
				<br /><div class='error' id='keyword_kosong'>Kata kunci harus di isi!<br></div>
				</form>
			</td>
		</tr>");
			if($row > 0){
			echo("
		<tr>
			<td colspan='4'><center><b><font color='red'>Daftar Hasil Pencarian</font></b></center></td>
		</tr>
		<tr>
			<th>TGL KIRIM</th>
				<th>JUDUL PENGUMUMAN</th>
				<th>PENGIRIM</th>
				<th><b>AKSI</th>
		</tr>");
	
	
	$warnaGenap = "#d3e4f0";   // warna tua
    $warnaGanjil = "#eaf3f9";  // warna muda
	$counter = 1;
	while($hsl=mysql_fetch_array($qry)) {
  	$tgl=substr($hsl['tgl_pengumuman'],8,2);
		$bln=substr($hsl['tgl_pengumuman'],5,2);
		$thn=substr($hsl['tgl_pengumuman'],0,4);
		if ($counter % 2 == 0) $warna = $warnaGenap;
				else $warna = $warnaGanjil;
				echo("<tr bgcolor='".$warna."'>
			<td>$tgl-$bln-$thn</td>
			<td>$hsl[jdl_pengumuman]</td>
			<td>$hsl[pengirim]</td>
			<td width='80'><center><a href=$dir?menu=aturpengumuman&aksi=hapuspengumuman&id=$hsl[id_pengumuman]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturpengumuman&aksi=editpengumuman&id=$hsl[id_pengumuman]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturpengumuman&aksi=previewpengumuman&id=$hsl[id_pengumuman]><img src='images/detail.png' title='Detail' alt='Detail' width='14' height='14'></a></center>
			</td>
		</tr>");
		$counter++;
  }
	echo("</table>
	<a href=?menu=aturpengumuman&aksi=tambahpengumuman><img src='images/tambah.png' title='Tambah Pengumuman' alt='Tambah Pengumuman' width='30' height='30' border='0' /></a>
	&nbsp;&nbsp;<a href=?menu=aturpengumuman><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0' /></a><br /><br />");
	include('php/linkpaging.php');
	}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
	break;
	
	case"tambahpengumuman":
	echo("<h1>Form Tambah Pengumuman</h1>
	<span class='pesan'>".$_GET['pesan']."</span>
	<form onSubmit='return checkpengumuman();' name='tmbh_pengumuman' method='post' action='$dir?menu=aturpengumuman&aksi=simpanpengumuman'>
	<table>
    <tr> 
      <td>Judul pengumuman </td>
      <td>: <input name='txtjudul' type='text' size='50' maxlength='100'>
				<br /><div class='error' name='judulkosong'>Judul harus di isi!<br></div>
			</td>
    </tr>
		<tr> 
      <td>Pengirim</td>
      <td>: 
        <input name='txtpengirim' type='text' size='40' maxlength='60'>
				<br /><div class='error' name='pengirimkosong'>Pengirim harus di isi!<br></div>
			</td>
    </tr>
		<tr>
			<td>Rating Baca</td>
			<td>: <input type='text' name='txtrating' value='0' readonly />
				<br /><div class='error' name='ratingkosong'>Rating harus di isi!<br></div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>");
			//include ('editor.php');
			echo("
			</td>
		</tr>
	</table>");
	include ('editor.php');
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/><a href=?menu=aturpengumuman><input class='btl' name='Keluar' type='reset' id='Keluar2' value='' tabindex='4' onClick='keluar()' /></a></form>");
	break;
	
	case"editpengumuman":
		$sql="SELECT * FROM pengumuman WHERE id_pengumuman='$_GET[id]'";
		$qry=mysql_query($sql) or die ("gagal menampilkan".mysql_error());
		$hsl=mysql_fetch_array($qry);
		$data_id=$hsl['id_pengumuman'];
		$data_judul=$hsl['jdl_pengumuman'];
		$data_pengumuman	=$hsl['isi_pengumuman'];
		$data_pengirim	=$hsl['pengirim'];
		$data_dibaca	=$hsl['jml_baca'];
	
		$data_date	=$hsl['tgl_pengumuman'];
		$tgl =substr($data_date,8,2);
		$bln =substr($data_date,5,2);
		$thn =substr($data_date,0,4);

		echo("<h1>Form Ubah Pengumuman</h1>
		<span class='pesan'>".$_GET['pesan']."</span>
		<form method=post action='$dir?menu=aturpengumuman&aksi=updatepengumuman'>
		<input name='txtidh' type='hidden' value='$data_id'>
		<table>
    <tr> 
      <td>Judul pengumuman </td>
      <td>: 
				<input name='txtjudul' type='text' value='$data_judul' size='50' maxlength='100'>
			</td>
    </tr>
		<tr> 
      <td>Pengirim</td>
      <td>: 
        <input name='txtpengirim' type='text' value='$data_pengirim' size='40' maxlength='60'></td>
    </tr>
    <tr>
      <td>Rating Baca </td>
      <td>: <input type='text' name='txtrating' value='$data_dibaca' readonly /></td>
    </tr>
    <tr> 
      <td>Tanggal Kirim </td>
      <td> : $tgl-$bln-$thn</td>
    </tr>
    <tr> 
      <td colspan='2'><center><b>Isi Pengumuman</b></center></td>
		</tr>
		<tr>
      <td colspan='2'>
				<textarea id='txtpengumuman' name='txtpengumuman' style='height: 170px; width: 520px;'>$data_pengumuman
				</textarea>
				<script language='javascript1.2'>
					WYSIWYG.attach('txtpengumuman',full);
				</script>
      </td>
    </tr>
	</table>");
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/><a href=?menu=aturpengumuman><input class='btl' name='Keluar' type='reset' id='Keluar2' value='' tabindex='4' onClick='keluar()' /></a></form>");
	break;
	
case "previewpengumuman" : 
	$sql= "SELECT * FROM  pengumuman  WHERE id_pengumuman='$_GET[id]' ";
	$qry = mysql_query($sql);
	$data=mysql_fetch_array($qry);
  $data_judul=$data['jdl_pengumuman'];
	$data_pengumuman	=$data['isi_pengumuman'];
	$data_pengirim	=$data['pengirim'];
	$data_dibaca	=$data['jml_baca'];
  $data_date	=$data['tgl_pengumuman'];
  $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)
  		   ."-".substr($data_date,0,4);
	echo("<h1>Preview Pengumuman</h1>
	<table>
		<tr> 
			<td><center><h3> $data_judul </h3></center> 
				$data_pengumuman<br><br>
				Dikirim Oleh : <b>$data_pengirim</b>,
				Tanggal : <b>$tgl_ind</b>,
				Dibaca : <b>$data_dibaca</b> kali<br>
			</td>
		</tr>
		</table>
		<a href=?menu=aturpengumuman><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
	break;
}
?>