<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.txtjudul.value == "")
{
   alert("Isi dulu judul berita !");
   text_form.txtjudul.focus();
   return (false);
}
if (text_form.txtpengirim.value == "")
{
   alert("Isi dulu pengirim !");
   text_form.txtpengirim.focus();
   return (false);
}
return (true);
}
</script>
<?php
$dir="php/berita/aksiaturberita.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<h1>Pengaturan Berita</h1>
		<span class='pesan'>".$_GET['pesan']."</span>
		<table class='data'>
			<tr>
				<td colspan='4'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturberita&aksi=cariberita'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='judul'>Judul</option>
						<option value='pengirim'>Pengirim</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan='4'><center><b>&raquo; &raquo; &raquo;&nbsp; D A F T A R&nbsp;&nbsp;&nbsp;B E R I T A &nbsp;&laquo; &laquo; &laquo; </b></font></center></td>
			</tr>
			<tr>
				<th>TGL POSTING</th>
				<th>JUDUL BERITA</th>
				<th>Pengirim</th>
				<th>Proses</th>
			</tr>");
	
		include('php/paging.php');
		$sql_news="SELECT id_news,judul,date, pengirim FROM news ORDER BY id_news DESC limit $offset, $dataPerPage";
		$qry_news=mysql_query($sql_news) or die ("gagal menampilkan".mysql_error());
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($hsl_news=mysql_fetch_array($qry_news)) {
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			$tgl=substr($hsl_news['date'],8,2);
			$bln=substr($hsl_news['date'],5,2);
			$thn=substr($hsl_news['date'],0,4);
  
			echo ("<tr bgcolor='".$warna."'>
			<td>$tgl-$bln-$thn</td>
			<td>$hsl_news[judul]</td>
			<td>$hsl_news[pengirim]</td>
			<td width='80'><center><a href=$dir?menu=aturberita&aksi=hapusberita&id=$hsl_news[id_news]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturberita&aksi=editberita&id=$hsl_news[id_news]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturberita&aksi=previewberita&id=$hsl_news[id_news]><img src='images/preview.png' title='Preview' alt='Preview' width='14' height='14'></a></center>
			</td>
			</tr>");
			$counter++;
		}
	echo("</table>");
	include('php/linkpaging.php');
	echo ("<center><a href=?menu=aturberita&aksi=tambahberita><input class='berita' type='submit' value='' /></a></center>");
	break;
	
	case"cariberita";
	echo("<h1>Pengaturan Berita</h1>");
	$filter=$_GET['filter'];
	$keyword=$_GET['keyword'];
	include('php/paging.php');
	if ($filter=='judul')
	{	$sql_news="select id_news,judul,date,pengirim from news where judul like '%$keyword%' order by id_news DESC limit $offset, $dataPerPage";
	}
	elseif ($filter=='pengirim')
	{	$sql_news="select id_news,judul,date,pengirim from news where pengirim like '%$keyword%' order by id_news DESC limit $offset, $dataPerPage";
	}
	$qry_news=mysql_query($sql_news) or die ("gagal menampilkan".mysql_error());
	$row=mysql_num_rows($qry_news);
	echo("
	<table class='data'>
		<tr>
			<td colspan='4'>
				<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturberita&aksi=cariberita'>
				<b>Pencarian : </b>
				<select name='filter'>
					<option value='judul'>Judul</option>
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
			<td colspan='4'><center><b><font color='red'>Daftar Hasil Pencarian</font></b></center></td>
		</tr>
		<tr>
			<th>TGL POSTING</th>
			<th>JUDUL BERITA</th>
			<th>Pengirim</th>
			<th>Proses</th>
		</tr>");
	
	
	$warnaGenap = "#d3e4f0";   // warna tua
	$warnaGanjil = "#eaf3f9";  // warna muda
	$counter = 1;
	while($hsl_news=mysql_fetch_array($qry_news)) {
	if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
  	$tgl=substr($hsl_news['date'],8,2);
		$bln=substr($hsl_news['date'],5,2);
		$thn=substr($hsl_news['date'],0,4);
 
		echo ("<tr bgcolor='".$warna."'>
			<td>$tgl-$bln-$thn</td>
			<td>$hsl_news[judul]</td>
			<td>$hsl_news[pengirim]</td>
			<td width='80'><center><a href=$dir?menu=aturberita&aksi=hapusberita&id=$hsl_news[id_news]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturberita&aksi=editberita&id=$hsl_news[id_news]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturberita&aksi=previewberita&id=$hsl_news[id_news]><img src='images/preview.png' title='Preview' alt='Preview' width='14' height='14'></a></center>
			</td>
		</tr>");
		$counter++;
  }
	echo("</table>
	<a href=?menu=aturberita&aksi=tambahberita><img src='images/tambah.png' title='Tambah Berita' alt='Tambah Berita' width='30' height='30' border='0' /></a>
	&nbsp;&nbsp;<a href=?menu=aturberita><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0' /></a><br /><br />");
	include('php/linkpaging.php');
	}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
	break;
	
	case"tambahberita":
	echo("<h1>Form Tambah Berita</h1>
	<form name=text_form onsubmit='return Blank_TextField_Validator()' method='post' action='$dir?menu=aturberita&aksi=simpanberita'>
	<table>
    <tr> 
      <td>Judul Berita </td>
      <td>: <input id='txtjudul' name='txtjudul' type='text' size='50' maxlength='100'>
				<br /><div class='error' id='judulkosong'>Judul harus diisi!<br></div>
			</td>
    </tr>
		<tr> 
      <td>Pengirim</td>
      <td>: 
        <input id='txtpengirim' name='txtpengirim' type='text' size='40' maxlength='60'>
				<br /><div class='error' id='pengirimkosong'>Pengirim harus diisi!<br></div>
			</td>
    </tr>
		<tr>
			<td>Rating Baca</td>
			<td>: <input type='text' id='txtrating' name='txtrating' value='0' />
				<br /><div class='error' id='ratingkosong'>Rating harus diisi!<br></div>
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
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/><a href=?menu=aturberita><input class='btl' name='Keluar' type='reset' id='Keluar2' value='' tabindex='4' onClick='keluar()' /></a></form>");
	break;
	
	case"editberita":
		$sql_news="SELECT * FROM news WHERE id_news='$_GET[id]'";
		$qry_news=mysql_query($sql_news) or die ("gagal menampilkan".mysql_error());
		$hsl_news=mysql_fetch_array($qry_news);
		$data_idnews	=$hsl_news['id_news'];
		$data_judul		=$hsl_news['judul'];
		$data_berita	=$hsl_news['berita'];
		$data_pengirim	=$hsl_news['pengirim'];
		$data_dibaca	=$hsl_news['dibaca'];
	
		$data_date	=$hsl_news['date'];
		$tgl =substr("$data_date",8,2);
		$bln =substr("$data_date",5,2);
		$thn =substr("$data_date",0,4);

		echo("<h1>Form Ubah Berita</h1>
		<form method=post action='$dir?menu=aturberita&aksi=updateberita' name=text_form onsubmit='return Blank_TextField_Validator()'> 
		<input name='txtidh' type='hidden' value='$data_idnews'>
		<table>
    <tr> 
      <td>Judul Berita </td>
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
      <td>: <input type='text' name='txtrating' value='$data_dibaca' /></td>
    </tr>
    <tr> 
      <td>Tanggal Posting </td>
      <td>:.$tgl.-.$bln.-.$thn</td>
    </tr>
    <tr> 
      <td colspan='2'><center>Isi Berita</center></td>
		</tr>
		<tr>
      <td colspan='2'>
			<textarea id='txtberita' name='txtberita' style='height: 170px; width: 520px;'>$data_berita
			</textarea>
			<script language='javascript1.2'>
				WYSIWYG.attach('txtberita',full);
			</script>
      </td>
    </tr>
	</table>");
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/><a href=?menu=aturberita><input class='btl' name='Keluar' type='reset' id='Keluar2' value='' tabindex='4' onClick='keluar()' /></a></form>");
	break;

case "previewberita" : 
	$sql_news = "SELECT * FROM  news  WHERE id_news='$_GET[id]' ";
	$qry_news  = mysql_query($sql_news);
	$data_news=mysql_fetch_array($qry_news);
  $data_judul =$data_news['judul'];
  $data_berita=$data_news['berita'];
  $data_pengirim=$data_news['pengirim'];
  $data_date=$data_news['date'];
  $data_dibaca=$data_news['dibaca'];
  
  $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)
  		   ."-".substr($data_date,0,4);
	echo("<h1>Preview Berita</h1>
	<table> 
		<tr> 
			<td><center><h3> $data_judul </h3></center> 
				$data_berita<br><br>
				Posted by : <b>$data_pengirim</b> 
				Tangal : <b>$tgl_ind</b> 
				Dibaca : <b>$data_dibaca</b> kali<br>
			</td>
		</tr>
		</table>
		<a href=?menu=aturberita><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
	break;
}
?>