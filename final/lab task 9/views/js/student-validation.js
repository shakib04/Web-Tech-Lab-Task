function getElement(id) {
    return document.getElementById(id);
}

function studentValidation() {
    refresh();
    var sname = getElement("sname").value;
    var department = getElement("department").value;
    var cgpa = getElement("cgpa").value;
    var credit = getElement("credit").value;
    var dob = getElement("dob").value;

    var hasError = false;

    if (isEmpty(sname)) {
        hasError = true;
        errorFieldMessage("err_name", "sname", " This Field is Required");
    }
    if (isEmpty(cgpa)) {
        hasError = true;
        errorFieldMessage("err_cgpa", "cgpa", "This Field is Required");
    } else if (parseFloat(cgpa) != cgpa) {
        hasError = true;
        errorFieldMessage("err_cgpa", "cgpa", "Cgpa format is not correct");
    } else if (parseFloat(cgpa) > 4.00 || parseFloat(cgpa) < 0.00) {
        hasError = true;
        errorFieldMessage("err_cgpa", "cgpa", "Cgpa should in 0-4.00 range");
    }


    if (isEmpty(department)) {
        hasError = true;
        errorFieldMessage("err_dept", "department", "This Field is Required");
    } else if (parseFloat(department) != department) {
        hasError = true;
        errorFieldMessage("err_dept", "department", "department format is not correct");
    } else if (parseFloat(department) == -1) {
        hasError = true;
        errorFieldMessage("err_dept", "department", "Select a department First");
    }


    if (isEmpty(credit)) {
        hasError = true;
        errorFieldMessage("err_credit", "credit", "This Field is Required");
    } else if (parseFloat(credit) != credit) {
        hasError = true;
        errorFieldMessage("err_credit", "credit", "credit format is not correct");
    } else if (parseFloat(credit) > 200 || parseFloat(credit) < 0.00) {
        hasError = true;
        errorFieldMessage("err_credit", "credit", "credit should in 0-200 range");
    }


    if (isEmpty(dob)) {
        hasError = true;
        errorFieldMessage("err_dob", "dob", "This Field is Required");
    }

    return !hasError;
}

function refresh() {
    getElement("err_name").innerHTML = "";
    getElement("err_dept").innerHTML = "";
    getElement("err_cgpa").innerHTML = "";
    getElement("err_credit").innerHTML = "";
    getElement("err_dob").innerHTML = "";

    //remove class List

    getElement("sname").classList.remove("input-border-red");
    getElement("cgpa").classList.remove("input-border-red");
    getElement("credit").classList.remove("input-border-red");
    getElement("dob").classList.remove("input-border-red");
    getElement("department").classList.remove("input-border-red");
}

function isEmpty(str) {
    if (str == "") {
        return true;
    }
    return false;
}

//custom error message
function errorFieldMessage(id, inputField, message = "Error") {
    getElement(inputField).classList.add("input-border-red");
    getElement(id).innerHTML = message;
    getElement(id).style.color = "red";
    getElement(id).style.fontWeight = "bold";
}