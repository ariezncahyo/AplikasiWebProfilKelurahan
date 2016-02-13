<?php
/*echo("
<form id='table_login' name='table_login' method='post' action='php/login.php'>
<table>
<th colspan='3'>Login</th>
<tr>
  <td>User</td><td>:</td><td><input type='text' id='username' name='username' /></td>
</tr>
<tr>
  <td>Password</td><td>:</td><td><input type='password' id='password' name='password' /></td>
</tr>
<tr>
  <td colspan='3' align='center'><input type='submit' value='login' /></td>
</tr>
</table>
</form>");*/
$pesan=$_GET['pesan'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<form onSubmit='return checkForm();' method=post action='php/login.php'>
<?php echo("<b>$pesan</b>"); ?>
<span class=label>Name:</span><input type=text value='' id=username><br>
<div class=error id=nameError>Required: Please enter your name<br></div><br>
<span class=label>Email:</span><input type=text value='' id=password><br>
<div class=error id=emailError>Required: Please enter your email address<br></div><br>
<input type=submit value=Submit style='margin-left: 50px'>
</form>
</body>
</html>
