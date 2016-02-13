<!-- Begin Vista-Buttons.com HEAD SECTION id=vbUL_al3nr-->
<style type="text/css">A#vbUL_al3nra{display:none}</style>
<!-- End Vista-Buttons.com HEAD SECTION -->
<?php
$dir="php/profil/aksipotensi.php";
switch($aksi=$_GET[aksi]){
  // Tampil penggalan potensi
  default:
		echo("<h1>Potensi Daerah</h1>
		<table>
			<tr><td>");
		if(isset($_GET['blnthn_brt'])){
			$blnthn_brt=$_GET['blnthn_brt'];
			include "php/paging.php";
			$sql_potensi = "SELECT * FROM potensi ORDER BY id_potensi limit $offset, $dataPerPage";
		}
		else{
			include "php/paging.php";
			$sql_potensi = "SELECT * FROM potensi ORDER BY id_potensi limit $offset, $dataPerPage";
		}
		$qry_potensi = mysql_query($sql_potensi) or die ("Gagal query tampil");
		while($data_potensi=mysql_fetch_array($qry_potensi)){ 
			$potensi =$data_potensi['potensi_daerah'];
			$cuplikan=array();
			$pecah=explode(" ",$potensi);
			for ($i=0; $i<50; $i++)
				$cuplikan[$i] = $pecah[$i];
			$cuplikan = implode(" ", $cuplikan);
			$cuplikan = stripslashes($cuplikan);
			$link = "<a href=?menu=potensi&aksi=detail&id=$data_potensi[id_potensi]> Selengkapnya &raquo;&raquo;</a>";
		
			$tgl=substr($data_potensi['tgl_posting'],8,2);
			$bln=substr($data_potensi['tgl_posting'],5,2);
			$thn=substr($data_potensi['tgl_posting'],0,4);
			echo("<br><b><font size='3'>
        &raquo; <a href=?menu=potensi&aksi=detail&id=$data_potensi[id_potensi]>$data_potensi[nama_potensi]</a> &laquo;</font></b><br>"); 
				if(sizeof($pecah)<50){
					echo ($cuplikan);
				}else{
					echo ($cuplikan.' . . .'.$link);
				}
			echo("<br /><em>Posted by : <b>$data_potensi[username]</b>
				Tanggal : <b>$tgl-$bln-$thn</b>
				<br></em>");		
		}
		echo("</td></tr></table> <br>");
		include('php/linkpaging.php');
	break;

	case "detail" :
		$id_potensi = $_GET['id'];

		$sql_potensi = "SELECT * FROM  potensi  WHERE id_potensi='$id_potensi'";
		$qry_potensi  = mysql_query($sql_potensi);
		$data_potensi=mysql_fetch_array($qry_potensi);
		$nama_potensi =$data_potensi['nama_potensi'];
		$potensi=$data_potensi['potensi_daerah'];
		$username=$data_potensi['username'];
		$tgl_posting=$data_potensi['tgl_posting'];
  
		echo("<table>
			<tr> 
				<th><h1>Potensi Daerah</h1></th>
			</tr>
			<tr> 
				<td><br><h1> $nama_potensi </h1> 
					$potensi<br><br>
					Posted by : <b>$username</b> <br>
					Tanggal : <b>$tgl_posting</b> <br><br>
				</td>
			</tr>
			</table>
			<a href=?menu=potensi><img src='images/back.png' title='Kembali ke daftar potensi' alt='Kembali' width='30' height='30' border='0' /></a>");

		break;
}
?>
