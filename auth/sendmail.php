<?php
$email = $_GET['email'];
$password  = $_GET['password'];

$to         = $email;
$subject    = "LinkCard";
$txt        = "كلمة المرور هي " . $password;
$headers    = "From: Support@LinkCard.com" . "\r\n" .
    "CC: ddd@ddd.com";
mail($to, $subject, $txt, $headers);

echo json_encode(array("status" => "success"));
