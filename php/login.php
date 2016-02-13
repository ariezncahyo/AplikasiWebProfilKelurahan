<?php
session_start();
include("connect.php");
 
$username = $_POST['username'];
$password = md5($_POST['password']);
 
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
 
if($data['password']==$password)
{

    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
	$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
	if($data['level']=="guru"){
	$query1 = "SELECT * FROM guru WHERE nip = '$username'";
	$hasil1 = mysql_query($query1);
	$data1 = mysql_fetch_array($hasil1);
	$_SESSION['nip'] = $data1['nip'];
	$_SESSION['namaguru'] = $data1['nama_guru'];
	}elseif($data['level']=="siswa"){
	$query2 = "SELECT * FROM siswa WHERE nis = '$username'";
	$hasil2 = mysql_query($query2);
	$data2 = mysql_fetch_array($hasil2);
	$_SESSION['nis'] = $data2['nis'];
	$_SESSION['namasiswa'] = $data2['nama_siswa'];
	$_SESSION['id_kelas'] = $data2['id_kelas'];
	}
    header('location:../main.php?menu=home');
		exit();
	
}
else{
	header('location:../index.php?pesan=Username/Password salah!');
	echo "<script type='JavaScript'>alert('Cicing');</script>";
	exit();
	
	}
?>