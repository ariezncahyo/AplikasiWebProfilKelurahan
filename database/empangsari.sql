-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2014 at 10:34 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `empangsari`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `komentar` text,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `nama`, `email`, `url`, `komentar`, `tanggal`) VALUES
(1, 'asep', 'asep@gmail.com', 'http://asep.com', 'web nya bagus, tetap jaya kelurahan empangsari', '2014-01-21'),
(2, 'ani', 'ani@gmail.com', 'http://ani.com', 'mohon diadakan informasi mengenai pelatihan2 atau seminar di kelurahan empangsari', '2014-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `komentar` text,
  `tanggal` date DEFAULT NULL,
  `jum_komen` int(11) NOT NULL,
  `id_news` int(5) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `komentar`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL DEFAULT '',
  `berita` text NOT NULL,
  `pengirim` varchar(30) NOT NULL DEFAULT '',
  `dibaca` int(6) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `berita`, `pengirim`, `dibaca`, `date`) VALUES
(69, 'Informasi Pelaksanaan Pemilihan Lurah', '<p style="text-align: justify">\r\nDalam rangka pelaksanaan pemilihan lurah empangsari, sebagai tahap persiapan kami sampaikan hal-hal sebagai \r\nberikut:\r\n</p>\r\n<ol>\r\n	<li>pendaftaran lurah dilaksanakan tanggal <strong>27 Februari s.d. 2 Maret 2014</strong>,</li>\r\n	<li>pendaftaran susulan dilaksanakan tanggal :<strong>4 s.d. 5 Maret 2014</strong></li>\r\n	<li>Penyerahan berkas dilaksanakan : <strong>Jumat, 15 Maret 2014 Pkl. 08.00 s.d. 11.00 di kelurahan</strong>\r\n	</li>\r\n</ol>\r\n<div style="text-align: justify">\r\nAtas perhatian dan kerjasama Bapak/Ibu kami ucapkan terima kasih\r\n</div>\r\n', 'admin', 106, '2014-01-21'),
(78, 'Pengadaan komputer untuk petugas', '<div style="text-align: justify">\r\nDinas kepegawaian pada tahun 2015 menargetkan \r\nsatu komputer untuk 2 petugas di tiap-tiap kelurahan di seluruh Indonesia.\r\n<br />\r\n<br />\r\nHal ini diakui Setditjen PMTK Depdiknas, Giri Suryatmana, sebagai \r\nsalah satu usaha Diknas untuk meningkatkan mutu pengajaran di tiap-tiap \r\nsekolah lewat internet.\r\n<br />\r\n<br />\r\nSekarang kan satu komputer untuk 2.000 siswa, nah ke depan kita mau \r\nkejar 1 komputer 20 siswa. Targetnya pada tahun 2015 dan biayanya dari \r\nAPBN, katanya seusai jumpa pers pemberian penghargaan Intel Education \r\nAward 2009 terhadap 6 orang guru di Restoran Pulau Dua, Jakarta, Minggu \r\n(16/8).\r\n<br />\r\n<br />\r\nMenurutnya, metode belajar lewat jaringan internet saat ini amatlah \r\npenting karena akses informasi yang sedemikian cepatnya dapat diperoleh \r\nsaat ini dapat diperoleh dari internet.\r\n<br />\r\n<br />\r\nMisal di Maluku Selatan, kalau kita bangun bangunan sekolah itu akan\r\npercuma, karena enam sampai tujuh bulan ke depan sekolah itu akan \r\nkosong karena para murid akan ikut orangtuanya berlayar. Karenanya, \r\nBupati sana mencanangkan program guru dengan laptop untuk melakukan \r\nproses belajar mengajar, katanya.\r\n<br />\r\n<br />\r\nUntuk lebih memudahkan para guru dan siswa, pihak Diknas, \r\nmenurutnya, telah memasang jaringan pendidikan nasional (Jardiknas) yang\r\nberfungsi untuk mendukung jaringan internet di seluruh sekolah di \r\nIndonesia.\r\n<br />\r\n<br />\r\nDari Jardiknas tersebut para guru dan siswa dapat mengunduh berbagai\r\nmacam buku dan informasi belajar mengajar. Tapi memang sampai sekarang \r\nmasih ada kendala di operasinya. Tapi itu sudah bisa diakses di seluruh \r\nIndonesia, dan semua bisa diunduh dari sana, misal buku teks, \r\npelatihan-pelatihan guru, apa saja bisa diunduh di sana, ujarnya.\r\n<br />\r\n</div>\r\n<br />\r\n<span style="font-style: italic">Sumber: Kompas.Com\r\n</span>\r\n', 'Admin', 8, '2014-01-21'),
(79, 'Petugas Kesulitan Manfaatkan Software Kelurahan', '<div style="text-align: justify">\r\nPembelajaran dengan memanfaatkan kecanggihan teknologi informasi dan \r\nkomunikasi terus dikembangkan di sekolah-sekolah. Namun, minimnya \r\npelatihan yang berkelanjutan kepada guru-guru mengakibatkan pemanfaatan \r\nsarana software pendidikan yang disediakan pemerintah tidak maksimal.\r\n<br />\r\n<br />\r\nSalah satu kesulitan yang dirasakan guru yakni pemanfaatan software \r\npendidikan jenis virtual laboratorium untuk siswa SMP yang merupakan \r\nproduk luar negeri. Sejak dibagikan ke ratusan SMP pada tahun lalu, \r\npemanfaatan CD pembelajaran virtual lab di sekolah belum maksimal.\r\n<br />\r\n<br />\r\nAgak susah untuk paham pengoperasiannya karena banyak tombol yang \r\nmesti dipahami fungsinya jika hendak memakai software itu. Pelatihan \r\nuntuk guru cuma dua hari, padahal programnya cukup rumit. Selain itu, \r\nfasilitas multimedia di sekolah juga terbatas, kata Etin, guru SMP di \r\nJakarta, Selasa (28/4).\r\n<br />\r\n<br />\r\nTender diprotes\r\n<br />\r\n<br />\r\nMeskipun aplikasi di lapangan untuk software virtual laboratorium \r\nmasih belum maksimal, pemerintah kembali memprogramkan penggadaan CD \r\nsoftware pembelajaran Biologi, Fisika, Kimia, dan Matematika, tingkat \r\nSMP pada tahun ini. Pengadaan paket CD software pembelajaran tersebut \r\nmenyerap anggaran negara sekitar Rp 15 miliar.\r\n<br />\r\n<br />\r\nNamun, proses tender CD software pembelajaran tingkat SMP itu \r\ndiprotes sejumlah perusahaan software dalam negeri yang mendaftarkan \r\ndiri. Pasalnya, spesifikasi yang ditetapkan panitia dinilai mengacu \r\nkepada produk software asing yang sudah didistribusikan di Indonesia.\r\n<br />\r\n<br />\r\nSejumlah peserta tender yang melayangkan surat protes kepada Menteri\r\nPendidikan Nasional yang ditembuskan juga antara lain ke Presiden RI \r\nmempertanyakan komitmen pemerintah dalam pengadaan jasa/barang yang \r\nseharusnya memprioritaskan produk dalam negeri, sesuai Instruksi \r\nPresiden RI Nomor 2 Tahun 2009 tentang Penggunaan Produk Dalam Negeri \r\nDalam Pengadaan Barang/Jasa Pemerintah. Mereka menilai persyaratan yang \r\nditetapkan menutup peluang perusahaan software edukasi di Indonesia, \r\ntetapi secara jelas mengacu ke produk asing.\r\n<br />\r\n<br />\r\nHary Sudiyono, Koordinator Paguyuban Pengembang Software Edukasi, \r\nmengatakan, software virtual laboratorium sebenarnya bagus, tetapi belum\r\ncocok jika dipakai untuk siswa SMP. Yang penting untuk siswa SMP itu \r\npenguasaan konsep-konsep sains terlebih dahulu. \r\n<br />\r\n<br />\r\nJika pun software pendidikan yang mau dipakai produk asing, perlu \r\nada akreditasi soal produk itu dari Depdiknas. Tidak bisa serta-merta \r\nhanya karena ada terjemahan Indonesianya, materi itu langsung cocok \r\nuntuk siswa kita. Soal akreditasi itu memang harus jadi syarat, kata \r\nHary.\r\n<br />\r\n</div>\r\n<br />\r\n<br />\r\n<span style="font-style: italic">Sumber: Kompas.Com\r\n</span>\r\n', 'Admin', 7, '2014-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `jdl_pengumuman` varchar(100) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `pengirim` varchar(30) NOT NULL DEFAULT '',
  `jml_baca` int(6) NOT NULL DEFAULT '0',
  `tgl_pengumuman` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `jdl_pengumuman`, `isi_pengumuman`, `pengirim`, `jml_baca`, `tgl_pengumuman`) VALUES
