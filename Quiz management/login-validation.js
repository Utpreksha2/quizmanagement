function validateLogin(){
	var username = document.getElementById("uname");
	var passwd = document.getElementById("pwd");
	if(username.value.trim()==""){
		alert("Username can not be empty!");
		username.focus();
		return false;
		
	}
	else if(passwd.value.trim() ==""){
		alert("Password can not be empty!");
		passwd.focus();
		return false;
	}
	
	else if(username.value.toLowerCase() !="admin"){
		alert("Invalid username");
		username.focus();
		return false;
	}
	else if(passwd.value !="admin")
	{
		alert("Invalid password!");
		passwd.focus();
		return false;
	}
	else{
		window.location.href = "HomePage.html";
		return true;
	}
}