<?php
$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    echo "<h2>User</h2>
          <input type=button value='Tambah User' onclick=\"window.location.href='?module=user&act=tambahuser';\">
          <table>
          <tr><th>no</th><th>username</th><th>nama lengkap</th><th>Blokir</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM users ORDER BY username");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		         <td align=center>$r[blokir]</td>
             <td><a href=?module=user&act=edituser&id=$r[username]>Edit</a> | 
	               <a href=$aksi?module=user&act=hapus&id=$r[username]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahuser":
    echo "<h2>Tambah User</h2>
          <form method=POST action='$aksi?module=user&act=input'>
          <table>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30></td></tr>  
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE username='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[username]'>
          <table>
          <tr><td>Username</td>     <td> : <input type=text name='username' value='$r[username]'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>";

    if ($r[blokir]=='N'){
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N </td></tr>";
    }
    else{
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Y  
                                           <input type=radio name='blokir' value='N'> N </td></tr>";
    }
    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
