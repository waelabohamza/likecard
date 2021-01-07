<?php

include "../connect.php";

$table = "codes" ; 

$data = getAllData($table, "1 = 1");

if ($data['count'] > 0) {

    echo json_encode($data['values']);
} else {

    zeroCount();
}
