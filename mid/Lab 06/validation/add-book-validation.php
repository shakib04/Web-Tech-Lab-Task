<?php
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
$name = $category = $desc = $publisher = $ed = $isbn = $pages = $price = "";
$err_name = $err_category = $err_desc = $err_publisher = $err_ed = $err_isbn = $err_pages = $err_price = "";

$validBookinfo = 0;

if (isset($_POST['save'])) {

    //1. name validation
    if (empty(trim($_POST['name']))) {
        $err_name = "<span style='color:red;'>Name is Required</span>";
    } else {
        $name = validate($_POST['name']);
        $validBookinfo++;
    }

    //2. category validation
    if (empty(trim($_POST['category']))) {
        $err_category = "<span style='color:red;'>category is Required</span>";
    } else {
        $category = validate($_POST['category']);
        $validBookinfo++;
    }

    //3. desc validation
    if (empty(trim($_POST['desc']))) {
        $err_desc = "<span style='color:red;'>Description is Required</span>";
    } else {
        $desc = validate($_POST['desc']);
        $validBookinfo++;
    }

    //4. publisher validation

    if (empty(trim($_POST['publisher']))) {
        $err_publisher = "<span style='color:red;'>publisher is Required</span>";
    } else {
        $publisher = validate($_POST['publisher']);
        $validBookinfo++;
    }


    //5. Edition validation

    if (empty(trim($_POST['ed']))) {
        $err_ed = "<span style='color:red;'>Edition is Required</span>";
    } else {
        $ed = validate($_POST['ed']);
        $validBookinfo++;
    }


    //6. isbn validation
    if (empty(trim($_POST['isbn']))) {
        $err_isbn = "<span style='color:red;'>isbn is Required</span>";
    } else {
        $isbn = validate($_POST['isbn']);
        $validBookinfo++;
    }

    //7. pages validation
    if (empty(trim($_POST['pages']))) {
        $err_pages = "<span style='color:red;'>Pages is Required</span>";
    } else {
        $pages = validate($_POST['pages']);
        $validBookinfo++;
    }

    //8. price validation
    if (empty(trim($_POST['price']))) {
        $err_price = "<span style='color:red;'>Price is Required</span>";
    } else {
        $price = validate($_POST['price']);
        $validBookinfo++;
    }


    if ($validBookinfo == 8) {
        //echo "success";
        $books = simplexml_load_file("books.xml");
        $book = $books->addChild("book");
        $book->addChild("name", $name);
        $book->addChild("category", $category);
        $book->addChild("desc", $desc);
        $book->addChild("pub", $publisher);
        $book->addChild("edition", $ed);
        $book->addChild("isbn", $isbn);
        $book->addChild("pages", $pages);
        $book->addChild("price", $price);

        $newXmlobj = new DOMDocument("1.0");
        $newXmlobj->preserveWhiteSpace = false;
        $newXmlobj->formatOutput = true;

        $newXmlobj->loadXML($books->asXML());

        $file = fopen("books.xml", "w");
        fwrite($file, $newXmlobj->saveXML());
        echo "success";
    }
}


?>

<html>

</html>