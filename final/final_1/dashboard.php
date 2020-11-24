<?php

session_start();
require_once("db-connect.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>


<html>

<head>
    <title>Dashborard</title>

    <style>
        tr:nth-child(1) {
            text-transform: uppercase;
            text-decoration: underline;
            cursor: pointer;
        }

        tr>td {
            padding: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            border: 5px solid grey;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <?php


            $query = "select * from users";
            $result = mysqli_query($conn, $query);
            mysqli_close($conn);

            //$p = "1322131";
            //echo md5($p);




            if (mysqli_num_rows($result) == 0) {
                echo "<h1>No Record Found</h1>";
            } else { ?>

        <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

    <?php
                while ($user = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user['id'] . "</td>";
                    echo "<td>" . $user['name'] . "</td>";
                    echo "<td>" . $user['type'] . "</td>";
                    echo "<td><a href=''>Edit</a></td>";
                    echo "<td><a href=''>Delete</a></td>";
                    echo "</tr>";
                }
            }
    ?>

    </table>




</body>

</html>