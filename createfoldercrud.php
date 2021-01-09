<?php

$folder = "test";  // name folder 
$namefile = "items"; // name file 

$vals = array("name" , "cat" , "image"); 

// Create Folder 
mkdir($folder);  
//======================================
// SELECT
//======================================

$myfileselect = fopen("$folder/" . $namefile . ".php", 'w');
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = '<?php
include "../connect.php";
$id  = superFilter($_POST["id"]) ; 
$data = getAllData("' . $namefile . 'view", "' . $namefile . '_cat = $id");
if ($data["count"] > 0) {
    echo json_encode($data["values"]);
} else {
    zeroCount();
}
';
fwrite($myfileselect, $txt);
fclose($myfileselect);

//======================================
// Add
//======================================

$myfileadd = fopen("$folder/" . $namefile . ".php", 'w');
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = '<?php
include "../connect.php";

$filedir = "items";

$table = "items";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach($vals as $val){
        $val     = superFilter($_POST[$val]) ;
    } 

    $values = array(

        "items_name" => $name,
        "items_point" => $point,
        "items_image" => $imagename,
        "items_cat" => $cat,
        "items_price" => $price,
        "items_desc" => $descr,
        "items_discount" => $discount 

    );

    $count = insertData($table, $values);

    if ($count > 0) {

        move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $filedir . "/" . $imagename);
    }

    countresault($count);
}

';
fwrite($myfileadd, $txt);
fclose($myfileadd);

//======================================
// EDIT
//======================================


//======================================
// Delete
//======================================

$myfiledelete = fopen("$folder/delete" . $namefile . ".php", 'w');
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = '<?php
include "../connect.php";
$table = "' . $namefile . '" ; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = superFilter($_POST["id"]);
    $count = deleteData("' . $namefile . '", "' . $namefile . '_id", $id);
    countresault($count);
}else {
    zeroCount() ; 
}';
fwrite($myfiledelete, $txt);
fclose($myfiledelete);
