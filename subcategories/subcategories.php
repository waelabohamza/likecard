<?php

include "../connect.php";

$id = superFilter($_POST['id']);

$data = getAllData("subcategoriesview", "subcategories_id = $id ");

if ($data['count'] > 0) {

    echo json_encode($data['values']);
} else {

    zeroCount();
}
