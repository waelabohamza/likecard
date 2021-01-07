<?php

include "../connect.php";
$table = "users" ; 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $count = deleteData($table, "users_id", $id);
    countresault($count);
}else {
    zeroCount() ; 
}
