var err_name = getElement("erName");
var err_username = getElement("erUsername");
var err_email = getElement("erEmail");
var err_password = getElement("erPassword");
var err_contact = getElement("erContact");


function regValidation() {

    refresh();
    var hasError = false;
    var fullname = getElement("fullname").value;
    var username = getElement("username").value;
    var password = getElement("password").value;
    var email = getElement("email").value;
    var contact = getElement("contact").value;

    if (isempty(fullname)) {
        hasError = true;
        err_name.innerHTML = "This Field is Empty";
    } else if (checkNumberContains(fullname)) {
        hasError = true;
        err_name.innerHTML = "Number is not allowed";
    }
    if (isempty(username)) {
        hasError = true;
        err_username.innerHTML = "This Field is Empty";
    } else if (username.length <= 5) {
        hasError = true;
        err_username.innerHTML = "Usename must be 6 characters long";
    } else if (username.search(" ") > -1) {
        hasError = true;
        err_username.innerHTML = "Usename can not contain spaces ";
    }
    if (isempty(password)) {
        hasError = true;
        err_password.innerHTML = "This Field is Empty";
    } else if (password.length <= 7) {
        hasError = true;
        err_password.innerHTML = "Password must be 8 characters long";
    }
    if (isempty(email)) {
        hasError = true;
        err_email.innerHTML = "This Field is Empty";
    }else if (email.search("@") == -1) {
        hasError = true;
        err_email.innerHTML = "no @ at email";
    }
    if (isempty(contact)) {
        hasError = true;
        err_contact.innerHTML = "This Field is Empty";
    } else if (contact.length <= 10) {
        // || contact.length > 11
        hasError = true;
        err_contact.innerHTML = "Phone must be 11 characters ";
    } else if (parseFloat(contact) != contact) {
        hasError = true;
        err_contact.innerHTML = "Phone must have no alphabet";
    }
    //console.log(checkNumber(contact));


    return !hasError;
}


function getElement(id) {
    return document.getElementById(id);
}

function refresh() {
    err_name.innerHTML = "";
    err_username.innerHTML = "";
    err_email.innerHTML = "";
    err_password.innerHTML = "";
    err_contact.innerHTML = "";

}


//empty check

function isempty(str) {
    if (str == "") {
        return true;
    }
    return false;
}


//check number contains

function checkNumberContains(str) {
    for (let index = 0; index < str.length; index++) {
        let s = str[index];
        if (s == "1" || s == "2" || s == "3" || s == "4" || s == "5" || s == "6" || s == "7" || s == "8" || s == "9" || s == "0") {
            return true;
        }
    }

    return false;
 
}