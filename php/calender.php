<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<table width="200" border="0" bgcolor="#ffffff">
  <tr bgcolor="#b7d6ec">
  	<td><center><img src="images/banner_calender.png" width="195" height="35" /></center></td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
  <tr bgcolor="#b7d6ec">
  	<td><?php //bulan sekarang 
echo "<table class=widget cellspacing=2 cellpadding=2 width=100% bgcolor=white>
	  <tr><th class=ttl></th></tr><td class=basic>";
    

$month=date("m"); 
//Tahun sekarang 
$year=date("Y"); 
//hari ini 
$day=date("d"); 
//cek jumlah hari tahun sekarang 
$endDate=date("t",mktime(0,0,0,$month,$day,$year)); 
//style untuk table 
echo ' <style> td { font-size:11; font-family:verdana; } </style> '; 
//table untuk menulis tanggal sekarang 
echo '<table class=widget align="center" border="0" width="100%" cellpadding=2 cellspacing=1 style=""><tr><td align=center>'; 
echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year)); 
echo '</td></tr></table>'; 
//table untuk menulis hari 
echo ' <table class=widget align="center" border="0" width="100%" cellpadding=2 cellspacing=1 style="border:2px solid #CCCCCC"> <tr bgcolor="#EFEFEF"> <td align=center><font color=red>Su</font></td> <td align=center>Mo</td> <td align=center>Tu</td> <td align=center>We</td> <td align=center>Th</td> <td align=center>Fr</td> <td align=center><font color=blue>Sa</font></td></tr> '; 
/* mengecek tanggal 1 bulan sekarang ada pada hari ke berapa kemudian tambahkan cell td sebanyak var $s */ 
$s=date ("w", mktime (0,0,0,$month,1,$year)); 
for ($ds=1;$ds<=$s;$ds++) { 
echo "<td style=\"font-family:arial;color:#B3D9FF\" width=\"15%\" align=center valign=middle bgcolor=\"#b7d6ec\"> </td>";
 } 
//memulai penulisan tanggal
for ($d=1;$d<=$endDate;$d++) {  //jika nilai $d (tanggal) adalah hari minggu (0) dibuat baris baru <tr> 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; } 
//default warna huruf 
$fontColor="#000000"; 
//jika tanggal adalah hari minggu warna huruf merah 
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; } 
//jika tanggal adalah hari sabtu warna huruf biru 
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="blue"; } 
//menulis tanggal 
echo "<td style=\"font-family:arial;color:#331133\" width=\"15%\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>"; 
//jika tanggal adalah hari sabtu (6) akhiri baris </tr> 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; } } 
//akhir table 
echo '</table>'; 
    echo "</td></table>";?>
</td>
    <td bgcolor="#ffffff"></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
</table>
</body>
</html>
