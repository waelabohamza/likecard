<?php
include "../connect.php";
$subcatname    = superFilter($_POST['name']);
$imagename =  $_FILES['file']['name'];
$catid   =  "1";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $catname =     superFilter($_POST['name']);
    $imagename = rand(1000, 2000) . $_FILES['file']['name'];
    $values = array(
        "subcategories_name"  => $subcatname,
        "subcategories_image" => $imagename,
        "subcategories_cat"   => $catid,
    );
    $count = insertData("subcategories", $values);
    if ($count > 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/subcategories/" . $imagename);
    }
    countresault($count);
}
