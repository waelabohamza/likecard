<?php

include "../connect.php";

$filedir = "items";
$table = "items";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id       = superFilter($_POST['id']);
    $name     = superFilter($_POST['name']);
    $cat      = superFilter($_POST['catid']);
    $point    = superFilter($_POST['point']);
    $price    = superFilter($_POST['price']);
    $descr    = superFilter($_POST['desc']);
    $discount = superFilter($_POST['discount']);

    $categoriedata  = getData($table, "items_id", $id);
    $count          = $categoriedata['count'];
    $imageold       = $categoriedata['values']['items_image'];

    // $datauser  =  $user['data'];
    if ($count > 0) {

        if (isset($_FILES['file'])) {



            $imagename = rand(1000, 2000) . $_FILES['file']['name'];

            $data = array(
                "items_name" => $name,
                "items_point" => $point,
                "items_image" => $imagename,
                "items_cat" => $cat,
                "items_price" => $price,
                "items_desc" => $descr,
                "items_discount" => $discount
            );

            $where =  "items_id = $id ";

            $count =  updateData($table, $data, $where);

            deleteFile($filedir, $imageold);

            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
        } else {

            $data = array(

                "items_name" => $name,
                "items_point" => $point,
                "items_cat" => $cat,
                "items_price" => $price,
                "items_desc" => $descr
            );

            $where =  "items_id = $id ";

            $count =  updateData($table, $data, $where);
        }
    }

    countresault($count);
} else {

    zeroCount();
}
