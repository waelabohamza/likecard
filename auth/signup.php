<?php

include  "../connect.php";
$table = "users";
$username = superFilter($_POST['username']);
$password = sha1($_POST['username']);
$email    = superFilter($_POST['email']);
$data = getData("users", "users_email",  $email,  "AND users_password = $password");
$count = $data['count'];
if ($count > 0) {
    echo json_encode(array("status" => "faild"));
}else {
    $values = array(
        "users_name" => $username,
        "users_email" => $email,
        "users_password" => $password
    );
    $count  = insertData($table, $values);
}
