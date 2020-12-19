<?php
require_once "../controller/book-controller.php";
$books = getAllBooks();
echo "<pre>";
//print_r($books);
echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 20px;
        }

        th,
        td {
            width: 100px;
        }
    </style>
</head>

<body>

    <input type="text" onkeyup="searchBooks(this)" name="search-book" id="search-book" placeholder="type book name to search" style="padding: 5px; margin: 10px; width: 300px;">
    <div id="books-Details">

    </div>
    <table id="books-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>Edition</th>
            <th>Image</th>
        </tr>
        <?php
        foreach ($books as $book) {
            echo "<tr>";
            echo "<td>" . $book['Id'] . "</td>";
            echo "<td>" . $book['Name'] . "</td>";
            echo "<td>" . $book['Author'] . "</td>";
            echo "<td>" . $book['Edition'] . "</td>";
            echo "<td>" . $book['BookImage'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <p id="result"></p>
    <script>
        function searchBooks(bookInput) {
            var bookName = bookInput.value;
            if (bookName.length == 0) {
                document.getElementById("books-table").innerHTML = "";
                return;
            }
            //console.log(bookName);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById("books-table").innerHTML = this.responseText;
                }
            }

            xhr.open("GET", "search-book.php?bookName=" + bookName, true);
            xhr.send();
        }
    </script>
</body>

</html>