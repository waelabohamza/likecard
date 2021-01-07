<?php

include "../connect.php";

$table = "codes";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id        =  superFilter($_POST['id']);

    $code      =     superFilter($_POST['code']);

    $items     =     superFilter($_POST['itemid']);

    $codedata = getData($table, "codes_id", $id);

    $count = $codedata['count'];

    if ($count > 0) {


        $data = array(
        "codes_name"      => $code,
        "codes_items"     => $items
        );

        $where =  "codes_id = $id  ";

        $count =  updateData($table, $data, $where);
    }
    countresault($count);
}
