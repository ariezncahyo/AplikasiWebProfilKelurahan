<!-- Begin Vista-Buttons.com HEAD SECTION id=vbUL_al3nr-->
<style type="text/css">A#vbUL_al3nra{display:none}</style>
<!-- End Vista-Buttons.com HEAD SECTION -->
<?php
$dir="php/berita/aksiberita.php";
switch($aksi=$_GET[aksi]){
  // Tampil penggalan berita
  default:
		echo("<h1>BERITA</h1>
		<table>
			<tr>
				<td>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=berita&aksi=cariberita'>
						<b>Pencarian : </b>
						<select name='filter'>
							<option value='judul'>Judul</option>
							<option value='pengirim'>Pengirim</option>
						</select>
						<input type='text' id='keyword' name='keyword' />
						<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='23' height='20' \>
						<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr><td>");
		if(isset($_GET['blnthn_brt'])){
			$blnthn_brt=$_GET['blnthn_brt'];
			include "php/paging.php";
			$sql_news = "SELECT * FROM news where date_format(date, '%M %Y') = '$blnthn_brt' ORDER BY date  DESC limit $offset, $dataPerPage";
		}
		else{
			include "php/paging.php";
			$sql_news = "SELECT * FROM news ORDER BY date  DESC limit $offset, $dataPerPage";
		}
		$qry_news = mysql_query($sql_news) or die ("Gagal query tampil");
		while($data_news=mysql_fetch_array($qry_news)){ 
			$berita =$data_news['berita'];
			$cuplikan=array();
			$pecah=explode(" ",$berita);
			for ($i=0; $i<50; $i++)
				$cuplikan[$i] = $pecah[$i];
			$cuplikan = implode(" ", $cuplikan);
			$cuplikan = stripslashes($cuplikan);
			$link = "<a href=?menu=berita&aksi=detail&id=$data_news[id_news]> Selengkapnya &raquo;&raquo;</a>";
		
			$tgl=substr($data_news['date'],8,2);
			$bln=substr($data_news['date'],5,2);
			$thn=substr($data_news['date'],0,4);
			echo("<br><b><font size='3'>
        &raquo; <a href=?menu=berita&aksi=detail&id=$data_news[id_news]>$data_news[judul]</a> &laquo;</font></b><br>"); 
				if(sizeof($pecah)<50){
					echo ($cuplikan);
				}else{
					echo ($cuplikan.' . . .'.$link);
				}
			echo("<br /><em>Posted by : <b>$data_news[pengirim]</b>
				Tangal : <b>$tgl-$bln-$thn</b>
				Dibaca : <b>$data_news[dibaca]</b> kali<br></em>");		
		}
		echo("</td></tr></table> <br>");
		include('php/linkpaging.php');
	break;
	
	case "cariberita" :
	$filter=$_GET['filter'];
		$keyword=$_GET['keyword'];
		include('php/paging.php');
		if ($filter=='judul')
		{	$sql_news="select * from news where judul like '%$keyword%' order by id_news";
		}
		elseif ($filter=='pengirim')
		{	$sql_news="select * from news where pengirim like '%$keyword%' order by id_news";
		}
		$qry_news=mysql_query($sql_news) or die ("gagal menampilkan".mysql_error());
		$row=mysql_num_rows($qry_news);
		echo("<table>
			<tr><th><h1>BERITA</h1></th></tr>
			<tr>
				<td>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=berita&aksi=cariberita'>
						<b>Pencarian : </b>
						<select name='filter'>
							<option value='judul'>Judul</option>
							<option value='pengirim'>Pengirim</option>
						</select>
						<input type='text' id ='keyword' name='keyword' />
						<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
						<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>");
			if($row > 0){
			echo("
			<tr><th>Daftar Berita</th></tr>
			<tr><td>"); 
		
		while($data_news=mysql_fetch_array($qry_news)){ 
			$berita =$data_news['berita'];
			$cuplikan=array();
			$pecah=explode(" ",$berita);
			for ($i=0; $i<50; $i++)
				$cuplikan[$i] = $pecah[$i];
			$cuplikan = implode(" ", $cuplikan);
			$cuplikan = stripslashes($cuplikan);
			$link = "<a href=?menu=berita&aksi=detail&id=$data_news[id_news]> Selengkapnya &raquo;&raquo;</a>";
		
			$tgl=substr($data_news['date'],8,2);
			$bln=substr($data_news['date'],5,2);
			$thn=substr($data_news['date'],0,4);
			echo("<br><b><font size='4'>
        &raquo; <a href=?menu=berita&aksi=detail&id=$data_news[id_news]>$data_news[judul]</a> </font></b><br>");
				if(sizeof($pecah)<50){
					echo ($cuplikan);
				}else{
					echo ($cuplikan.' . . .'.$link);
				}
			echo("<br />Posted by : <b>$data_news[pengirim]</b>
				Tangal : <b>$tgl-$bln-$thn</b>
				Dibaca : <b>$data_news[dibaca]</b> kali<br>");	
		}
		echo("</td></tr></table>
		<a href=?menu=berita><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0' /></a><br /><br />");
		include('php/linkpaging.php');
		}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
	break;

	case "detail" :
		$id_news = $_GET['id'];
		$sql_baca="UPDATE news SET dibaca=dibaca + 1 WHERE id_news='$id_news'";
		mysql_query($sql_baca);
 
		$sql_news = "SELECT * FROM  news  WHERE id_news='$id_news'";
		$qry_news  = mysql_query($sql_news);
		$data_news=mysql_fetch_array($qry_news);
		$data_judul =$data_news['judul'];
		$data_berita=$data_news['berita'];
		$data_pengirim=$data_news['pengirim'];
		$data_date=$data_news['date'];
		$data_dibaca=$data_news['dibaca'];
  
		$tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)
  		   ."-".substr($data_date,0,4);
		echo("<table>
			<tr> 
				<th><h1>Berita</h1></th>
			</tr>
			<tr> 
				<td><br><h1> $data_judul </h1> 
					$data_berita
					Posted by : <b>$data_pengirim</b> 
					Tangal : <b>$tgl_ind</b> 
					Dibaca : <b>$data_dibaca</b> kali<br>
				</td>
			</tr>
			</table>
			<a href=?menu=berita><img src='images/back.png' title='Kembali ke daftar berita' alt='Kembali' width='30' height='30' border='0' /></a>");
		include('php/komentar/komentar.php');
		break;
}
?>
