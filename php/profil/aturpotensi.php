<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.txtnama_potensi.value == "")
{
   alert("Isi dulu nama_potensi potensi !");
   text_form.txtnama_potensi.focus();
   return (false);
}
return (true);
}
</script>
<?php
$dir="php/profil/aksiaturpotensi.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<h1>Pengaturan Potensi Daerah</h1>
		<span class='pesan'>".$_GET['pesan']."</span>
		<table class='data'>
			<tr>
				<td colspan='4'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturpotensi&aksi=caripotensi'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='nama_potensi'>Nama Potensi</option>
						<option value='username'>Username</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan='4'><center><b>&raquo; &raquo; &raquo;&nbsp; D A F T A R&nbsp;&nbsp;&nbsp;P O T E N S I &nbsp;&laquo; &laquo; &laquo; </b></font></center></td>
			</tr>
			<tr>
				<th>TGL POSTING</th>
				<th>NAMA POTENSI</th>
				<th>username</th>
				<th>PROSES</th>
			</tr>");
	
		include('php/paging.php');
		$sql_potensi="SELECT id_potensi,nama_potensi,tgl_posting, username FROM potensi ORDER BY id_potensi limit $offset, $dataPerPage";
		$qry_potensi=mysql_query($sql_potensi) or die ("gagal menampilkan".mysql_error());
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($hsl_potensi=mysql_fetch_array($qry_potensi)) {
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			$tgl=substr($hsl_potensi['tgl_posting'],8,2);
			$bln=substr($hsl_potensi['tgl_posting'],5,2);
			$thn=substr($hsl_potensi['tgl_posting'],0,4);
  
			echo ("<tr bgcolor='".$warna."'>
			<td>$tgl-$bln-$thn</td>
			<td>$hsl_potensi[nama_potensi]</td>
			<td>$hsl_potensi[username]</td>
			<td width='80'><center><a href=$dir?menu=aturpotensi&aksi=hapuspotensi&id=$hsl_potensi[id_potensi]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturpotensi&aksi=editpotensi&id=$hsl_potensi[id_potensi]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturpotensi&aksi=previewpotensi&id=$hsl_potensi[id_potensi]><img src='images/preview.png' title='Preview' alt='Preview' width='14' height='14'></a></center>
			</td>
			</tr>");
			$counter++;
		}
	echo("</table>");
	include('php/linkpaging.php');
	echo ("<center><a href=?menu=aturpotensi&aksi=tambahpotensi><input  type='submit' value='Tambah Potensi Daerah' /></a></center>");
	break;
	
	case"caripotensi";
	echo("<h1>Pengaturan potensi</h1>");
	$filter=$_GET['filter'];
	$keyword=$_GET['keyword'];
	include('php/paging.php');
	if ($filter=='nama_potensi')
	{	$sql_potensi="select id_potensi,nama_potensi,tgl_posting,username from potensi where nama_potensi like '%$keyword%' order by id_potensi DESC limit $offset, $dataPerPage";
	}
	elseif ($filter=='username')
	{	$sql_potensi="select id_potensi,nama_potensi,tgl_posting,username from potensi where username like '%$keyword%' order by id_potensi DESC limit $offset, $dataPerPage";
	}
	$qry_potensi=mysql_query($sql_potensi) or die ("gagal menampilkan".mysql_error());
	$row=mysql_num_rows($qry_potensi);
	echo("
	<table class='data'>
		<tr>
			<td colspan='4'>
				<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=aturpotensi&aksi=caripotensi'>
				<b>Pencarian : </b>
				<select name='filter'>
					<option value='nama_potensi'>Nama Potensi</option>
					<option value='username'>Username</option>
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
			<th>NAMA POTENSI</th>
			<th>USERNAME</th>
			<th>PROSES</th>
		</tr>");
	
	
	$warnaGenap = "#d3e4f0";   // warna tua
	$warnaGanjil = "#eaf3f9";  // warna muda
	$counter = 1;
	while($hsl_potensi=mysql_fetch_array($qry_potensi)) {
	if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
  	$tgl=substr($hsl_potensi['tgl_posting'],8,2);
		$bln=substr($hsl_potensi['tgl_posting'],5,2);
		$thn=substr($hsl_potensi['tgl_posting'],0,4);
 
		echo ("<tr bgcolor='".$warna."'>
			<td>$tgl-$bln-$thn</td>
			<td>$hsl_potensi[nama_potensi]</td>
			<td>$hsl_potensi[username]</td>
			<td width='80'><center><a href=$dir?menu=aturpotensi&aksi=hapuspotensi&id=$hsl_potensi[id_potensi]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a> |
					<a href=?menu=aturpotensi&aksi=editpotensi&id=$hsl_potensi[id_potensi]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturpotensi&aksi=previewpotensi&id=$hsl_potensi[id_potensi]><img src='images/preview.png' title='Preview' alt='Preview' width='14' height='14'></a></center>
			</td>
		</tr>");
		$counter++;
  }
	echo("</table>
	<a href=?menu=aturpotensi&aksi=tambahpotensi>Tambah Potensi Daerah</a>
	&nbsp;&nbsp;<a href=?menu=aturpotensi><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0' /></a><br /><br />");
	include('php/linkpaging.php');
	}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
	break;
	
	case"tambahpotensi":
	echo("<h1>Form Tambah Potensi Daerah</h1>
	<form name=text_form onsubmit='return Blank_TextField_Validator()' method='post' action='$dir?menu=aturpotensi&aksi=simpanpotensi'>
	<table>
    <tr> 
      <td>Nama Potensi Daerah </td>
      <td>: <input id='txtnama_potensi' name='txtnama_potensi' type='text' size='50' maxlength='100'>
				<br /><div class='error' id='nama_potensikosong'>nama potensi harus diisi!<br></div>
			</td>
    </tr>
		<tr> 
      <td>Username</td>
      <td>: 
        <input id='txtusername' name='txtusername' type='text' size='40' maxlength='60' readonly value='".$_SESSION['username']."'>
				<br /><div class='error' id='usernamekosong'>username harus diisi!<br></div>
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
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/><a href=?menu=aturpotensi><input class='btl' name='Keluar' type='reset' id='Keluar2' value='' tabindex='4' onClick='keluar()' /></a></form>");
	break;
	
	case"editpotensi":
		$sql_potensi="SELECT * FROM potensi WHERE id_potensi='$_GET[id]'";
		$qry_potensi=mysql_query($sql_potensi) or die ("gagal menampilkan".mysql_error());
		$hsl_potensi=mysql_fetch_array($qry_potensi);
		$data_idpotensi	=$hsl_potensi['id_potensi'];
		$data_nama_potensi		=$hsl_potensi['nama_potensi'];
		$data_potensi	=$hsl_potensi['potensi_daerah'];
		$data_username	=$hsl_potensi['username'];
	
		$data_tgl_posting	=$hsl_potensi['tgl_posting'];

		echo("<h1>Form Ubah Potensi Daerah</h1>
		<form method=post action='$dir?menu=aturpotensi&aksi=updatepotensi' name=text_form onsubmit='return Blank_TextField_Validator()'> 
		<input name='txtidh' type='hidden' value='$data_idpotensi'>
		<table>
    <tr> 
      <td>Nama Potensi Daerah </td>
      <td>: 
				<input name='txtnama_potensi' type='text' value='$data_nama_potensi' size='50' maxlength='100'>
			</td>
    </tr>
		<tr> 
      <td>Username</td>
      <td>: 
        <input name='txtusername' type='text' value='$data_username' size='40' maxlength='60' readonly value='".$_SESSION['username']."'></td>
    </tr>
    <tr> 
      <td>Tanggal Posting </td>
      <td>: $data_tgl_posting</td>
    </tr>
    <tr> 
      <td colspan='2'><center>Potensi Daerah</center></td>
		</tr>
		<tr>
      <td colspan='2'>
			<textarea id='txtpotensi' name='txtpotensi' style='height: 170px; width: 520px;'>$data_potensi
			</textarea>
			<script language='javascript1.2'>
				WYSIWYG.attach('txtpotensi',full);
			</script>
      </td>
    </tr>
	</table>");
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/><a href=?menu=aturpotensi><input class='btl' name='Keluar' type='reset' id='Keluar2' value='' tabindex='4' onClick='keluar()' /></a></form>");
	break;

case "previewpotensi" : 
	$sql_potensi = "SELECT * FROM  potensi  WHERE id_potensi='$_GET[id]' ";
	$qry_potensi  = mysql_query($sql_potensi);
	$data_potensi=mysql_fetch_array($qry_potensi);
  $data_nama_potensi =$data_potensi['nama_potensi'];
  $data_potensi=$data_potensi['potensi_daerah'];
  $data_username=$data_potensi['username'];
  $tgl_posting=$data_potensi['tgl_posting'];
  
	echo("<h1>Preview Potensi Daerah</h1>
	<table> 
		<tr> 
			<td><center><h3>$data_nama_potensi</h3></center> 
				$data_potensi<br><br>
			</td>
		</tr>
		</table>
		<a href=?menu=aturpotensi><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
	break;
}
?>