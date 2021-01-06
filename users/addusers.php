<?php

include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username =     superFilter($_POST['username']);
    $password =     sha1($_POST['password']);
    $email    =     superFilter($_POST['email']);
    
    $values = array(
        "users_name"      => $username,
        "users_email"     => $email,
        "users_password"  => $password
    );
    $count = insertData("users", $values);
    countresault($count);

}
