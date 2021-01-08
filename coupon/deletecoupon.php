<?php

include "../connect.php";
$table = "coupon" ; 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $count = deleteData($table, "coupon_id", $id);
    countresault($count);
}else {
    zeroCount() ; 
}
