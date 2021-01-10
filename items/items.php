<?php
include "../connect.php";
$id  = superFilter($_POST['id']) ; 
$data = getAllData("itemsview", "items_cat = $id");
if ($data['count'] > 0) {
    echo json_encode($data['values']);
} else {
    zeroCount();
}
/*
CREATE VIEW itemsview as SELECT items.* , subcategories.* 
FROM items INNER JOIN subcategories ON subcategories.subcategories_id = items.items_cat
*/