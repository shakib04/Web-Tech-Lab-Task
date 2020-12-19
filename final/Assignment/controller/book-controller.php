<?php

require_once "../model/db-conn.php";

function getAllBooks()
{
    $queryAllBooks = "select * from books";
    $data = getValues($queryAllBooks);
    return $data;
}

function getBookDetails($id)
{
    $queryAllBooks = "select * from books where id = '" . $id . "';";
    $data = getValues($queryAllBooks);
    return $data;
}


function getBooksBySearch($bookName)
{
    $searchQuery = "SELECT * FROM `books` WHERE Name LIKE '%" . $bookName . "%';";
    $data = getValues($searchQuery);
    return $data;
}
