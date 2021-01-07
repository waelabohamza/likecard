<?php
include "../connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = superFilter($_POST['id']);
    $category  = getData("categories", "categories_id", $id);
    $imageold   = $category['values']['categories_image'];
    $checkcat   = $category['count'];
    if ($checkcat > 0) {
        $count = deleteData("categories", "categories_id", $id);
        if ($count > 0) {
            if (file_exists("../upload/categories/" . $imageold)) {
                unlink("../upload/categories/" . $imageold);
            }
        }
    }
    countresault($checkcat);
} else {
    zeroCount();
}
