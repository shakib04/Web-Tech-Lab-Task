<?php

require_once "../models/db-conn.php";

//edit category

if (isset($_POST['edit-category'])) {
    $cname = $_POST['cname'];
    updateCategory($cname);
}

function updateCategory($cname)
{
    $sqlUpdateCategory = "UPDATE `categories` SET `name` = '$cname' WHERE `categories`.`c_id` =" . $_GET['c-id'] . ";";
    dbOperation($sqlUpdateCategory);
}

//get category details by id
if (isset($_GET['c-id'])) {
    $id = $_GET['c-id'];
    $sql = "select * from categories where c_id =$id;";
    $categories = getValues($sql);
}


//get all categories

function getAllCategories()
{
    $sqlCategories = "SELECT * FROM `categories` order by name;";
    $categories = getValues($sqlCategories);
    return $categories;
}


//add category

if (isset($_POST['add-category'])) {
    $name = $_POST['name'];
    addCategory($name);
}

function addCategory($name)
{
    $sqlAddCategory = "INSERT INTO `categories` (`c_id`, `name`) VALUES (NULL, '$name');";
    if (dbOperation($sqlAddCategory)) {
        header("location:allcategories.php");
    } else {
        echo "Failed to Add!!";
    }
}