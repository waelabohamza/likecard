<?php

include "../connect.php";

$table = "coupon" ; 
$checkcoupon = superFilter($_POST['coupon_code']) ; 

$data = getAllData($table, "coupon_code =  $checkcoupon ");

if ($data['count'] > 0) {

    echo json_encode($data['values']);
    
} else {

    zeroCount();
}
