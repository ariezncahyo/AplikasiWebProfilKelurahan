<?php

$server="localhost";
$username="root";
$password="";
$database="empangsari";

$konek = mysql_connect("$server","$username","$password") or die("Koneksi ke MySQL gagal");
mysql_select_db("$database") or die("Koneksi ke database gagal");

?>