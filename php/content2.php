<?php
include('fungsi_alert.php');
switch($menu=$_GET['menu'])
{	
	case 'home':
		echo "<h1>Selamat Datang</h1>
		<p>Selamat datang di <b>Website Profil Kelurahan Empangsari - Kota Tasikmalaya</b>. Silahkan Pilih menu untuk mengolah data.</p>
		<p>&nbsp;</p>";
		break;
	case 'sejarah_singkat':
		include('Profil/sejarah_singkat.php');
		break;
	case 'visi_misi':
		include('Profil/visi_misi.php');
		break;
	case 'struktur_organisasi':
		include('Profil/struktur_organisasi.php');
		break;
	case 'eksekutif':
		include('Profil/eksekutif.php');
		break;
	case 'demografi':
		include('Profil/demografi.php');
		break;
	case 'batas':
		include('Profil/batas.php');
		break;

	case 'berita':
		include("berita/berita.php"); 
		break;
	
	case 'bukutamu':
		include("bukutamu/bukutamu.php");
		break;
	case 'pengumuman':
		include("pengumuman/pengumuman.php");
		break;
	case 'tambahberita':
		include("berita/tambahberita.php");
		break;
	case 'galeri':
		include("galeri/galeri.php");
		break;
	case 'user':
		include("user/users.php");
		break;
	case 'potensi':
		include("Profil/potensi.php"); 
		break;
	case 'aturpotensi':
		include("profil/aturpotensi.php");
		break;
	case 'aturberita':
		include("berita/aturberita.php");
		break;
	case 'aturprofil':
		include("profil/aturprofil.php"); 
		break;
	case 'aturbukutamu':
		include("bukutamu/aturbukutamu.php");
		break;
	case 'aturkomentar':
		include("komentar/aturkomentar.php");
		break;
	
	case 'pengumuman':
		include("pengumuman/pengumuman.php");
		break;
	case 'aturpengumuman':
		include("pengumuman/aturpengumuman.php");
		break;

	case 'ubahakun':
		include("user/ubah_akun.php");
		break;
}
?>