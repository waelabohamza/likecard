<?php
include "../connect.php" ; 

$itemid = superFilter($_POST['id']); 
$count =   countCoulmn("codes_id" , "codes" , "WHERE codes_items = ? "  , $itemid ) ; 
echo json_encode(array("count" => $count)) ; 

?>