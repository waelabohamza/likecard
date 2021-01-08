<?php
include "../connect.php";
$table = "coupon";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $code         =     superFilter($_POST['code']);
    $discount     =     superFilter($_POST['discount']);

    $values = array(
        "coupon_code"      => $code,
        "coupon_discount"     => $items
    );
    $count = insertData($table, $values);
    countresault($count);
}
