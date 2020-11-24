<?php 
$username = "root";
$password = "";
$server_name = "localhost";
$db_name = "final_lab_task";

$conn = mysqli_connect($server_name, $username, $password, $db_name);

if (!$conn) {
    die("DB Connection Failed!" . mysqli_connect_error());
}