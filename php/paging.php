<?php
$dataPerPage = 4;
if(isset($_GET['page']))
{
  $noPage = $_GET['page'];
} 
else $noPage = 1;

$offset = ($noPage - 1) * $dataPerPage;

if($menu=='aturberita'){
	if($aksi=='cariberita'){
		if($filter=='judul'){
			$query = "select count(*) as jumData from news where judul like '%$keyword%'";
		}
		elseif($filter=='pengirim'){
			$query = "select count(*) as jumData from news where pengirim like '%$keyword%'";
		}
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM news";
	}
}
elseif($menu=='aturpotensi'){
	if($aksi=='caripotensi'){
		if($filter=='nama_potensi'){
			$query = "select count(*) as jumData from potensi where nama_potensi like '%$keyword%'";
		}
		elseif($filter=='username'){
			$query = "select count(*) as jumData from potensi where username like '%$keyword%'";
		}
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM potensi";
	}
}
elseif(isset($blnthn_brt)){
		$query = "SELECT COUNT(*) AS jumData FROM news where date_format(date, '%M %Y') = '$blnthn_brt'";
}
elseif($menu=='user'){
	if($aksi=='cariuser'){
		if($filter=='username'){
			$query = "select count(*) as jumData from user where username like '%$keyword%'";
		}
		elseif($filter=='nama_lengkap'){
			$query = "select count(*) as jumData from user where nama_lengkap like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from user";
	}
}
elseif($menu=='kelas'){
	if($aksi=='carikelas'){
		if($filter=='nama_kelas'){
			$query = "select count(*) as jumData from kelas where nama_kelas like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from kelas";
	}
}
elseif($menu=='guru'){
	if($aksi=='cariguru'){
		if($filter=='nama_guru'){
			$query = "select count(*) as jumData from guru where nama_guru like '%$keyword%'";
		}elseif($filter=='nip'){
			$query = "select count(*) as jumData from guru where nip like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from guru";
	}
}
elseif($menu=='jadwal'){
	if($aksi=='carijadwal'){
		if($filter=='nama_mp'){
			$query = "select count(*) as jumData from jadwal j,mp mp,kelas k where j.kode_mp=mp.kode_mp and j.id_kelas=k.id_kelas and mp.nama_mp like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from jadwal";
	}
}
elseif($menu=='jadwalpel'){
	if($aksi=='carijadwal'){
		if($filter=='id_kelas'){
			$query = "select count(*) as jumData from jadwal j,mp mp,kelas k where j.kode_mp=mp.kode_mp and j.id_kelas=k.id_kelas and j.id_kelas like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from jadwal";
	}
}
elseif($menu=='jadwalguru'){
	$query = "select count(*) as jumData from jadwal";
}
elseif($menu=='mengajar'){
	if($aksi=='carimengajar'){
		if($filter=='nama_guru'){
			$query = "select count(*) as jumData from mengajar m, guru g, mp mp where m.nip=g.nip and m.kode_mp=mp.kode_mp and g.nama_guru like '%$keyword%'";
		}elseif($filter=='nama_mp'){
			$query = "select count(*) as jumData from mengajar m, guru g, mp mp where m.nip=g.nip and m.kode_mp=mp.kode_mp and mp.nama_mp like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from mengajar";
	}
}
elseif($menu=='siswa'){
	if($aksi=='carisiswa'){
		if($filter=='nama_siswa'){
			$query = "select count(*) as jumData from siswa where nama_siswa like '%$keyword%'";
		}elseif($filter=='nis'){
			$query = "select count(*) as jumData from siswa where nis like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from siswa";
	}
}
elseif($menu=='upload'){
	if($aksi=='carifile'){
		if($filter=='nama_file'){
			$query = "select count(*) as jumData from upload where name like '%$keyword%'";
		}
		elseif($filter=='keterangan'){
			$query = "select count(*) as jumData from upload where keterangan like '%$keyword%'";
		}
	}
	else{
		$query = "select count(*) as jumData from upload";
	}
}

elseif($menu=='aturbukutamu' or $menu=='bukutamu'){
	if($aksi=='caribukutamu'){
		if($filter=='pengirim'){
			$query = "select count(*) as jumData from guestbook where nama like '%$keyword%'";
		}
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM guestbook";
	}
}

elseif($menu=='berita'){
	if($aksi=='cariberita'){
		if($filter=='judul'){
			$query = "select count(*) as jumData from news where judul like '%$keyword%'";
		}
		elseif($filter=='pengirim'){
			$query = "select count(*) as jumData from news where pengirim like '%$keyword%'";
		}
	}
	elseif($aksi=='detail'){
		$query = "select count(*) as jumData from komentar where id_news='$id_news'";
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM news";
	}		
}

elseif($menu=='potensi'){
	if($aksi=='detail'){
		$query = "select count(*) as jumData from potensi where id_potensi='$id_potensi'";
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM potensi";
	}		
}

elseif($menu=='aturperalatan'){
	if($aksi=='carialat'){
		if($filter=='nama_alat'){
			$query = "select count(*) as jumData from inventory where nama_barang like '%$keyword%'";
		}
		elseif($filter=='keterangan'){
			$query = "select count(*) as jumData from inventory where keterangan like '%$keyword%'";
		}
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM inventory";
	}		
}

elseif($menu=='aturkomentar'){
	if($aksi=='carikomentar'){
		if($bagianWhere=="")
			$bagianWhere='kosong';
		else
			$query = "SELECT COUNT(*) AS jumData FROM komentar where ".$bagianWhere;
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM komentar";
	}
}

elseif($menu=='pengumuman' or $menu=='aturpengumuman'){
	if($aksi=='caripengumuman'){
		if($filter=='judul'){
			$query = "select count(*) as jumData from pengumuman where jdl_pengumuman like '%$keyword%'";
		}
		elseif($filter=='pengirim'){
			$query = "select count(*) as jumData from pengumuman where pengirim like '%$keyword%'";
		}
	}
	else{
		$query = "SELECT COUNT(*) AS jumData FROM pengumuman";
	}
}
elseif($menu=='peralatan'){
	if(isset($idnya)){
		$query = "select count(*) as jumData from inventory where id_barang like '%$idnya%'";
	}
	else{
		$query = "select count(*) as jumData from inventory";
	}
	
}
/*elseif($menu=='aturkel'){
	
		$query = "SELECT COUNT(kel_prak.id_kel_prak, kel_prak.nama_kel_prak, mk.nama_mk) AS jumData from kel_prak, mk where kel_prak.id_mk=mk.id_mk";
}*/

if($bagianWhere=="kosong"){
	$jumData=0;
}
else{
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
	$jumData = $data['jumData'];
}


$jumPage = ceil($jumData/$dataPerPage);
?>