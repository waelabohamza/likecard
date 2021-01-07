<?php

include "../connect.php";

$filedir = "subcategories";
$table = "subcategories";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id             = superFilter($_POST['id']);
    $catname        = superFilter($_POST['name']);
    $categoriedata  = getData($table, "subcategories_id", $id);
    $count          = $categoriedata['count'];
    $imageold       = $categoriedata['values']['subcategories_image'];
    $catid          = 4   ; 

    // $datauser  =  $user['data'];
    if ($count > 0) {

        if (isset($_FILES['file'])) {

            $imagename = rand(1000, 2000) . $_FILES['file']['name'];

            $data = array(
                "subcategories_name" => $catname,
                "subcategories_image" => $imagename,
                "subcategories_cat" =>      $catid
            );

            $where =  "subcategories_id = $id ";

            $count =  updateData($table, $data, $where);

            deleteFile($filedir, $imageold);

            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
        } else {


            $data = array(
                "subcategories_name" => $catname,
                "subcategories_image" => $imageold,
                "subcategories_cat" =>      $catid
            );

            $where =  "subcategories_id = $id ";

            $count =  updateData($table, $data, $where);
        }
    }
    countresault($count);
} else {

    zeroCount();
}
