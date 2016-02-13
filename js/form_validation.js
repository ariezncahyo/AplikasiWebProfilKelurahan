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
document.getElementById("usernameError").style.display = "none"
document.getElementById("passwordError").style.display = "none"
  }
	
//form polling
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
	document.getElementById("vote_error").style.display = "none"
}

//cari berita	
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