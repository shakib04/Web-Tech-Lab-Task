<?php

require_once "../models/db-conn.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}

$err_fullname = $err_username = $err_password = $err_email = "";
$fullname = $username = $password = $email = "";

$validCountReg = 0;

if (isset($_POST['register'])) {

    //fullname validation 1

    if (empty(trim($_POST['fullname']))) {
        $err_fullname = "<span style='color:red;'> Name is Required </span>";
    } else {
        $fullname = htmlspecialchars($_POST['fullname']);
        $validCountReg++;
    }


    //username validation 2

    if (empty(trim($_POST['username']))) {
        $err_username = "<span style='color:red;'>Username is Required</span>";
    } elseif (strlen($_POST['username']) < 5) {
        $err_username = "Username must be 5 Charectors Long";
    } elseif (strlen($_POST['username']) > 10) {
        $err_username = "Username cannot be more than 10 Charectors Long";
    } elseif (strpos($_POST['username'], " ")) {
        $err_username = "Space is not Allowed";
    } else {
        $username = validate($_POST['username']);
        $validCountReg++;
    }



    //password validation 3

    if (empty(trim($_POST['password']))) {
        $err_password = "<span style='color:red;'> Password is Required </span>";
    } elseif (strlen($_POST['password']) < 8) {
        $err_password = "<span style='color:red;'>Password must contain at least 8 character </span>";
    } elseif (!strpos($_POST['password'], "1")) {
        $err_password = "<span style='color:red;'>Password must contain 1 number  </span>";
    } elseif (ctype_upper($_POST['password'])) {
        $err_password = "<span style='color:red;'>Password must contain 1 Lowercase  </span>";
    } elseif (ctype_lower($_POST['password'])) {
        $err_password = "<span style='color:red;'>Password must contain 1 Uppercase  </span>";
    } else {
        $password = validate($_POST['password']);
        $validCountReg++;
    }

    //email validation 4

    if (empty(trim($_POST['email']))) {
        $err_email = "<span style='color:red;'> Email is Required </span>";
    } elseif (strpos($_POST['email'], " ")) {
        $err_email = "<span style='color:red;'> Space is not Allowed </span>";
    } elseif (!strpos($_POST['email'], "@")) {
        $err_email = "<span style='color:red;'> Email is not valid. No [@] </span>";
    } elseif (strpos($_POST['email'], "@")) {
        $atRatePos = strpos($_POST['email'], "@");

        $tempEmail = $_POST['email'];
        $hasDot = false;

        for ($i = $atRatePos; $i < strlen($tempEmail); $i++) {
            if ($tempEmail[$i] == ".") {
                $hasDot = true;
                break;
            }
        }

        if ($hasDot) {
            $email = htmlspecialchars($_POST['email']);
            $validCountReg++;
        } else {
            $err_email = "<span style='color:red;'> Email is not valid </span>";
        }
    }

    if ($validCountReg == 4) {
        AddUser($fullname, $username, $email, $password);
    }
}

function AddUser($fullname, $username, $email, $password)
{
    $password = md5($password);
    $sqlAddUser = "INSERT INTO `reg_user` (`username`, `fullname`, `password`, `email`) VALUES ('$username', '$fullname', '$password', '$email');";
    if (dbOperation($sqlAddUser)) {
        header("location:login.php");
    }
}



$validaLogin = 0;


if (isset($_POST['login'])) {

    //username validation 1

    if (empty(trim($_POST['username']))) {
        $err_username = "<span style='color:red;'>Username is Required</span>";
    } else {
        $username = validate($_POST['username']);
        $validaLogin++;
    }
    //password validation 2

    if (empty(trim($_POST['password']))) {
        $err_password = "<span style='color:red;'> Password is Required </span>";
    } else {
        $password = validate($_POST['password']);
        $validaLogin++;
    }

    if ($validaLogin == 2) {
        loginUser($username, $password);
    }
}

function loginUser($username, $password)
{
    $sqlLogin = "select * from admin where username='$username' and password = '$password'";
    if (count(getValues($sqlLogin)) == 1) {
        header("location:dashboard.php");
    } else {
        echo "invalid id and pass";
    }
}
