<?php
include "../connect.php";

$filedir = "items";

$table = "items";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name     = superFilter($_POST['name']);
    $cat      = superFilter($_POST['catid']);
    $point    = superFilter($_POST['point']);
    $price    = superFilter($_POST['price']);
    $descr    = superFilter($_POST['desc']);
    $discount = superFilter($_POST['discount'] ?? 0);
    $priceem = superFilter($_POST['priceem'] ?? 0);
    $priceir = superFilter($_POST['priceir'] ?? 0);
    $pricesa = superFilter($_POST['pricesa'] ?? 0);
    $offers = superFilter($_POST['offers'] ?? 0);


    $imagename = rand(10000, 20000) . $_FILES['file']['name'];
    $imagenametwo = rand(10000, 20000) . $_FILES['filetwo']['name'];

    $values = array(

        "items_name" => $name,
        "items_point" => $point,
        "items_image" => $imagename,
        "items_imagetwo" => $imagenametwo,
        "items_cat" => $cat,
        "items_price" => $price,
        "items_desc" => $descr,
        "items_discount" => $discount,
        "items_price_em"  => $priceem,
        "items_price_sa"  => $pricesa,
        "items_price_ir"  => $priceir,
        "items_offres"  => $offers
    );

    $count = insertData($table, $values);

    if ($count > 0) {

        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
        move_uploaded_file($_FILES["filetwo"]["tmp_name"], "../upload/" . $filedir . "/" . $imagenametwo);
    }

    countresault($count);
}
