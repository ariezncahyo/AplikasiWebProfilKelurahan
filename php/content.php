<?php
include "connect.php";
/*include "library.php";
include "fungsi_indotgl.php";
include "fungsi_combo_admin.php";
include "class_paging.php";*/

switch($menu=$_GET['menu'])
{	default:
		include('Profil/home.php');
		break;
	case 'home':
		include('Profil/home.php');
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
	case 'potensi':
		include("Profil/potensi.php"); 
		break;
	case 'berita':
		include("berita/berita.php"); 
		break;
	case 'galeri':
		include("galeri/galeri.php"); 
		break;	
	case 'bukutamu':
		include("bukutamu/bukutamu.php");
		break;
	case 'pengumuman':
		include("pengumuman/pengumuman.php");
		break;
}
?>
