function formValidation() {
    var uid = document.registration.userid;
    var passid = document.registration.passid;
    var uname = document.registration.name;
    var uadd = document.registration.address;
    //var ucountry = document.registration.country;
   // var uzip = document.registration.zip;
   var lstClg = document.getElementById("lstCollege");
    var uemail = document.registration.email;
    if (userid_validation(uid, 5, 12)) {
        if (passid_validation(passid, 7, 12)) {
            if (allLetter(uname)) {
               // if (alphanumeric(uadd)) {
                    //if (countryselect(ucountry)) {
                        //if (allnumeric(uzip)) {
						if(validateCollegeDropDown(lstClg)){
                            if (ValidateEmail(uemail)) {
                                if (validsex()) {}
                            }
						}
                        //}
                    //}
                //}
            }
        }
    }
    return false;

}

function userid_validation(uid, mx, my) {
    var uid_len = uid.value.length;
	if(uid_len <=0){
	 alert("UserId cannot be empty!");	
	 uid.focus();
	 return false;
	}
    else if (uid_len == 0 || uid_len >= my || uid_len < mx) {
        alert("UserId length be between " + mx + " to " + my);
        uid.focus();
        return false;
    }
    return true;
}

function validateCollegeDropDown(lstClg){
	if(lstClg.selectedIndex  == "0"){
		alert('Select your college from the list');
        lstClg.focus();
        return false;
	}
	return true;
}

function passid_validation(passid, mx, my) {
    var passid_len = passid.value.length;
	if(passid <=0){
	 alert("Password cannot be empty!");	
	 passid.focus();
	 return false;
	}
    else if (passid_len == 0 || passid_len >= my || passid_len < mx) {
        alert("Password should not be empty / length be between " + mx + " to " + my);
        passid.focus();
        return false;
    }
    return true;
}

function allLetter(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters)) {
        return true;
    } else {
        alert('Username must have alphabet characters only');
        uname.focus();
        return false;
    }
}

function alphanumeric(uadd) {
    var letters = /^[0-9a-zA-Z]+$/;
    if (uadd.value.match(letters)) {
        return true;
    } else {
        alert('User address must have alphanumeric characters only');
        uadd.focus();
        return false;
    }
}

function countryselect(ucountry) {
    if (ucountry.value == "Default") {
        alert('Select your country from the list');
        ucountry.focus();
        return false;
    } else {
        return true;
    }
}

function allnumeric(uzip) {
    var numbers = /^[0-9]+$/;
    if (uzip.value.match(numbers)) {
        return true;
    } else {
        alert('ZIP code must have numeric characters only');
        uzip.focus();
        return false;
    }
}

function ValidateEmail(uemail) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.value.match(mailformat)) {
        return true;
    } else {
        alert("You have entered an invalid email address!");
        uemail.focus();
        return false;
    }
}

function validsex() {
	var rdoMale = document.getElementById("male");
	var rdoFeMale = document.getElementById("female");
	var x =0;
    if (rdoMale.checked) {
		x++;
    }
    if (rdoFeMale.checked) {
		x++;
    }
	
	if(x==0){
		alert('Select Male/Female');
	return false;
	}
	else {
        alert('Form Succesfully Submitted');
        window.location.reload()
        return true;
    }
}