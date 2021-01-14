<?php

include "../connect.php";


if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $limit = "LIMIT $page , 10";
} else {
    $limit = null;
}
if (isset($_POST['role']) && $_POST['role'] == "admin") {
    $data = getAllData("subcategoriesview", "1 = 1 $limit");
} else {
    $id = superFilter($_POST['id']);
    $data = getAllData("subcategoriesview", "categories_id = $id ");
}



if ($data['count'] > 0) {

    echo json_encode($data['values']);
} else {

    zeroCount();
}
