<?php

include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id             = superFilter($_POST['id']);
    $subcatname        = superFilter($_POST['name']);
    $subcategoriedata  = getData("subcategories", "subcategories_id", $id);
    $count          = $subcategoriedata['count'];
    $imageold       = $subcategoriedata['values']['categories_image'];
    // $datauser  =  $user['data'];
    if ($count > 0) {

        if (isset($_FILES['file'])) {

            $imagename = rand(1000, 2000) . $_FILES['file']['name'];

            $table = "subcategories";

            $data = array("categories_name" => $subcatname, "categories_image" => $imagename);

            $where =  "categories_id = $id ";

            $count =  updateData($table, $data, $where);

            if (file_exists("../upload/categories/" . $imageold)){
                unlink("../upload/categories/" . $imageold);
            }

            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/categories/" . $imagename);

        } else {

            $table = "categories";

            $data = array("categories_name" => $subcatname, "categories_image" => $imageold);

            $where =  "categories_id = $id ";

            $count =  updateData($table, $data, $where);
        }
    }
    countresault($count);
} else {

    zeroCount();
}
