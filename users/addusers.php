<?php

include "../connect.php";
$table = "users";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username =     superFilter($_POST['username']);
    $password =     superFilter($_POST['password']);
    $email    =     superFilter($_POST['email']);

    $values = array(
        "users_name"      => $username,
        "users_email"     => $email,
        "users_password"  => $password
    );
    $count = insertData($table, $values);
    countresault($count);
}
