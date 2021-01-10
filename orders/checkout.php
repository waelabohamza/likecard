<?php

include "../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$price          = $data['price'];

// $resid      = $data['quantity']      ;
$items          = $data['items'];
$count          = $data['count'];
$email          = $data['email'];
$id             = $data['id'];
$username       = $data['username'];

$date =  $data['date'];

$dataorders = array(
    "orders_users" => $id,
    "orders_price" => $price,
    "orders_date"  =>  $date,
);

$countorders = insertData("orders", $dataorders);

if ($countorders > 0 ) {
  
    $maxidorders = maxId("orders.orders_id" , "orders");

    // print_r($data['items'][0]['items_id']) ; 

    for($i = 0 ; $i < count($items) ; $i++){
              $quantityitems = $data['quantity'][$data['items'][$i]['items_id']] ; 
              $itemsid = $data['items'][$i]['items_id'] ; 
            //   echo $quantityitems ; 
              $dataordersdetails = array(
                 "ordersdetails_items" => $itemsid , 
                 "ordersdetails_order" => $maxidorders  ,
                 "ordersdetails_quantity" => $quantityitems
              ) ; 
              $countordersdetails = insertData("ordersdetails" , $dataordersdetails) ;          
    }
}else {
    // faild Orders 
         echo json_encode(array("status" => "orders faild"));
    // End faild Orders
}


