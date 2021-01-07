<?php
include "../connect.php";
$id  = superFilter($_POST['id']) ; 
$data = getAllData("itemsview", "items_cat = $id");
if ($data['count'] > 0) {
    echo json_encode($data['values']);
} else {
    zeroCount();
}
