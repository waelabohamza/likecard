<?php

include "../connect.php";

$data = getAllData("categories", "1 = 1");

if ($data['count'] > 0) {

    echo json_encode($data['values']);
    
} else {

    zeroCount();
}
