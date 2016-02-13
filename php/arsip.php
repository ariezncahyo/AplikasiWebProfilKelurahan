<table width="200" border="0" bgcolor="#ffffff">
  <tr bgcolor="#b7d6ec">
  	<td><center><img src="images/banner_arsip.png" width="195" height="35" /></center></td>
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
  <tr bgcolor="#b7d6ec">
  	<td><?php 	
	include "connect.php"; 
	//arsip berita
	$qry_arsp_brt = "SELECT DISTINCT date_format(date, '%M %Y') as blnthn_brt FROM news";
	$hsl_arsp_brt = mysql_query($qry_arsp_brt);
	echo "<table class='widget'><tr><th></th></tr>
	<tr><td><ul>";
	while ($dt_arsp_brt = mysql_fetch_array($hsl_arsp_brt))
	{
		echo "<li><a href='?menu=berita&blnthn_brt=".$dt_arsp_brt['blnthn_brt']."'>".$dt_arsp_brt['blnthn_brt']."</a></li>";
	}
	echo "</ul></td></tr></table>";?>
</td>
    <td bgcolor="#ffffff"></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td bgcolor="#ffffff">&nbsp;</td>
  </tr>
</table>