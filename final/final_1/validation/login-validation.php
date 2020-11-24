<?php
session_start();
require_once("db-connect.php");

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
$err_username = $er_password = $username = $password = "";

$hasError = false;

if (isset($_POST['login'])) {


    if (empty(trim($_POST['password']))) {
        $err_username = "<span style='color:red;'>Username is Required</span>";
        $hasError = true;
    } else {
        $username = validate($_POST['username']);
    }

    if (empty(trim($_POST['password']))) {
        $er_password = "<span style='color:red;'> Password is Required </span>";
        $hasError = true;
    } else {
        $password = validate($_POST['password']);
        $password = md5($password);
    }

    if (!$hasError) {

        $query = "select * from users where name ='$username' && password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Invalid Username and Password";
        }
    }
}
