<?php

include "../connect.php";

$filedir = "items";
$table = "items";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id       = superFilter($_POST['id']);
    $name     = superFilter($_POST['name']);
    $cat      = superFilter($_POST['catid']);
    $point    = superFilter($_POST['point']);

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
