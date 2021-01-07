<?php
include "../connect.php";

$filedir = "subcategories";
$table = "subcategories";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $subcatname =     superFilter($_POST['name']);

    $catid       = superFilter($_POST['catid']);

    $imagename = rand(1000, 2000) . $_FILES['file']['name'];

    $values = array(

        "subcategories_name" => $subcatname,
        "subcategories_image" => $imagename,
        "subcategories_cat" => $catid

    );

    $count = insertData($table, $values);

    if ($count > 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
    }
    countresault($count);
}
