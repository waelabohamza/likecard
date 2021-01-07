<?php
include "../connect.php";

$filedir = "items";

$table = "items";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name     = superFilter($_POST['name']);
    $cat      = superFilter($_POST['catid']);
    $point    = superFilter($_POST['point']);

    $imagename = rand(10000, 20000) . $_FILES['file']['name'];

    $values = array(

        "items_name" => $subcatname,
        "items_point" => $point,
        "items_image" => $imagename,
        "items_cat" => $catid

    );

    $count = insertData($table, $values);

    if ($count > 0) {

        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
    }

    countresault($count);
}
