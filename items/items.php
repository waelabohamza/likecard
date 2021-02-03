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
} elseif (isset($_POST['role']) && $_POST['role'] == "sale") {
    $data = getAllData("itemsview", "items_offres = 1 $limit");
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
CREATE VIEW itemsview as SELECT items.* , subcategories.*  , categories.categories_name
FROM items 
INNER JOIN subcategories ON subcategories.subcategories_id = items.items_cat
INNER JOIN categories ON categories.categories_id = subcategories.subcategories_cat


*/