<?php

include "../connect.php";

$table = "coupon";

$couponcode = superFilter($_POST['id']);

$data = getData($table, "coupon_code", $couponcode);

if ($data['count'] > 0) {

    echo json_encode($data['values']);
} else {

    echo json_encode(array('coupon_discount' => "0"));
}
