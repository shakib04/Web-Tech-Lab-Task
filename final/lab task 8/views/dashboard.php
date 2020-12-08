<?php
require_once "../controller/user-controller.php";

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else {
    $alldata = getUserDetails();
}
?>

<html>

<head>
    <style>
        table,
        td,
        th {
            border: 1px solid steelblue;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }
    </style>
</head>

<body>

    <h1>Welcome to Webtech</h1>


    <table>
        <caption>all user data</caption>
        <thead>
            <th>name</th>
            <th>usename</th>
            <th>email</th>
            <th>contact</th>
        </thead>

        <?php
        foreach ($alldata as $user) {
            echo "<tr>";
            echo "<td>" . $user['fullname'] . "</td>";
            echo "<td>" . $user['username'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['contact'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>