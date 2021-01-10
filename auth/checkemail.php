<?php 
include "../connect.php" ; 
$email = superFilter($_POST['email']) ; 
$data = getData("users", "users_email",  $email);
$count = $data['count'];
$password = $data['values']['users_password'] ; 
if ($count > 0 ) {
    echo json_encode(array("status"=> "success" , "password" => $password )) ;
}else {
    echo json_encode(array("status" => "faild")) ; 
}

?>