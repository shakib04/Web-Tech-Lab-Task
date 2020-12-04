<?php
$db_user = "root";
$db_pass = "";
$db_name = "final_lab_task";
$host = "localhost";

function dbOperation($query)
{
    global $db_name, $db_pass, $db_user, $host;
    $conn = mysqli_connect($host, $db_user, $db_pass, $db_name) or die("Connection Failed" . mysqli_connect_error());
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function getValues($query)
{
    global $db_name, $db_pass, $db_user, $host;
    $conn = mysqli_connect($host, $db_user, $db_pass, $db_name) or die("Connection Failed" . mysqli_connect_error());
    $result = mysqli_query($conn, $query);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    mysqli_close($conn);
    return $data;
}
