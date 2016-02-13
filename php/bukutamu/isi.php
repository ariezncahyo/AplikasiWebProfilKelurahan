<?php

mysql_connect("localhost","root","danger");
mysql_select_db("bukutamu");

$query = "SELECT * FROM guestbook ORDER BY id DESC";
$hasil = mysql_query($query);
while($data = mysql_fetch_array($hasil))
{
$komentar = $data['komentar'];
$komentar = str_replace(":-)", "<img src=\"smiley/1.gif\">", $komentar);
$komentar = str_replace(":-(", "<img src=\"smiley/2.gif\">", $komentar);
$komentar = str_replace(";-)", "<img src=\"smiley/3.gif\">", $komentar);
$komentar = str_replace(";-D", "<img src=\"smiley/4.gif\">", $komentar);
$komentar = str_replace(";;-)", "<img src=\"smiley/5.gif\">", $komentar);
$komentar = str_replace("<:D>", "<img src=\"smiley/6.gif\">", $komentar);

echo "<table>";
echo "<tr><td>Nama</td><td> :</td><td> ".$data['nama']."</td></tr>";
echo "<tr><td>Email</td><td> : </td><td><a href=mailto:".$data['email'].">".$data['email']."</a></td></tr>";
echo "<tr><td>Tanggal Kirim</td><td> : </td><td>".$data['tanggal']."</td></tr>";
echo "<tr><td>URL</td><td> : </td><td><a href=".$data['url'].">".$data['url']."</a></td></tr>";
echo "<tr><td>Komentar</td><td> : </td><td>".$komentar."</td></tr>";
echo "</table><hr>";
}
?>