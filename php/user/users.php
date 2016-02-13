<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.txtusername.value == "")
{
   alert("Isi dulu username !");
   text_form.txtusername.focus();
   return (false);
}
if (text_form.txtpassword.value == "")
{
   alert("Isi dulu password !");
   text_form.txtpassword.focus();
   return (false);
}
if (text_form.txtnama_lengkap.value == "")
{
   alert("Isi dulu nama lengkap !");
   text_form.txtnama_lengkap.focus();
   return (false);
}
if (text_form.txtnama_lengkap.value == "")
{
   alert("Isi dulu nama lengkap !");
   text_form.txtnama_lengkap.focus();
   return (false);
}
return (true);
}
</script>
<?php
$dir="php/user/aksi_users.php";
switch($_GET[aksi]){
  // Tampil User
  default:
    echo ("<h1>Pengaturan Pengguna</h1>
	<span class='pesan'>".$_GET['pesan']."</span>
	<table class='data'>
      <tr>
				<td colspan='5'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=user&aksi=cariuser'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='username'>username</option>
						<option value='nama_lengkap'>nama lengkap</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>
			<tr><th>No</th><th>Username</th><th>Nama Lengkap</th><th>Level</th><th>Aksi</th></tr>"); 
		include('php/paging.php');
		$tampil=mysql_query("SELECT * FROM user where level='admin' ORDER BY username desc limit $offset, $dataPerPage");
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		$no=1;
		while ($r=mysql_fetch_array($tampil)){
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo ("<tr bgcolor='".$warna."'>
			<td align=center>$no</td>
				<td>$r[username]</td>
				<td>$r[nama_lengkap]</td>
				<td align=center>$r[level]</td>
				<td>
					<center><a href=?menu=user&aksi=editpass&id=$r[username]><img src='images/key.png' title='Ubah Pass' alt='Ubah Pass' width='14' height='14'></a>|
					<a href=$dir?menu=user&aksi=hapus&id=$r[username]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a>|<a href=?menu=user&aksi=detail&id=$r[username]><img src='images/detail.png' title='Detail' alt='Detail' width='14' height='14'></a></center>
				</td>
			</tr>");
			$no++;
			$counter++;
		}
    echo ("</table>
			<input type='image' src='images/tambahuser.png' title='Tambah Pengguna' alt='Tambah Pengguna' width='30' height='30' onclick=\"window.location.href='?menu=user&aksi=tambahuser';\" \><br /><br />");
		include('php/linkpaging.php');
  break;
	
	case "cariuser":
		echo ("<h1>Pengaturan Pengguna</h1>");
		$filter=$_GET['filter'];
		$keyword=$_GET['keyword'];
		include('php/paging.php');
		if ($filter=='username')
		{	$sql_user="SELECT * FROM user where level='admin' and username like '%$keyword%' ORDER BY username";
		}
		elseif ($filter=='nama_lengkap')
		{	$sql_user="SELECT * FROM user where level='admin' and nama_lengkap like '%$keyword%' ORDER BY username";
		}
		$tampil=mysql_query($sql_user);
		$row=mysql_num_rows($tampil);
		echo("
		<table class='data'>
      <tr>
				<td colspan='6'>
					<form onSubmit='return checkForm();' name='cari' method='post' action='$dir?menu=user&aksi=cariuser'>
					<b>Pencarian : </b>
					<select name='filter'>
						<option value='username'>username</option>
						<option value='nama_lengkap'>nama lengkap</option>
					</select>
					<input type='text' id='keyword' name='keyword' />
					<input type='image' src='images/cari.png' title='Cari' alt='Cari' width='20' height='17' \>
					<br /><div class='error' id='keyword_kosong'>Kata kunci harus diisi!<br></div>
					</form>
				</td>
			</tr>");
			if($row > 0){
			echo("
			<tr><th>No</th><th>Username</th><th>Nama Lengkap</th><th>Level</th><th>Aksi</th></tr>"); 
			
		
		$no=1;
		$warnaGenap = "#d3e4f0";   // warna tua
        $warnaGanjil = "#eaf3f9";  // warna muda
		$counter = 1;
		while ($r=mysql_fetch_array($tampil)){
			if ($counter % 2 == 0) $warna = $warnaGenap;
			else $warna = $warnaGanjil;
			echo ("<tr bgcolor='".$warna."'>
				<td align=center>$no</td>
				<td>$r[username]</td>
				<td>$r[nama_lengkap]</td>
				<td>$r[level]</td>
				<td>
					<center><a href=?menu=user&aksi=editpass&id=$r[username]><img src='images/key.png' title='Ubah Pass' alt='Ubah Pass' width='14' height='14'></a>|
					<a href=$dir?menu=user&aksi=hapus&id=$r[username]><img src='images/delete.png' title='Hapus' alt='Hapus' width='14' height='14'></a>|<a href=?menu=user&aksi=detail&id=$r[username]><img src='images/detail.png' title='Detail' alt='Detail' width='14' height='14'></a></center>
				</td>
			</tr>");
			$no++;
			$counter++;
		}
    echo ("</table>
			<input type='image' src='images/tambahuser.png' title='Tambah Pengguna' alt='Tambah Pengguna' width='30' height='30' onclick=\"window.location.href='?menu=user&aksi=tambahuser';\" \>
			&nbsp;&nbsp;<a href=?menu=user><img src='images/showall.png' title='Tampilkan Semua' alt='Tampilkan Semua' width='30' height='30' border='0' /></a><br />".$_GET['pesan']);
	}else{
		echo ("</table>");
		echo "<p>Data tidak ditemukan !</p>";
	}
  break;
  
  case "tambahuser":
    echo ("<h1>Tambah Pengguna</h1>
          <form name=text_form onsubmit='return Blank_TextField_Validator()' method='POST' action='$dir?menu=user&aksi=input'>
		  ".$_GET['pesan']."
          <table>
          <tr><td>Username</td>     <td colspan='3'> : <input type=text id='txtusername' name='txtusername'>
						<br /><div class='error' id='usernamekosong'>username harus diisi!<br></div></td></tr>
          <tr><td>Password</td>     <td colspan='3'> : <input type=password id='txtpassword' name='txtpassword'>
						<br /><div class='error' id='passwordkosong'>password harus diisi!<br></div></td></tr>
          <tr><td>Nama Lengkap</td> <td colspan='3'> : <input type=text id='txtnama_lengkap' name='txtnama_lengkap' size=30>
						<br /><div class='error' id='nama_lengkapkosong'>nama lengkap harus diisi!<br></div></td></tr>
		  <tr><td>Level</td> <td colspan='3'> : admin
						</td></tr>
          </table>
						<input type='image' src='images/simpan.png' title='Simpan' alt='Simpan' width='30' height='30' \>&nbsp;&nbsp;
						<a href=?menu=user><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0'></a>
					<br />
          </form>");
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM user WHERE username='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo ("<h1>Ubah Pengguna</h1>
	<form method=POST action=$dir?menu=user&aksi=update name=text_form onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[username]'>
          <table>
          <tr><td>Username</td>     <td colspan='3'> : <input type=text name='username' value='$r[username]'></td></tr>
          <tr><td>Nama Lengkap</td> <td colspan='3'> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>");

    echo ("
			</table>
				<input type='image' src='images/simpan.png' title='Update' alt='Update' width='30' height='30' \>&nbsp;&nbsp;
				<a href=?menu=user><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
			<br />".$_GET['pesan']."
      </form>");
    break; 
		
	case "editpass":
		$query_editpass=mysql_query("select * from user where username='$_GET[id]'");
		$hasil_query_editpass=mysql_fetch_array($query_editpass);
		echo("<h1>Ubah Password</h1>
			<form method='post' action='$dir?menu=user&aksi=updatepass'>
			".$_GET['pesan']."
			<input type='hidden' name='id' value='$hasil_query_editpass[username]'>
			<input type='hidden' name='lama' value='$hasil_query_editpass[password]'>
			<table>
			<tr><td>Username</td><td>:</td><td>".$hasil_query_editpass['username']."</td></tr>
			<tr><td>Password lama</td><td>:</td><td><input type='password' name='passlama' /></td></tr>
			<tr><td>Password baru</td><td>:</td><td><input type='password' name='passbaru' /></td></tr>
			<tr><td>Konfirmasi Password baru</td><td>:</td><td><input type='password' name='confirm_passbaru' /></td></tr>
			</table>					
				<input type='image' src='images/simpan.png' title='Update' alt='Update' width='30' height='30' />&nbsp;&nbsp;
				<a href=?menu=user><img src='images/cancel.png' title='Batal' alt='Batal' width='30' height='30' border='0' /></a>
			<br />
			</form>");
	break;
	
	case "detail":
		echo("<h1>Detail Pengguna</h1>
		".$_GET['pesan']."<table class=data>");
		$tampil=mysql_query("SELECT * FROM user where username='$_GET[id]'");
		$r=mysql_fetch_array($tampil);
			echo ("
			<tr><td>Nama Pengguna</td><td>: $r[username]</td></tr>
			<tr><td>Nama Lengkap</td><td>: $r[nama_lengkap]</td></tr>
			<tr><td>Level</td><td>: $r[level]</td></tr>");    
    echo ("</table>
		<a href=?menu=user&aksi=edituser&id=$r[username]><img src='images/edituser.png' title='Ubah Pengguna' alt='Ubah Pengguna' width='30' height='30' border='0' /></a>&nbsp;&nbsp;
		<a href=?menu=user><img src='images/back.png' title='Kembali' alt='Kembali' width='30' height='30' border='0' /></a>");
	break;
			
}
?>
