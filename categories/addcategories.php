<?php
include "../connect.php";

$filedir = "categories";

$table = "categories";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $catname    = superFilter($_POST['name']);
 
    $imagename = rand(1000, 2000) . $_FILES['file']['name'];

    $values = array("categories_name" => $catname, "categories_image" => $imagename);

    $count = insertData($table, $values);
    
    if ($count > 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
    }
    countresault($count);

}
