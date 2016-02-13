<?php
$dir="php/pengumuman/aksipengumuman.php";
switch($aksi=$_GET[aksi]){
  // Tampil penggalan pengumuman
  default:
		echo("<h1>Pengumuman</h1>
		<table>
			<tr>
				<td>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=pengumuman&aksi=caripengumuman'>
						<b>Pencarian : </b>
						<select name='filter'>
							<option value='judul'>Judul</option>
							<option value='pengirim'>Pengirim</option>
						</select>
						<input type='text' id='keyword' name='keyword' />
						<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' />
						<br /><div class='error' id='keyword_kosong'>Kata kunci harus di isi!<br></div>
					</form>
				</td>
			</tr>
			<tr><td>");
			include "php/paging.php";
			$sql = "SELECT * FROM pengumuman ORDER BY tgl_pengumuman  DESC limit $offset, $dataPerPage";
		$qry = mysql_query($sql) or die ("Gagal query tampil");
		while($data=mysql_fetch_array($qry)){ 
			$pengumuman =$data['isi_pengumuman'];
			$cuplikan=array();
			$pecah=explode(" ",$pengumuman);
			for ($i=0; $i<50; $i++)
				$cuplikan[$i] = $pecah[$i];
			$cuplikan = implode(" ", $cuplikan);
			$cuplikan = stripslashes($cuplikan);
			$link = "<a href=?menu=pengumuman&aksi=detail&id=$data[id_pengumuman]> Selengkapnya &raquo;&raquo;</a>";
		
			$tgl=substr($data['tgl_pengumuman'],8,2);
			$bln=substr($data['tgl_pengumuman'],5,2);
			$thn=substr($data['tgl_pengumuman'],0,4);
			echo("<br><b><font size='4'>
         <a href=?menu=pengumuman&aksi=detail&id=$data[id_pengumuman]>$data[jdl_pengumuman]</a></font></b><br>");
				if(sizeof($pecah)<50){
					echo ($cuplikan);
				}else{
					echo ($cuplikan.' . . .'.$link);
				}
			echo("<br />Dikirim Oleh : <b>$data[pengirim]</b>
				Tangal : <b>$tgl-$bln-$thn</b>
				Dibaca : <b>$data[jml_baca]</b> kali<br>");		
		}
		echo("</td></tr></table>");
		include('php/linkpaging.php');
	break;
	
	case "caripengumuman" :
	$filter=$_GET['filter'];
		$keyword=$_GET['keyword'];
		include('php/paging.php');
		if ($filter=='judul')
		{	$sql="select * from pengumuman where jdl_pengumuman like '%$keyword%' order by id_pengumuman";
		}
		elseif ($filter=='pengirim')
		{	$sql="select * from pengumuman where pengirim like '%$keyword%' order by id_pengumuman";
		}
		$qry=mysql_query($sql) or die ("gagal menampilkan".mysql_error());
		$row=mysql_num_rows($qry);
		echo("<table>
			<tr><th><h1>pengumuman</h1></th></tr>
			<tr>
				<td>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=pengumuman&aksi=caripengumuman'>
						<b>Pencarian : </b>
						<select name='filter'>
							<option value='judul'>Judul</option>
							<option value='pengirim'>Pengirim</option>
						</select>
						<input type='text' id ='keyword' name='keyword' />
						<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' />
						<br /><div class='error' id='keyword_kosong'>Kata kunci harus di isi!<br></div>
					</form>
				</td>
			</tr>");
			if($row > 0){
			echo("
			<tr><th>Daftar pengumuman</th></tr>
			<tr><td>"); 
		
		while($data=mysql_fetch_array($qry)){ 
			$pengumuman =$data['isi_pengumuman'];
			$cuplikan=array();
			$pecah=explode(" ",$pengumuman);
			for ($i=0; $i<50; $i++)
				$cuplikan[$i] = $pecah[$i];
			$cuplikan = implode(" ", $cuplikan);
			$cuplikan = stripslashes($cuplikan);
			$link = "<a href=?menu=pengumuman&aksi=detail&id=$data[id_pengumuman]> Selengkapnya &raquo;&raquo;</a>";
		
			$tgl=substr($data['tgl_pengumuman'],8,2);
			$bln=substr($data['tgl_pengumuman'],5,2);
			$thn=substr($data['tgl_pengumuman'],0,4);
			echo("<br><b><font size='4'>
        [ <a href=?menu=pengumuman&aksi=detail&id=$data[id_pengumuman]>$data[jdl_pengumuman]</a> ]</font></b><br>");
				if(sizeof($pecah)<50){
					echo ($cuplikan);
				}else{
					echo ($cuplikan.' . . .'.$link);
				}
			echo("<br />Dikirim Oleh : <b>$data[pengirim]</b>
				Tangal : <b>$tgl-$bln-$thn</b>
				Dibaca : <b>$data[jml_baca]</b> kali<br>");	
		}
		echo("</td></tr></table>
		<a href=?menu=pengumuman><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0' /></a><br /><br />");
		include('php/linkpaging.php');
		}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
	break;

	case "detail" :
		$id_pengumuman = $_GET['id'];
		$sql_baca="UPDATE pengumuman SET jml_baca=jml_baca + 1 WHERE id_pengumuman='$id_pengumuman'";
		mysql_query($sql_baca);
 
		$sql = "SELECT * FROM  pengumuman  WHERE id_pengumuman='$id_pengumuman'";
		$qry  = mysql_query($sql);
		$data=mysql_fetch_array($qry);
		$judul =$data['jdl_pengumuman'];
		$pengumuman=$data['isi_pengumuman'];
		$pengirim=$data['pengirim'];
		$tanggal=$data['tgl_pengumuman'];
		$dibaca=$data['jml_baca'];
  
		$tgl_ind=substr($tanggal,8,2)."-".substr($tanggal,5,2)
  		   ."-".substr($tanggal,0,4);
		echo("<table>
			<tr> 
				<th><h1>pengumuman</h1></th>
			</tr>
			<tr> 
				<td><br><center><h1> $judul </h1></center> 
					$pengumuman
					Dikirim Oleh : <b>$pengirim</b> 
					Tangal : <b>$tgl_ind</b> 
					Dibaca : <b>$dibaca</b> kali<br>
				</td>
			</tr>
			</table>
			<a href=?menu=pengumuman><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
		break;
}
?>
