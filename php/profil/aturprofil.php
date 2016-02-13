<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.txtjudul.value == "")
{
   alert("Isi dulu judul profil !");
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
$dir="php/profil/aksiaturprofil.php";
switch($aksi=$_GET[aksi]){
	default:
		echo("<h1>Pengaturan Profil</h1>
		<span class='pesan'>".$_GET['pesan']."</span>
		<table class='data'>
			<tr>
				<td colspan='4'><center><b>&raquo; &raquo; &raquo;&nbsp; D A F T A R&nbsp;&nbsp;&nbsp;P R O F I L &nbsp;&laquo; &laquo; &laquo; </b></font></center></td>
			</tr>
			<tr>
				<th>Nama Profil</th>
				<th>Proses</th>
			</tr>");
	
		$sql_profil="SELECT * FROM profil ORDER BY id_profil";
		$qry_profil=mysql_query($sql_profil) or die ("gagal menampilkan".mysql_error());
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while($r=mysql_fetch_array($qry_profil)) {
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo ("<tr bgcolor='".$warna."'>
			<td>$r[nama_profil]</td>
			<td width='80'><center>
					<a href=?menu=aturprofil&aksi=editprofil&id=$r[id_profil]><img src='images/edit.png' title='Ubah' alt='Ubah' width='14' height='14'></a> |
					<a href=?menu=aturprofil&aksi=previewprofil&id=$r[id_profil]><img src='images/preview.png' title='Preview' alt='Preview' width='14' height='14'></a></center>
			</td>
			</tr>");
			$counter++;
		}
	echo("</table>");
	break;
	
	
	case"editprofil":
		$sql_profil="SELECT * FROM profil WHERE id_profil='$_GET[id]'";
		$qry_profil=mysql_query($sql_profil) or die ("gagal menampilkan".mysql_error());
		$r=mysql_fetch_array($qry_profil);
		$data_idprofil	=$r['id_profil'];
		$data_judul		=$r['nama_profil'];
		$data_profil	=$r['isi_profil'];
		$data_pengirim	=$r['username'];
	

		echo("<h1>Form Ubah Profil</h1>
		<form method=post action='$dir?menu=aturprofil&aksi=updateprofil' name=text_form onsubmit='return Blank_TextField_Validator()'> 
		<input name='txtidh' type='hidden' value='$data_idprofil'>
		<table>
    <tr> 
      <td>Nama Profil </td>
      <td>: 
				<input name='txtjudul' type='text' value='$data_judul' size='50' maxlength='100' readonly >
			</td>
    </tr>
		<tr> 
      <td>Pengirim</td>
      <td>: 
        <input name='txtpengirim' type='text' value='$data_pengirim' size='40' maxlength='60' readonly></td>
    </tr>
    <tr> 
      <td colspan='2'><center>Isi Profil</center></td>
		</tr>
		<tr>
      <td colspan='2'>
			<textarea id='txtprofil' name='txtprofil' style='height: 170px; width: 520px;'>$data_profil
			</textarea>
			<script language='javascript1.2'>
				WYSIWYG.attach('txtprofil',full);
			</script>
      </td>
    </tr>
	</table>");
	echo("<input class='btnsimpan' type='submit' name='sign' value=''/></form>");
	break;

case "previewprofil" : 
	$sql_profil = "SELECT * FROM  profil  WHERE id_profil='$_GET[id]' ";
	$qry_profil  = mysql_query($sql_profil);
	$data_profil=mysql_fetch_array($qry_profil);
  $data_judul =$data_profil['nama_profil'];
  $data_profil=$data_profil['isi_profil'];
  
	echo("<h1>Preview Profil</h1>
	<table> 
		<tr> 
			<td><center><h3> $data_judul </h3></center> 
				$data_profil<br><br>
			</td>
		</tr>
		</table>
		<a href=?menu=aturprofil><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
	break;
}
?>