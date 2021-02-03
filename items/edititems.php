<?php

include "../connect.php";

$filedir = "items";
$table = "items";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id       = superFilter($_POST['id']);
    $name     = superFilter($_POST['name']);
    //=============================== IMpotant لا تنسى ترجعو لما تفضى وتخلص من الراجحي
    //==========================================================
    // $cat      = superFilter($_POST['catid']);
    $point    = superFilter($_POST['point']);
    $price    = superFilter($_POST['price']);
    $descr    = superFilter($_POST['desc']);
    $discount = superFilter($_POST['discount']);

    $categoriedata  = getData($table, "items_id", $id);
    $count          = $categoriedata['count'];
    $imageold       = $categoriedata['values']['items_image'];
    $imageoldtwo    = $categoriedata['values']['items_imagetwo'];

    $priceem = superFilter($_POST['priceem'] ?? 0);
    $priceir = superFilter($_POST['priceir'] ?? 0);
    $pricesa = superFilter($_POST['pricesa'] ?? 0);
    $offers = superFilter($_POST['offers'] ?? 0);

    // $datauser  =  $user['data'];
    if ($count > 0) {

        if (isset($_FILES['file']) && isset($_FILES['filetwo'])) {

            $imagename = rand(1000, 2000) . $_FILES['file']['name'];
            $imagenametwo = rand(1000, 2000) . $_FILES['filetwo']['name'];

            $data = array(
                "items_name" => $name,
                "items_point" => $point,
                "items_image" => $imagename,
                "items_cat" => $cat,
                "items_price" => $price,
                "items_desc" => $descr,
                "items_discount" => $discount,
                "items_imagetwo" =>     $imagenametwo,
                "items_price_em"  => $priceem,
                "items_price_sa"  => $pricesa,
                "items_price_ir"  => $priceir,
                "items_offres"  => $offers
            );

            $where =  "items_id = $id ";

            $count =  updateData($table, $data, $where);

            deleteFile($filedir, $imageold);
            deleteFile($filedir, $imageoldtwo);

            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
            move_uploaded_file($_FILES["filetwo"]["tmp_name"], "../upload/" . $filedir . "/" . $imagenametwo);
        } else if (isset($_FILES['filetwo']) && !isset($_FILES['file'])) {


            $imagenametwo = rand(1000, 2000) . $_FILES['filetwo']['name'];

            $data = array(
                "items_name" => $name,
                "items_point" => $point,
                "items_cat" => $cat,
                "items_price" => $price,
                "items_desc" => $descr,
                "items_discount" => $discount,
                "items_imagetwo" =>     $imagenametwo , 
                "items_price_em"  => $priceem,
                "items_price_sa"  => $pricesa,
                "items_price_ir"  => $priceir,
                "items_offres"  => $offers
            );

            $where =  "items_id = $id ";

            $count =  updateData($table, $data, $where);

            deleteFile($filedir, $imageoldtwo);

            move_uploaded_file($_FILES["filetwo"]["tmp_name"], "../upload/" . $filedir . "/" . $imagenametwo);
        } else if (isset($_FILES['file']) && !isset($_FILES['filetwo'])) {

            $imagename = rand(1000, 2000) . $_FILES['file']['name'];

            $data = array(
                "items_name" => $name,
                "items_point" => $point,
                "items_cat" => $cat,
                "items_price" => $price,
                "items_desc" => $descr,
                "items_discount" => $discount,
                "items_image" =>     $imageold , 
                "items_price_em"  => $priceem,
                "items_price_sa"  => $pricesa,
                "items_price_ir"  => $priceir,
                "items_offres"  => $offers

            );

            $where =  "items_id = $id ";

            $count =  updateData($table, $data, $where);

            deleteFile($filedir, $imageold);

            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
        } else {

            $data = array(

                "items_name" => $name,
                "items_point" => $point,
                // "items_cat" => $cat,
                "items_price" => $price,
                "items_desc" => $descr  , 
                "items_price_em"  => $priceem,
                "items_price_sa"  => $pricesa,
                "items_price_ir"  => $priceir,
                "items_offres"  => $offers
            );

            $where =  "items_id = $id ";

            $count =  updateData($table, $data, $where);
        }
    }

    countresault($count);
    // echo "wwww" ; 
} else {

    zeroCount();
  
}
