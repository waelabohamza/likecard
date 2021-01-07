<?php
include "../connect.php";

$filedir = "subcategories" ; 
$table   = "subcategories" ;  

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $category  = getData($table, "subcategories_id", $id);
    $imageold   = $category['values']['subcategories_image'];
    $checkcat   = $category['count'];
    if ($checkcat > 0) {
        $count = deleteData($table,"subcategories_id",$id);
        if ($count > 0) {
            deleteFile( $filedir , $imageold ) ; 
        }
    }
    countresault($checkcat);
} else {
    zeroCount();
}
