<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link type="text/css" href="css/style.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="js/validation.js"></script>
	<title>Kelurahan Empangsari Kota Tasikmalaya</title>
	<link rel="shortcut icon" href="images/kotatasik2.jpg" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Begin Vista-Buttons.com HEAD SECTION id=vbUL_wp36t-->
	<link href="menu_atas-files/styles_wp36t.css" type="text/css" rel="stylesheet"/>
	<style type="text/css">A#vbUL_wp36ta{display:none}</style>
	<!-- End Vista-Buttons.com HEAD SECTION -->
<script language="javascript" type="text/javascript">
    tinyMCE_GZ.init({
    plugins : 'style,layer,table,save,advhr,advimage, ...',
		themes  : 'simple,advanced',
		languages : 'en',
		disk_cache : true,
		debug : false
});
</script>
<script language="javascript" type="text/javascript"
src="tinymcpuk/tiny_mce_src.js"></script>
<script type="text/javascript">
tinyMCE.init({
		mode : "textareas",
		theme : "simple",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
</head>
<body>
	<div id="container">
		<div id="banner" >
			<img src="images/header.jpg" title="Profil Kelurahan Empangsari" />
		</div>
		<div id="menu">
			<?php include("php/menu_atas.php"); ?>
		</div>
		
	<div id="left">
	

			<div id="login"></div>
    <ul>
		<table width="200" border="0" bgcolor="#b7d6ec">
  <tr bgcolor="#ffffff">
  	<td >&nbsp;</td>
    <td colspan="2"><center>
      <img src="images/banner_menu.png" width="200" height="40" />
    </center></td>
  </tr>
</table>
		<?php include('php/menu.php'); ?>  
	
	<li><b><a href='php/logout.php'>&raquo; Logout</a></b></li>
	</ul>
	<div id="login"></div>
	</div>
<div id="right">
		<div id="login"> 
		<?php include("php/calender.php"); ?>
		</div>
	</div>	
	<div id="content">
	<?php include ("php/content2.php"); ?>
	</div>
 	<div id="footer"></div>
</div>
</body>
</html>