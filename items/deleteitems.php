<?php
include "../connect.php";

$filedir = "items" ; 
$table   = "items" ;  

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $category  = getData($table, "items_id", $id);
    $imageold   = $category['values']['items_image'];
    $checkcat   = $category['count'];
    if ($checkcat > 0) {
        $count = deleteData($table,"items_id",$id);
        if ($count > 0) {
            deleteFile( $filedir , $imageold ) ; 
        }
    }
    countresault($checkcat);
} else {
    zeroCount();
}
