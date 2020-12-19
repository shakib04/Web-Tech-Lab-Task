<?php
require_once "../controller/book-controller.php";

if (isset($_GET['bookName'])) {
    $bookName = $_GET['bookName'];
    $books = getBooksBySearch($bookName);
    if (count($books) > 0) {

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Author</th>";
        echo "<th>Edition</th>";
        echo "<th>Image</th>";
        echo "</tr>";
        foreach ($books as $book) {

            echo "<tr>";
            echo "<td>" . $book['Id'] . "</td>";
            echo "<td>" . $book['Name'] . "</td>";
            echo "<td>" . $book['Author'] . "</td>";
            echo "<td>" . $book['Edition'] . "</td>";
            echo "<td>" . $book['BookImage'] . "</td>";
            echo "</tr>";
            echo "<a href='book-details.php?id=" . $book['Id'] . "'>" . $book['Name'] . "</a>" . "<br>";
        }
    } else {
        echo "<h2>No Records Found</h2>";
    }
}
