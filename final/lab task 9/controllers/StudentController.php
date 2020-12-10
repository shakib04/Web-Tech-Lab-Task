<?php

require_once "../models/db-conn.php";
function moreValidation($data)
{
    $data = trim($data);
    $data = htmlentities($data);
    return $data;
}

//add student via ../views/addstudent.php
$err_name = $err_department = $err_dob = $err_credit = $err_cgpa = $err_image = "";
$err_dob_date = $err_dob_month = $err_dob_year = "";

$status = "";
$validCountAddStudent = 0;
if (isset($_POST['add-student'])) {

    //1
    if (empty(trim($_POST['sname']))) {
        $err_name = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $name = moreValidation($_POST['sname']);
        $validCountAddStudent++;
    }
    //2
    if ($_POST['department'] == -1) {
        $err_department = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $department = moreValidation($_POST['department']);
        $validCountAddStudent++;
    }
    //3
    if (empty(trim($_POST['credit']))) {
        $err_credit = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $credit = moreValidation($_POST['credit']);
        $validCountAddStudent++;
    }
    //4
    if (empty(trim($_POST['dob']))) {
        $err_dob = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $dob = moreValidation($_POST['dob']);
        $validCountAddStudent++;
    } //5
    if (empty(trim($_POST['cgpa']))) {
        $err_cgpa = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else {
        $cgpa = moreValidation($_POST['cgpa']);
        $validCountAddStudent++;
    }

    //date validation

    //6 year

    if (empty(trim($_POST['year-dob']))) {
        $err_dob_year = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else if (!is_numeric($_POST['year-dob'])) {
        $err_dob_year = "<span style='color:red; font-weight:bold;'>Year is not numeric<span>";
    } else {
        $dob_year = moreValidation($_POST['year-dob']);
        $validCountAddStudent++;
    }

    //7 month
    if (empty(trim($_POST['month-dob']))) {
        $err_dob_month = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else if (!is_numeric($_POST['month-dob'])) {
        $err_dob_month = "<span style='color:red; font-weight:bold;'>Year is not numeric<span>";
    } else {
        $dob_month = moreValidation($_POST['month-dob']);
        $validCountAddStudent++;
    }

    //8 date
    if (empty(trim($_POST['date-dob']))) {
        $err_dob_date = "<span style='color:red; font-weight:bold;'>Field is requiered<span>";
    } else if (!is_numeric($_POST['date-dob'])) {
        $err_dob_date = "<span style='color:red; font-weight:bold;'>Year is not numeric<span>";
    } else {
        $dob_date = moreValidation($_POST['date-dob']);
        $validCountAddStudent++;
    }


    if ($validCountAddStudent == 8) {
        echo $dob = $dob_year . "/" . $dob_month . "/" . $dob_date;
        addStudent($name, $department, $cgpa, $credit, $dob);
    }
}

function addStudent($name, $department, $cgpa, $credit, $dob)
{
    $sqlAddStudent = "INSERT INTO `student` (`id`, `name`, `dept_id`, `cgpa`, `credit`, `dob`) VALUES (NULL, '$name', '$department', '$cgpa', '$credit', '$dob');";
    if (dbOperation($sqlAddStudent)) {
        echo "Success!";
    } else {
        echo "Failed :(";
    }
}


//all students

function getAllStudents()
{
    $sqlAllStudents = "SELECT s.*,d.name deptName FROM student s, department d WHERE s.dept_id = d.id;";
    $students = getValues($sqlAllStudents);
    return $students;
}


//edit student via editstudent.php


if (isset($_POST['update-student'])) {
    $name = $_POST['sname'];
    $department = $_POST['department'];
    $cgpa = $_POST['cgpa'];
    $credit = $_POST['credit'];
    $dob = $_POST['dob'];

    if (true) {
        updateStudent($name, $department, $cgpa, $credit, $dob);
    } else {
        $status = "Failde to Save";
    }
}

function updateStudent($name, $department, $cgpa, $credit, $dob)
{
    $sqlUpdateStudent = "UPDATE `student` SET `name` = '$name', `dept_id` = '$department', `cgpa` = '$cgpa', `credit` = '$credit', `dob` = '$dob' WHERE `student`.`id` =" . $_GET['s-id'] . ";";
    if (dbOperation($sqlUpdateStudent)) {
        echo "<div style='color: aliceblue; background:green; width:70px; padding: 10px; '>Success</div>";
    } else {
        echo "<div style='color: aliceblue; background:red; width: 70px; padding: 10px; '>Failed</div>";
    }
    //header("location:allstudents.php");
}


//get Student Details by id
if (isset($_GET['s-id'])) {
    $sqlgetDatafromId = "SELECT s.*,d.name deptName FROM student s, department d WHERE s.dept_id = d.id and s.id =" . $_GET['s-id'] . ";";
    $studentData = getValues($sqlgetDatafromId);
}

//delete student by id

if (isset($_GET['delete']) and isset($_GET['s-id'])) {
    echo $deleteQuery = "DELETE FROM `student` WHERE `student`.`id` = " . $_GET['s-id'] . ";";
    if (dbOperation($deleteQuery)) {
        header("location:" . $_SERVER['PHP_SELF'] . "");
        echo "deleted Succussfully";
    } else {
        echo "failed to delete";
    }
}
