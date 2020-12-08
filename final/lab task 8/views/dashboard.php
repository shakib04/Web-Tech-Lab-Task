<?php
require_once "../controller/user-controller.php";

if (!isset($_SESSION['username'])) {
    echo "not Set";
    header("location:login.php");
} else {
    $alldata = getUserDetails();
}
?>

<html>

<head>
    <style>
        table,
        td,th {
            border: 1px solid steelblue;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <th>name</th>
            <th>usename</th>
            <th>password</th>
            <th>email</th>
            <th>contact</th>
        </thead>

        <?php
        foreach ($alldata as $user) {
            echo "<tr>";
            echo "<td>" . $user['fullname'] . "</td>";
            echo "<td>" . $user['username'] . "</td>";
            echo "<td>" . $user['password'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['contact'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>