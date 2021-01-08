<?php
include "../connect.php";
$table = "codes" ; 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $code      =     superFilter($_POST['code']);
    $items     =     superFilter($_POST['itemid']);
    $values = array(
        "codes_name"      => $code,
        "codes_items"     => $items
    );
    $count = insertData($table, $values);
    countresault($count);
}
