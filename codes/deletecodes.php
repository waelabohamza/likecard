<?php

include "../connect.php";
$table = "codes" ; 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $count = deleteData($table, "codes_id", $id);
    countresault($count);
}else {
    zeroCount() ; 
}
