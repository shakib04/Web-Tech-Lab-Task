<?php

session_start();

if ($_SESSION['username'] == null) {
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
        <a href="add-book.php">Add New Book</a>


        <tr>
            <?php

            $books = simplexml_load_file("books.xml");
            $book = $books->book;
            $slno = 1;

            // echo "<pre>";
            // var_dump($books);
            // echo "</pre>";

            if (count($books) == 0) {
                echo "<h1>No Record Found</h1>";
            } else { ?>

        <tr>
            <td>Sr. No</td>
            <td>Name</td>
            <td>Publisher</td>
            <td>ISBN</td>
            <td>Price</td>
            <td>Image</td>
            <td>Delete</td>
        </tr>

    <?php
                foreach ($book as $bookInfo) {
                    echo "<tr>";
                    echo " <td>$slno</td> <td>$bookInfo->name</td>   <td>$bookInfo->pub</td> <td>$bookInfo->isbn</td> <td>$bookInfo->price</td> <td>Image</td> <td>Delete</td>";
                    echo "</tr>";
                    $slno++;
                }
            }
    ?>

    </table>




</body>

</html>