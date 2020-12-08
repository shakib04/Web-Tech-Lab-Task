<?php

//INSERT INTO `all_users` (`username`, `fullname`, `password`, `email`, `contact`) VALUES ('s1', 'shakib', '1', 's@g.c', '2323');

require_once "../model/db-conn.php";
u$err_username = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contactNumber'];


    if (newUser($username)) {
        AddUser($fullname, $username, $email, $password, $contact);
    } else {
        $err_username = "Username already exists";
    }
}

function newUser($username)
{
    $sqlFindUser = "select * from all_users where username='$username'";
    if (count(getValues($sqlFindUser)) >= 1) {
        return false;
    }
    return true;
}



function AddUser($fullname, $username, $email, $password, $contact)
{
    $password = md5($password);
    $sqlAddUser = "INSERT INTO `all_users` (`username`, `fullname`, `password`, `email`, `contact`) VALUES ('$username', '$fullname', '$password', '$email', '$contact');";
    if (dbOperation($sqlAddUser)) {
        //header("location:login.php");
    }
}


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    loginUser($username, $password);
}



function loginUser($username, $password)
{
    $password = md5($password);
    $sqlLogin = "select * from all_users where username='$username' and password = '$password'";
    if (count(getValues($sqlLogin)) == 1) {
        header("location:dashboard.php");
    } else {
        echo "invalid id and pass";
    }
}
