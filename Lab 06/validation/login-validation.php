<?php
session_start();
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
$err_username = $er_password = $username = $password = "";

$hasError = true;

if (isset($_POST['login'])) {


    if (empty(trim($_POST['password']))) {
        $err_username = "<span style='color:red;'>Username is Required</span>";
        $hasError = true;
    } else {
        $username = validate($_POST['password']);
        $hasError = false;
    }

    if (empty(trim($_POST['password']))) {
        $er_password = "<span style='color:red;'> Password is Required </span>";
        $hasError = true;
    } else {
        $password = validate($_POST['password']);
        $hasError = false;
    }

    if (!$hasError) {
        $admin = simplexml_load_file("admin.xml");
        $users = $admin->user;
        $flag = false;

        foreach ($users as $user) {
            if ($user->username == $username && $user->password == $password) {
                $flag = true;
                break;
            }
        }

        if ($flag) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Invalid Username and Password";
        }
    }
}