(17, 'Pemilihan Lurah Empangsari', '<p>\r\npemilihan lurah empangsari akan segera dilakukan, masyarakat diharapkan dapat lebih dekat dan mengenali calon lurah empangsari\r\n</p>\r\n', 'admin', 1, '2014-01-21'),
(18, 'Kunjungan Wali Kota', '<p>\r\nMasyarakat kelurahan empangsari diharapkan hadir di aula kelurahan empangsari, karena bapak walikota akan melakukan inspeksi rutin ke kelurahan empangsari. terima kasih sebelumnya.\r\n</p>\r\n', 'admin', 1, '2014-01-21'),
(19, 'Posyandu', '<p>\r\nAkan diadakan posyandu rutin minggu ini tanggal 25 Januari 2014 di aula kelurahan empangsari kota tasikmalaya\r\n</p>\r\n', 'admin', 0, '2014-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `potensi`
--

CREATE TABLE IF NOT EXISTS `potensi` (
  `id_potensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_potensi` varchar(50) NOT NULL,
  `potensi_daerah` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id_potensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `potensi`
--

INSERT INTO `potensi` (`id_potensi`, `nama_potensi`, `potensi_daerah`, `tgl_posting`, `username`) VALUES
(2, 'Potensi Pertanian', 'potensi pertanian kelurahan empangsari kota tasikmalaya\r\n', '2014-02-25', 'admin'),
(3, 'Potensi Perdagangan', 'potensi perdagangan kelurahan empangsari kota tasikmalaya\r\n', '2014-02-25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_profil` varchar(50) NOT NULL,
  `isi_profil` text NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_profil`, `isi_profil`, `username`) VALUES
(1, 'Sejarah', '<p>\r\n&nbsp;Terbentuknya Kelurahan Empangsari Kecamatan Tawang Kota Tasikmalaya bersamaan dengan terbentuknya Kelurahan yang ada di Wilayah Kota Administratif Tasikmalaya adapun kronologis terbentuknya Kelurahan Empangsari adalah sebagai berikut :\r\n</p>\r\n<ul>\r\n	<li>\r\n	Sampai dengan Tanggal 3 Desember 1976, Kelurahan Empangsari masih&nbsp;&nbsp; merupakan Desa Tawangsari yang meliputi Kelurahan Tawangsari, Lengkongsari dan Empangsari.</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n	Kemudian sejak tanggal 3 Nopember 1978 Desa Tawangsari dimekarkan menjadi 3 Desa yaitu : Desa Tawangsari, Desa Lengkongsari, dan Desa Empangsari sebagai relisasi terbentuknya Pemerintah Kota Administratip Tasikmalaya Tanggal 3 Nopember 1976 berdasarkan pereturan Pemerintah Republik Indonesia Nomor 22 Tahun 1975 tentang pembentukan Kota Administratip Tasikmalaya.</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n	Dan sejak Tahun 1982 Empangsari berubah menjadi Kelurahan sebagai realisasi dari peraturan Mentri Dalam Negeri Nomor 2 tahun 1980 maka mulai saat itulah Empangsari terbentuk sampai sekarang.</li>\r\n</ul>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<ol>\r\n	<li>Luas Wilayah, Luas wilayah Kelurahan Empangsari adalah 167,330 Ha atau 1.673 Km&sup2;.</li>\r\n	<li>Wilayah Administratif, Secara Administratif wilayah Kelurahan Empangsari&nbsp; terdiri dari 11 (sebelas) RW dan 44 (empat&nbsp; puluh empat) RT.</li>\r\n	<li>Letak Geografis, Wilayah Kelurahan Empangsari berbatasan langsung dengan Kelurahan Tawangsari, Kelurahan Lengkongsari, Kelurahan Kahuripan, Kelurahan Cikalang Kelurahan Nagarawangi dan Kelurahan Yudanegara.<br />\r\n	</li>\r\n</ol>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nAdapun batas-batas wilayah Kelurahan Empangsari adalah sebagai berikut :\r\n</p>\r\n<ul>\r\n	<li>\r\n	Sebelah Utara : Kelurahan Tawangsari Kecamatan Tawang</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n	Sebelah Timur : Kelurahan Lengkongsari Kecamatan Tawang</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n	Sebelah Selatan : Kelurahan Kahuripan Kecamatan Tawang, Kelurahan Nagarawangi Kecamatan Cihideung</li>\r\n	<li>Sebelah Barat : Kelurahan Yudanegara Kecamatan Tawang<br />\r\n	</li>\r\n</ul>\r\n<p>\r\nKedudukan Kelurahan\r\n</p>\r\n<ul>\r\n	<li>\r\n	Jarak dari Pusat Pemerintahan Kecamatan : 2 Km</li>\r\n	<li>Jarak dari Pusat Pemerintahan Kota : 6 Km</li>\r\n	<li>Jarak dari Ibu Kota Propinsi Jawa Barat (Bandung) : 126 Km</li>\r\n	<li>Jarak dari Ibu Kota Negara (Jakarta) : 365 Km<br />\r\n	</li>\r\n</ul>\r\n', 'admin'),
(2, 'Visi dan Misi', 'Visi<br />\r\nKesejahteraan Mayarakat Dalam Bingkai Iman dan Taqwa<br />\r\n<br />\r\nMisi<br />\r\n<ol>\r\n	<li>Mewujudkan Kesederajatan Hukum;</li>\r\n	<li>Mewujudkan Kesederajatan Ekonomi;</li>\r\n	<li>Mewujudkan Kesederajatan Sosial dan Budaya.<br />\r\n	</li>\r\n</ol>\r\n<br />\r\n			\r\n', 'admin'),
(3, 'Data Eksekutif', 'Nama Lurah : BAMBANG GUNAWAN,S.Sos <br />\r\nNIP Lurah&nbsp;&nbsp;&nbsp;&nbsp; : 19620316 198603 1 012<br />\r\n<br />\r\nNama Sekretaris Lurah : IWAN KURNIAWAN,SH <br />\r\nNIP Sekretaris Lurah&nbsp;&nbsp;&nbsp;&nbsp; : 19780303 200801 1 006<br />\r\n<br />\r\nNama Kasi Pembangunan : EUIS SUKARNA NENGSIH<br />\r\nNIP Kasi Pembangunan&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 19680130 198903 2 003<br />\r\n<br />\r\nNama Kasi Kesra : ANNA RUSLIANA<br />\r\nNIP Kasi Kesra&nbsp;&nbsp;&nbsp;&nbsp; : 19571111&nbsp; 197903 2 007<br />\r\n<br />\r\nNama Kasi trantib : AHMAD SOBARNA WIGUNA <br />\r\nNIP Kasi trantib&nbsp;&nbsp;&nbsp;&nbsp; : 19650301 199103 1 009<br />\r\n<br />\r\n			\r\n', 'admin'),
(4, 'Demografi Wilayah', 'Data Tahun 2012 <br />\r\nJumlah Penduduk : 7.243 <br />\r\nJumlah Penduduk Laki2 :3.512<br />\r\nJumlah Penduduk Perempuan :3.731<br />\r\nJumlah KK : 2.194<br />\r\nJml Pemeluk Islam : 6.415 <br />\r\nJml Pemeluk Kristen : 515<br />\r\nJml Pemeluk Katolik : 164<br />\r\nJml Pemeluk Hindu : 39<br />\r\nJml Pemeluk Budha : 61<br />\r\nJml WNA : 0<br />\r\n<br />\r\n15 tahun &ndash; 19 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 495 orang<br />\r\n20 tahun &ndash; 24 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 615 orang<br />\r\n25 tahun &ndash; 29 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 495 orang<br />\r\n30 tahun &ndash; 34 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 687 orang<br />\r\n35 tahun &ndash; 39 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 517 orang<br />\r\n40 tahun &ndash; 44 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 557 orang<br />\r\n45 tahun &ndash; 49 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 529 orang<br />\r\n50 tahun &ndash; 54 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 442 orang<br />\r\n55 tahun &ndash; 59 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 342 orang<br />\r\n60 tahun &ndash; 64 tahun&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;&nbsp; 309 orang<br />\r\n<br />\r\nJml Petani : 0<br />\r\nJml PNS : 253<br />\r\nJml TNI Polri : 19 <br />\r\nJml Buruh :1030<br />\r\nJml Pegawai Swasta : 752 <br />\r\nJml Wiraswasta : 999<br />\r\n<br />\r\n			\r\n', 'admin'),
(5, 'Batas Wilayah', 'Adapun batas-batas wilayah Kelurahan Empangsari adalah sebagai berikut :<br />\r\n<ol>\r\n	<li>Sebelah Utara&nbsp;&nbsp; &nbsp;&nbsp; : Kelurahan Tawangsari Kecamatan Tawang</li>\r\n	<li>Sebelah Timur&nbsp;&nbsp; &nbsp;&nbsp; : Kelurahan Lengkongsari Kecamatan Tawang</li>\r\n	<li>Sebelah Selatan : Kelurahan Kahuripan Kecamatan Tawang, Kelurahan Nagarawangi Kecamatan Cihideung</li>\r\n	<li>Sebelah Barat&nbsp;&nbsp; &nbsp;&nbsp; : Kelurahan Yudanegara Kecamatan Tawang<br />\r\n	</li>\r\n</ol>\r\n<br />\r\nKedudukan Kelurahan<br />\r\n<ul>\r\n	<li>Jarak dari Pusat Pemerintahan Kecamatan&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp; 2&nbsp;&nbsp; &nbsp;Km</li>\r\n	<li>Jarak dari Pusat Pemerintahan Kota&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp; 6&nbsp;&nbsp; &nbsp;Km</li>\r\n	<li>Jarak dari Ibu Kota Propinsi Jawa Barat (Bandung) :&nbsp; 126 &nbsp;&nbsp; &nbsp;Km</li>\r\n	<li>Jarak dari Ibu Kota Negara (Jakarta)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; :&nbsp; 365 &nbsp;&nbsp; &nbsp;Km			</li>\r\n</ul>\r\n', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'admin',
  `nama_lengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `nama_lengkap`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
