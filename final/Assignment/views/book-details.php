<?php
require_once "../controller/book-controller.php";
$bookDetails = getBookDetails($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details of Book <?php echo $_GET["id"]; ?></title>
</head>

<body>
    <?php
    if (count($bookDetails)) {
        echo $bookDetails[0]['Name'] . "<br>";
        echo $bookDetails[0]['Author'] . "<br>";
        echo $bookDetails[0]['Edition'] . "<br>";
        echo $bookDetails[0]['BookImage'] . "<br>";
    }else{
        echo "<h2>Book Not Available</h2>";
    }
    ?>
</body>

</html>