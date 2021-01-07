<?php
include "../connect.php";
$name    = $_POST['name'];
$imagename =  $_FILES['file']['name'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $catname =     superFilter($_POST['name']);
    $imagename = rand(1000, 2000) . $_FILES['file']['name'];
    $values = array("categories_name" => $name, "categories_image" => $imagename);
    $count = insertData("categories", $values);
    if ($count > 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/categories/" . $imagename);
    }
    countresault($count);
}
