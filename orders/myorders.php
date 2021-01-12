<?php 

include "../connect.php" ; 

$userid = superFilter($_POST['id']) ; 

$myorders  = getAllData("myordersview" , "users_id = $userid"  );

$datamyorders      = $myorders['values'] ; 

$datamyorderscount = $myorders['count'] ; 

if ($datamyorderscount > 0) {
    
    echo json_encode($datamyorders) ; 

}else {

   zeroCount() ; 

}




/*
==================================================
My Orders Views  
==================================================
CREATE VIEW  myordersview  AS 
SELECT codes.codes_name  , 
      items.items_name ,
      subcategories.subcategories_name , 
      categories.categories_name , 
      users.users_name , 
      users.users_id
FROM 
   codes
INNER JOIN 
   items ON items.items_id = codes.codes_items 
INNER JOIN   
   subcategories   ON items.items_cat  = subcategories.subcategories_id
INNER JOIN   
   categories   ON subcategories.subcategories_cat  = categories.categories_id
INNER JOIN   
   users   ON users.users_id  = codes.codes_users
*/
