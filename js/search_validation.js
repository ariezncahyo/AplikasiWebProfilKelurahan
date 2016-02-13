function checkForm() {
	keyword = document.getElementById("keyword").value;
	
	if(keyword == ""){
		hideAllErrors();
		document.getElementById("keyword_kosong").style.display = "inline";
		document.getElementById("keyword").select();
		document.getElementById("keyword").focus();
		return false;
	}
	return true;
}

function hideAllErrors() {
document.getElementById("keyword_kosong").style.display = "none"
}

//------------------------- check form berita -----------------------
function checkBerita(){
	txtjudul = document.getElementById("txtjudul").value;
	txtpengirim = document.getElementById("txtpengirim").value;
	txtrating = document.getElementById("txtrating").value;
	if(txtjudul == ""){
		hideAllErrors_judul();
		document.getElementById("judulkosong").style.display = "inline";
		document.getElementById("txtjudul").select();
		document.getElementById("txtjudul").focus();
		return false;
	}
	else if(txtpengirim == ""){
		hideAllErrors_pengirim();
		document.getElementById("pengirimkosong").style.display = "inline";
		document.getElementById("txtpengirim").select();
		document.getElementById("txtpengirim").focus();
		return false;
	}
	return true;
}

function hideAllErrors_judul() {
	document.getElementById("judulkosong").style.display = "none"
}
function hideAllErrors_pengirim(){
	document.getElementById("pengirimkosong").style.display = "none"
}

//-------------------------- check form user ------------------------
function checkUser(){
	username = document.getElementById("username").value;
	password = document.getElementById("password").value;
	nama_lengkap = document.getElementById("nama_lengkap").value;
	
	if(username == ""){
	  hideAllErrors_username();
		document.getElementById("usernamekosong").style.display = "inline";
		document.getElementById("username").select();
		document.getElementById("username").focus();
		return false;
	}
	if(password == ""){
	  hideAllErrors_password();
		document.getElementById("passwordkosong").style.display = "inline";
		document.getElementById("password").select();
		document.getElementById("password").focus();
		return false;
	}
	if(nama_lengkap == ""){
	  hideAllErrors_nama();
		document.getElementById("nama_lengkapkosong").style.display = "inline";
		document.getElementById("nama_lengkap").select();
		document.getElementById("nama_lengkap").focus();
		return false;
	}
	return true;
}

function hideAllErrors_username(){
	document.getElementById("usernamekosong").style.display = "none"
}
function hideAllErrors_password(){
	document.getElementById("passwordkosong").style.display = "none"
}
function hideAllErrors_nama(){
	document.getElementById("nama_lengkapkosong").style.display = "none"
}