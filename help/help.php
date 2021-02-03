<?php 

include "../connect.php" ; 

$help = getData("help" , "1" , "1");

echo json_encode($help['values']); 

?>