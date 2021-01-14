<?php
include "../connect.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $limit = "LIMIT $page , 10";
} else {
    $limit = null;
}
if (isset($_POST['role']) && $_POST['role'] == "admin") {
    $data = getAllData("itemsview", "1 = 1 $limit");
} else {
    $id  = superFilter($_POST['id']);
    $data = getAllData("itemsview", "items_cat = $id $limit");
}
if ($data['count'] > 0) {
    echo json_encode($data['values']);
} else {
    zeroCount();
}
/*
CREATE VIEW itemsview as SELECT items.* , subcategories.* 
FROM items INNER JOIN subcategories ON subcategories.subcategories_id = items.items_cat
*/