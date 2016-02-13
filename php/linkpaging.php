<style type="text/css">
<!--
.style1 {color: #FF0000} 
-->
</style>

<center><b><span class="style1">
<?php

if(isset($_GET['blnthn_brt'])){
$almt_menu=$_GET['menu'];
$blnthn_brt=$_GET['blnthn_brt'];

if ($noPage > 1)
	echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."&menu=$almt_menu&blnthn_brt=$blnthn_brt'>&lt;&lt; Sebelumnya</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
  if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
  {   
    if (($showPage == 1) && ($page != 2))  
			echo "..."; 
    if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			echo "...";
    if ($page == $noPage) 
			echo " <b>".$page."</b> ";
    else 
			echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."&menu=$almt_menu&blnthn_brt=$blnthn_brt'>".$page."</a> ";
    $showPage = $page;          
  }
}

// menampilkan link next

if ($noPage < $jumPage) 
	echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."&menu=$almt_menu&blnthn_brt=$blnthn_brt'>Sebelumnya &gt;&gt;</a>";
}


elseif($menu=='berita' or $aksi=='detail'){
$almt_menu=$_GET['menu'];
$aksi=$_GET['aksi'];
$id=$_GET['id'];

if ($noPage > 1)
	echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."&menu=$almt_menu&aksi=$aksi&id=$id'>&lt;&lt; Sebelumnya</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
  if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
  {   
    if (($showPage == 1) && ($page != 2))  
			echo "..."; 
    if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			echo "...";
    if ($page == $noPage) 
			echo " <b>".$page."</b> ";
    else 
			echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."&menu=$almt_menu&aksi=$aksi&id=$id'>".$page."</a> ";
    $showPage = $page;          
  }
}

// menampilkan link next

if ($noPage < $jumPage) 
	echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."&menu=$almt_menu&aksi=$aksi&id=$id'>Selanjutnya &gt;&gt;</a>";
}

elseif(isset($_GET['menu'])){
$almt_menu=$_GET['menu'];

if ($noPage > 1)
	echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."&menu=$almt_menu'>&lt;&lt; Sebelumnya</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
  if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
  {   
    if (($showPage == 1) && ($page != 2))  
			echo "..."; 
    if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			echo "...";
    if ($page == $noPage) 
			echo " <b>".$page."</b> ";
    else 
			echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."&menu=$almt_menu'>".$page."</a> ";
    $showPage = $page;          
  }
}

// menampilkan link next

if ($noPage < $jumPage) 
	echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."&menu=$almt_menu'>Selanjutnya &gt;&gt;</a>";
}


?>
</center></b></span>