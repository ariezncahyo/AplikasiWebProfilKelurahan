//-------------------------- form login --------------------------
function checkForm_login() {
username = document.getElementById("username").value;
  password = document.getElementById("password").value;
 
  if (username == "") {
  hideAllErrors_login();
document.getElementById("usernameError").style.display = "inline";
document.getElementById("username").select();
document.getElementById("username").focus();
  return false;
  } else if (password == "") {
hideAllErrors_login();
document.getElementById("passwordError").style.display = "inline";
document.getElementById("password").select();
document.getElementById("password").focus();
  return false;
  }
  return true;
  }
 
  function hideAllErrors_login() {
document.getElementById("usernameError").style.display = "none";
document.getElementById("passwordError").style.display = "none";
  }
	
//--------------------------------- form polling -------------------------
function checkForm_polling() {
	var counter;
	var radio_pilihan = false;
	var c = document.form_polling;
	
	for (counter = 0; counter < c.vote.length; counter++){
		if(c.vote[counter].checked){
			radio_pilihan = true;
			return true;
		}
	}
	if(!radio_pilihan){
		hideAllErrors_polling();
		document.getElementById("vote_error").style.display = "inline";
		return false;
	}
}

function hideAllErrors_polling(){
	document.getElementById("vote_error").style.display = "none";
}

//--------------------------- pencarian berbagai form ----------------------
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
document.getElementById("keyword_kosong").style.display = "none";
}

//-------------------------- pencarian multikategori------------------------
/*function check_search_komen(){
	pengirim = document.getElementById("txtpengirim_komen").value;
	tanggal = document.getElementById("txttanggal_komen").value;
	if( document.getElementById("pengirim_komen").checked){
		if( pengirim==""){
			hideAllErrors_search_komen();
			document.getElementById("keyword_komen_kosong").style.display = "inline";
			document.getElementById("txtpengirim_komen").select();
			document.getElementById("txtpengirim_komen").focus();
			return false;
		}
	}
	if( document.getElementById("tanggal_komen").checked){
		if(tanggal==""){
			hideAllErrors_search_komen();
			document.getElementById("keyword_komen_kosong").style.display = "inline";
			document.getElementById("txttanggal_komen").select();
			document.getElementById("txttanggal_komen").focus();
			return false;
		}
	}
	if( (document.getElementById("pengirim_komen").checked =="false") and (document.getElementById("tanggal_komen").checked =="false")){
		hideAllErrors_search_komen();
		document.getElementById("keyword_komen_kosong").style.display = "inline";
		return false;
	}
	return true;
}

function hideAllErrors_search_komen(){
	document.getElementById("keyword_komen_kosong").style.display = "none";
}*/

//------------------------- check form berita -----------------------
function checkBerita(){
	txtjudul = document.getElementById("txtjudul").value;
	txtpengirim = document.getElementById("txtpengirim").value;
	txtrating = document.getElementById("txtrating").value;
	txtberita= document.getElementById("txtberita").value;
	if(txtjudul == ""){
		hideAllErrors_berita();
		document.getElementById("judulkosong").style.display = "inline";
		document.getElementById("txtjudul").select();
		document.getElementById("txtjudul").focus();
		return false;
	}
	else if(txtpengirim == ""){
		hideAllErrors_berita();
		document.getElementById("pengirimkosong").style.display = "inline";
		document.getElementById("txtpengirim").select();
		document.getElementById("txtpengirim").focus();
		return false;
	}
	else if(txtberita == ""){
		hideAllErrors_berita();
		document.getElementById("beritakosong").style.display = "inline";
		document.getElementById("beritakosong").select();
		document.getElementById("beritakosong").focus();
		return false;
	}
	return true;
}

function hideAllErrors_berita() {
	document.getElementById("judulkosong").style.display = "none";
	document.getElementById("pengirimkosong").style.display = "none";
	document.getElementById("beritakosong").style.display = "none";
}

