<?php

include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $count = deleteData("users", "users_id", $id);
    countresault($count);
}else {
    zeroCount() ; 
}
