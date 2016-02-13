<?php
session_start();
$dir="php/user/aksi_ubah_akun.php";
switch($_GET[aksi]){
  // Tampil User
  default:
    echo ("<h1>Ubah Akun</h1>
	<span class='pesan'>".$_GET['pesan']."</span>
	<table class='data'>
			<tr><th>Username</th><th>Nama Lengkap</th><th>Aksi</th></tr>"); 
		$tampil=mysql_query("SELECT * FROM user where username='$_SESSION[username]'");
		while ($r=mysql_fetch_array($tampil)){
			echo ("<tr>
				<td>$r[username]</td>
				<td>$r[nama_lengkap]</td>
				<td>
					<center><a href=?menu=ubahakun&aksi=ubahpass_akun&id=$r[username]><img src='images/key.png' title='Ubah Pass' alt='Ubah Pass' width='14' height='14'></a></center>
				</td>
			</tr>");
		}
    echo ("</table>");
  break;
	
	case "detail":
		echo("<h1>Detail Akun</h1>
		<span class='pesan'>".$_GET['pesan']."</span>
		<table class='data'>");
		$tampil=mysql_query("SELECT * FROM user where username='$_SESSION[username]'");
		$r=mysql_fetch_array($tampil);
			echo ("
			<tr><th>Username</th><td>$r[username]</td></tr>
			<tr><th>Nama Lengkap</th><td>$r[nama_lengkap]</td></tr>
			<tr><th>Level</th><td>$r[level]</td></tr>");
    echo ("</table>
		
		<a href=?menu=ubahakun><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
	break;
   
  case "ubahuser_akun":
    $edit=mysql_query("SELECT * FROM user WHERE username='$_SESSION[username]'");
    $r=mysql_fetch_array($edit);

    echo ("<h1>Ubah Akun</h1>
	<span class='pesan'>".$_GET['pesan']."</span>
	<form method=POST action=$dir?menu=ubahakun&aksi=update>
          <input type=hidden name=id value='$r[username]'>
          <table class='data'>
          <tr><th>Username</th>     <td><input type=text name='username' value='$r[username]'></td></tr>
          <tr><th>Nama Lengkap</th> <td><input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
					<tr><th>Level</th><td>$r[level]</td></tr>");
    
    echo ("</table>
			<input type='image' src='images/simpan.png' title='Update' alt='Update' width='30' height='30' \>&nbsp;&nbsp;
      <a href=?menu=ubahakun><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
      </form>");
    break; 
		
	case "ubahpass_akun":
		$query_editpass=mysql_query("select * from user where username='$_SESSION[username]'");
		$hasil_query_editpass=mysql_fetch_array($query_editpass);
		echo("<h1>Ubah Password</h1>
			<span class='pesan'>".$_GET['pesan']."</span>
			<form method='post' action='$dir?menu=ubahakun&aksi=updatepass'>
			<input type='hidden' name='id' value='$hasil_query_editpass[username]'>
			<input type='hidden' name='lama' value='$hasil_query_editpass[password]'>
			<table class='data'>
			<tr><th>Username</th><td>".$hasil_query_editpass['username']."</td></tr>
			<tr><th>Password lama</th><td><input type='password' name='passlama' /></td></tr>
			<tr><th>Password baru</th><td><input type='password' name='passbaru' /></td></tr>
			<tr><th>Konfirmasi Password baru</th><td><input type='password' name='confirm_passbaru' /></td></tr>
			</table>
			<input type='image' src='images/simpan.png' title='Update' alt='Update' width='30' height='30' \>&nbsp;&nbsp;
				<a href=?menu=ubahakun><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
			</form>");
	break;
			
}
?>
