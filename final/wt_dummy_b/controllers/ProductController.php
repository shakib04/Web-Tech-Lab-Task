<?php

require_once "../models/db-conn.php";

//add product via --views/addproduct.php

$status = "";
$validCount = 0;
if (isset($_POST['add-product'])) {
    $name = $_POST['pname'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $productImage = $_FILES['product-image'];

    $tmpname = $productImage['tmp_name'];
    $targetDir = "images/product-image/";
    $fileTypeExtension = strtolower(pathinfo($productImage['name'], PATHINFO_EXTENSION));
    $filename = $_POST['pname'] . "-" . uniqid() . ".$fileTypeExtension";
    $targetFile = $targetDir . $filename;

    if (move_uploaded_file($tmpname, $targetFile)) {
        $status = "Uploaded !!";
        $validCount++;
    } else {
        $status = "Failed to Upload";
    }


    if ($validCount == 1) {
        addProduct($name, $category, $price, $quantity, $description, $targetFile);
    }
}

function addProduct($name, $category, $price, $quantity, $description, $imgAddress)
{
    echo $sqlAddProduct = "INSERT INTO `products` (`p_id`, `name`, `category`, `price`, `qunatity`, `description`, `image`) VALUES (NULL, '$name', '$category', '$price', '$quantity', '$description', '$imgAddress');";
    dbOperation($sqlAddProduct);
}


//all products

function getAllProducts()
{
    $sqlAllProducts = "SELECT p.*,c.name catName FROM products p, categories c WHERE p.category = c.c_id;";
    $products = getValues($sqlAllProducts);
    return $products;
}


//edit product via editproduct.php


if (isset($_POST['update-product'])) {
    $name = $_POST['pname'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $productImage = $_FILES['product-image'];

    $tmpname = $productImage['tmp_name'];
    $targetDir = "images/product-image/";
    $fileTypeExtension = strtolower(pathinfo($productImage['name'], PATHINFO_EXTENSION));
    $filename = $_POST['pname'] . "-" . uniqid() . ".$fileTypeExtension";
    $targetFile = $targetDir . $filename;

    if (move_uploaded_file($tmpname, $targetFile)) {
        $status = "Uploaded !!";
        updateProduct($name, $category, $price, $quantity, $description, $targetFile);
        //$validCount++;
    } else {
        $status = "Failed to Upload";
    }
}

function updateProduct($name, $category, $price, $quantity, $description, $imgAddress)
{
    $sqlUpdateProduct = "UPDATE `products` SET `name` = '$name', `category` = '$category', `price` = '$price', `qunatity` = '$quantity', `description` = '$description', `image` = '$imgAddress' WHERE `products`.`p_id` =" . $_GET['p-id'] . ";";
    dbOperation($sqlUpdateProduct);
    //header("location:allproducts.php");
}


//get Product Details by id
if (isset($_GET['p-id'])) {
    $sqlgetDatafromId = "SELECT p.*,c.name catName FROM products p, categories c WHERE p.category = c.c_id and p_id =" . $_GET['p-id'] . ";";
    $productData = getValues($sqlgetDatafromId);
}
