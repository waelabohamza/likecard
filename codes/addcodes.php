<?php
include "../connect.php";
$table = "codes" ; 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $code      =     superFilter($_POST['code']);
    $items     =     superFilter($_POST['itemid']);
    
    $getcodename = getData($table, "codes_name", $code) ; 
    $checkcodename = $getcodename['count'] ; 

    if ($checkcodename > 0) {

    }else {

    } 
    

    $values = array(
        "codes_name"      => $code,
        "codes_items"     => $items
    );
    $count = insertData($table, $values);
    countresault($count);
}
