var err_username = getElement("erUsername");
var err_password = getElement("erPassword");



function logValidation() {

    refresh();
    var hasError = false;

    var username = getElement("username").value;
    var password = getElement("password").value;

    if (isempty(username)) {
        hasError = true;
        err_username.innerHTML = "This Field is Empty";
    }
    if (isempty(password)) {
        hasError = true;
        err_password.innerHTML = "This Field is Empty";
    }
    return !hasError;
}

function getElement(id) {
    return document.getElementById(id);
}

function refresh() {
    err_username.innerHTML = "";
    err_password.innerHTML = "";

}

//empty check
function isempty(str) {
    if (str == "") {
        return true;
    }
    return false;
}