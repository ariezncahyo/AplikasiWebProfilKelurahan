<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" href="css/style.css" rel="stylesheet" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Login</title>
</head>
<table width="200" border="0" bgcolor="#b7d6ec">
  <tr bgcolor="#ffffff">
  	<td >&nbsp;</td>
    <td colspan="2"><center><img src="login_header.png" width="200" height="40"></center></td>
  </tr>
  <tr>
  	<td rowspan="2" bgcolor="#ffffff">&nbsp;</td>
    <td width="55"><center><img src="user.png"</center></td>
    <td width="124"><form onSubmit='return checkForm_login();' method='post' action='php/login.php'>
				<font face="Comic Sans MS" size="-1">Username:</font>
				<input type='text' value='' id='username' name='username' size="18">
				<div class='error' id='usernameError'>Username harus diisi!<br></div>
				<font face="Comic Sans MS" size="-1">Password:</font>
				<input type='password' value='' id='password' name='password' size="18"><br />
				<div class='error' id='passwordError'>Password harus diisi!<br></div>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type='submit' value='Login' style='margin-left: 0px'>
				<input name="Keluar" type="reset" class="button" id="Keluar2" value="Batal" tabindex="4" onClick="keluar()">
			<Br/>&nbsp;</form></td>
  </tr>
</table>
<body>
</body>
</html>
