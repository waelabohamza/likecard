<?php


define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$now = date('Y-m-d H:i:s', time());

function superFilter($var)
{
    return  htmlspecialchars(strip_tags(trim($var)));
}

function getAllData($table, $where = null, $values = null, $and = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where  $and ");
    $stmt->execute($values);
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    $data['values'] = $values;
    $data['count'] = $count;
    return $data;
}
function insertData($table, $data)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
}


function updateData($table, $data, $where)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    return $count;
}

function deleteData($table, $col, $value)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $col  = ? ");
    $stmt->execute(array($value));
    $count = $stmt->rowCount();
    return $count;
}
// ==============

function getData($table, $where, $value, $and = NULL)
{

    global $con;

    $data = array();

    $stmt = $con->prepare("SELECT * FROM $table WHERE $where = ? $and  ");

    $stmt->execute(array($value));

    $count = $stmt->rowCount();

    $item = $stmt->fetch();

    $data['count'] = $count;
    $data['values'] = $item;

    return $data;
}


//===========================

function deleteFile( $filedir , $imageold ){

    if (file_exists("../upload/" . $filedir . "/" . $imageold)) {
        unlink("../upload/" . $filedir . "/" . $imageold);
    }
}

// ==========================
//  count faild or success
// ==========================

function zeroCount()
{
    echo json_encode(array(0 => "falid"));
}


function countresault($count)
{
    if ($count  > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "faild"));
    }
}






























// ======================================
//  Image Upload Function 
// ======================================

 

  function image_data($imagerequset) {
    global  $msgerrors ;
    $imagename          = $_FILES[$imagerequset]['name']           ; 
    $imagetype          = $_FILES[$imagerequset]['type']           ;  
    $imagetmp           = $_FILES[$imagerequset]['tmp_name']       ; 
    $imagesize          = $_FILES[$imagerequset]['size']           ;   
    $allowextention     = array("jpg" , "png" , "jpeg" , "gif") ; 
    $strtoarray         = explode("." , $imagename )         ;
    $imageextentionone  = end( $strtoarray )                    ;
    $imageextension     = strtolower($imageextentionone)        ;
     if (!empty($imagename) && !in_array($imageextension,$allowextention)){
                  $msgerrors[] = " هذا الملف ليس صورة يرجى التاكد من صيغة الملف " ; 
    }
     if ($imagesize > 10 * MB){
                 $msgerrors[] = " الصورة حجمها كبير يرجى اختيار صورة اقل من 10 ميغا  " ; 
    }
    $image = array() ; 
    $image['name'] = $imagename ; 
    $image['tmp'] =  $imagetmp  ; 
    return  $image  ; 
  }

function image_upload($imagename , $imagetmp , $directory) {

  
    if (!empty($imagename)) {

      $image = rand(0,1000000) . "_" . $imagename  ;
      move_uploaded_file($imagetmp, "uploads/".$directory."/".$image) ;
      }else {
      $image = "" ; 
      }

      return $image ; 

}

function edit_image ($imagename , $imageold , $imagetmp , $directory) {
 
  if(!empty($imagename)){
        $image = rand(0,10000) . "_" . $imagename  ; 
      if (file_exists($directory . $imageold ) && $imageold != ""){
          unlink($directory. $imageold) ; 
      }  
    move_uploaded_file($imagetmp , $directory . $image) ;
  }else {
        $image = $imageold; 
  }
  return $image ; 


}

  //==================================================
  // End Functions Upload 
  //==================================================