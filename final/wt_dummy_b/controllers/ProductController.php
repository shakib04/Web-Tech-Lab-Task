<?php

require_once "../models/db-conn.php";
function moreValidation($data)
{
    $data = trim($data);
    $data = htmlentities($data);
    return $data;
}

//add product via ../views/addproduct.php
$err_name = $err_category = $err_description = $err_quantity = $err_price = $err_image = "";

$status = "";
$validCountAddProduct = 0;
if (isset($_POST['add-product'])) {

    //1
    if (empty(trim($_POST['pname']))) {
        $err_name = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $name = moreValidation($_POST['pname']);
        $validCountAddProduct++;
    }
    //2
    if ($_POST['category'] == -1) {
        $err_category = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $category = moreValidation($_POST['category']);
        $validCountAddProduct++;
    }
    //3
    if (empty(trim($_POST['quantity']))) {
        $err_quantity = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $quantity = moreValidation($_POST['quantity']);
        $validCountAddProduct++;
    }
    //4
    if (empty(trim($_POST['description']))) {
        $err_description = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $description = moreValidation($_POST['description']);
        $validCountAddProduct++;
    } //5
    if (empty(trim($_POST['price']))) {
        $err_price = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $price = moreValidation($_POST['price']);
        $validCountAddProduct++;
    }

    if ($validCountAddProduct == 5 && isset($_POST['product-image'])) {
        if (empty($_FILES['product-image']['name'])) {
            $err_image = "<span style='color:red; font-weight:bold;'>No Image Selected!!<span>";
        } else {
            $productImage = $_FILES['product-image'];
            $tmpname = $productImage['tmp_name'];
            $targetDir = "images/product-image/";
            $fileTypeExtension = strtolower(pathinfo($productImage['name'], PATHINFO_EXTENSION));
            $filename = $_POST['pname'] . "-" . uniqid() . ".$fileTypeExtension";
            $targetFile = $targetDir . $filename;

            if (move_uploaded_file($tmpname, $targetFile)) {
                $status = "Uploaded !!";
                addProduct($name, $category, $price, $quantity, $description, $targetFile);
            } else {
                $status = "Failed to Upload";
            }
        }
    }
}

function addProduct($name, $category, $price, $quantity, $description, $imgAddress)
{
    $sqlAddProduct = "INSERT INTO `products` (`p_id`, `name`, `category`, `price`, `qunatity`, `description`, `image`) VALUES (NULL, '$name', '$category', '$price', '$quantity', '$description', '$imgAddress');";
    if (dbOperation($sqlAddProduct)) {
        echo "Success!";
    } else {
        echo "Failed :(";
    }
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

//delete product by id

if (isset($_GET['delete']) and isset($_GET['p-id'])) {
    $deleteQuery = "DELETE FROM `products` WHERE `products`.`p_id` = " . $_GET['p-id'] . ";";
    if (dbOperation($deleteQuery)) {
        header("location:" . $_SERVER['PHP_SELF'] . "");
        echo "deleted Succussfully";
    } else {
        echo "failed to delete";
    }
}
