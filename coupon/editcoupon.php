<?php

include "../connect.php";

$table = "coupon";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id        =  superFilter($_POST['id']);

    $code         =     superFilter($_POST['code']);
    $discount     =     superFilter($_POST['discount']);

    $codedata = getData($table, "coupon_id", $id);

    $count = $codedata['count'];

    if ($count > 0) {


        $data = array(
            "coupon_discount"      => $discount,
            "coupon_code"          => $code
        );
        $where =  "coupon_id = $id  ";
        $count =  updateData($table, $data, $where);
    }
    countresault($count);
}
