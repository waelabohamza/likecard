<?php

include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id        =  superFilter($_POST['id']);

    $username  =  superFilter($_POST['username']);

    $email     =  superFilter($_POST['email']);

    $user = getData("users", "users_id", $id);

    $count = $user['count'];

    if ($count > 0) {

        $table = "users";

        $data = array("users_name" => $username, "users_email" => $email);

        $where =  "users_id = $id  ";

        $count =  updateData($table, $data, $where);
    }
    countresault($count);
}
