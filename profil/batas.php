<?php
echo("<h1>Batas Wilayah Kelurahan Empangsari</h1>");
$sql_profil = "SELECT * FROM  profil  WHERE id_profil='5' ";
	$qry_profil  = mysql_query($sql_profil);
	$data_profil=mysql_fetch_array($qry_profil);
  $data_judul =$data_profil['nama_profil'];
  $data_profil=$data_profil['isi_profil'];
  
	echo("
	<table> 
		<tr> 
			<td>
				$data_profil<br><br>
			</td>
		</tr>
		</table>
		");
?>