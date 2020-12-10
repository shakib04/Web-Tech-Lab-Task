<?php

require_once "../models/db-conn.php";

//edit department

if (isset($_POST['edit-department'])) {
    $dname = $_POST['dname'];
    $id = $_POST['id'];
    updateDepartment($dname, $id);
}

function updateDepartment($dname, $id)
{
    //UPDATE `department` SET `name` = 'Banglas', `id` = '117' WHERE `department`.`id` = 119;
     $sqlUpdateDepartment = "UPDATE `department` SET `name` = '$dname', id = '$id' WHERE `department`.`id` =" . $_GET['d-id'] . ";";
    if (dbOperation($sqlUpdateDepartment)) {
        header("location:alldepartment.php");
    } else {
        echo "Failed to Edit!!";
    }
}

//get department details by id
if (isset($_GET['d-id'])) {
    $id = $_GET['d-id'];
    $sql = "select * from department where id =$id;";
    $department = getValues($sql);
}


//get all department

function getAllDepartments()
{
    $sqlDepartments = "SELECT * FROM `department` order by name;";
    $department = getValues($sqlDepartments);
    return $department;
}


//add department

if (isset($_POST['add-department'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    addDepartment($name, $id);
}

function addDepartment($name, $id)
{
    echo $sqlAddDepartment = "INSERT INTO `department` (`id`, `name`) VALUES ('$id', '$name');";
    if (dbOperation($sqlAddDepartment)) {
        header("location:alldepartment.php");
    } else {
        echo "Failed to Add!!";
    }
}


//DELETE FROM `department` WHERE `department`.`id` = 12   
//delete department by id

if (isset($_GET['delete']) and isset($_GET['d-id'])) {
    echo $deleteQuery = "DELETE FROM `department` WHERE `department`.`id` = " . $_GET['d-id'] . ";";
    if (dbOperation($deleteQuery)) {
        header("location:" . $_SERVER['PHP_SELF'] . "");
        echo "deleted Succussfully";
    } else {
        echo "failed to delete";
    }
}