//-------------------------- check form user ------------------------
function checkUser(){
	txtusername = document.getElementById("txtusername").value;
	txtpassword = document.getElementById("txtpassword").value;
	txtnama_lengkap = document.getElementById("txtnama_lengkap").value;
	txtemail = document.getElementById("txtemail").value;
	txtalamat = document.getElementById("txtalamat").value;
	txttelp = document.getElementById("txttelp").value;
	
	if(txtusername == ""){
	  hideAllErrors_user();
		document.getElementById("usernamekosong").style.display = "inline";
		document.getElementById("txtusername").select();
		document.getElementById("txtusername").focus();
		return false;
	}
	if(txtpassword == ""){
	  hideAllErrors_user();
		document.getElementById("passwordkosong").style.display = "inline";
		document.getElementById("txtpassword").select();
		document.getElementById("txtpassword").focus();
		return false;
	}
	if(txtnama_lengkap == ""){
	  hideAllErrors_user();
		document.getElementById("nama_lengkapkosong").style.display = "inline";
		document.getElementById("txtnama_lengkap").select();
		document.getElementById("txtnama_lengkap").focus();
		return false;
	}
	if(txtemail == ""){
	  hideAllErrors_user();
		document.getElementById("emailkosong").style.display = "inline";
		document.getElementById("txtemail").select();
		document.getElementById("txtemail").focus();
		return false;
	}
	if(txtalamat == ""){
	  hideAllErrors_user();
		document.getElementById("alamatkosong").style.display = "inline";
		document.getElementById("txtalamat").select();
		document.getElementById("txtalamat").focus();
		return false;
	}
	if(txttelp == ""){
	  hideAllErrors_user();
		document.getElementById("telpkosong").style.display = "inline";
		document.getElementById("txttelp").select();
		document.getElementById("txttelp").focus();
		return false;
	}
	return true;
}

function hideAllErrors_user(){
	document.getElementById("usernamekosong").style.display = "none";
	document.getElementById("passwordkosong").style.display = "none";
	document.getElementById("nama_lengkapkosong").style.display = "none";
	document.getElementById("emailkosong").style.display = "none";
	document.getElementById("alamatkosong").style.display = "none";
	document.getElementById("telpkosong").style.display = "none";
}

//------------------------------ check file upload -------------------
function checkupload(){
	upload_file = document.getElementById("upload_file").value;
	
	if(upload_file == ""){
		hideAllErrors_upload();
		document.getElementById("file_kosong").style.display = "inline";
		return false;
	}
	return true;
}

function hideAllErrors_upload(){
	document.getElementById("file_kosong").style.display = "none";
}

/*var ubah = false;
function show_pil()
{
   var n = document.form_poll.jml_pil.value; //dwdwdw
   var i;
   var string = "";
   
   for (i=1; i<=n; i++)
   {
      string = string + "Question "+ i +"<input type='text' id='field["+i+"]' name='field["+i+"]' size='40' value='' /><br />";
   }
   document.getElementById('pil').innerHTML = string;
	 ubah = true;
}*/

//------------------------------ check pertanyaan polling -----------------
function check_atur_polling(){
	/*if(!ubah){
		hideAllErrors_atur_polling();
		document.getElementById("belum_pilih").style.display = "inline";
		return false;
	}*/
	
	question = document.getElementById("question").value;
	
	/*var counter;
	var pilihan = false;
	var jml_pil = document.getElementById("jml_pil").value;*/
	
	if(question == ""){
		hideAllErrors_atur_polling();
		document.getElementById("question_kosong").style.display = "inline";
		return false;
	}
	/*for (counter = 1; counter <= jml_pil; counter++){
		if(document.getElementById("field"+counter).value == ""){
			hideAllErrors_atur_polling();
			document.getElementById("pilihan_kosong").style.display = "inline";
			return false;
		}
	}*/
	return true;
}

function hideAllErrors_atur_polling(){
	/*document.getElementById("belum_pilih").style.display = "none";*/
	document.getElementById("question_kosong").style.display = "none";
	/*document.getElementById("pilihan_kosong").style.display = "none";*/
}

//------------------------------ check pilihan polling ---------------------
/*function check_pil_polling() {
	var counter;
	var pilihan = false;
	var jml_pil = document.getElementById("jml_pil").value;
	
	for (counter = 1; counter <= jml_pil; counter++){
		if(document.getElementById("field"+counter).value == ""){
			pilihan = true;
			return true;
		}
	}
	if(!pilihan){
		hideAllErrors_pil_polling();
		document.getElementById("pilihan_kosong").style.display = "inline";
		return false;
	}
}

function hideAllErrors_pil_polling(){
	document.getElementById("pilihan_kosong").style.display = "none";
}*/