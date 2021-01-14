<?php

include  "../connect.php";
$table = "users";
$username = superFilter($_POST['username']);
$password = $_POST['password'];
$email    = superFilter($_POST['email']);
$data = getData("users", "users_email",  $email);
$count = $data['count'];
if ($count > 0) {
    echo json_encode(array("status" => "faild"));
} else {
    $values = array(
        "users_name" => $username,
        "users_email" => $email,
        "users_password" => $password
    );
    $count  = insertData($table, $values);
    if ($count > 0) {
        echo json_encode(array(
            "status" => "success",
            "username" => $username,
            "password" => $_POST['password'],
            "email"    => $email
        ));
    }
}
