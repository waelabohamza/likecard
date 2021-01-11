<?php

include "../connect.php";

$data = json_decode(file_get_contents('php://input'), true);

$price          = $data['price'];
//===============================================
// VAR
//===============================================
$items          = $data['items'];
$count          = $data['count'];
$email          = $data['email'];
$id             = $data['id'];
$username       = $data['username'];
$date =  $data['date'];

//===============================================
// Insert Data In Orders Step 1 
//===============================================

$dataorders = array(
    "orders_users" => $id,
    "orders_price" => $price,
    "orders_date"  =>  $date,
);

$countorders = insertData("orders", $dataorders);

if ($countorders > 0) {
    //===============================================
    // Insert Data In OrdersDetails Step 2 
    //===============================================
    $maxidorders = maxId("orders.orders_id", "orders");
    // print_r($data['items'][0]['items_id']) ; 
    for ($i = 0; $i < count($items); $i++) {
        $quantityitems = $data['quantity'][$data['items'][$i]['items_id']];
        $itemsid = $data['items'][$i]['items_id'];
        //   echo $quantityitems ; 
        $dataordersdetails = array(
            "ordersdetails_items" => $itemsid,
            "ordersdetails_order" => $maxidorders,
            "ordersdetails_quantity" => $quantityitems
        );
        $countordersdetails = insertData("ordersdetails", $dataordersdetails);
        //===============================================
        // Get Data In OrdersCodes Step 3  Inside For 
        //===============================================

        $codes = getAllData("codes", "codes_items = $itemsid LIMIT   $quantityitems  ");
        $datacodes =   $codes['values'];
        $datacount =   $codes['count'];

        //===============================================
        // Insert Data In OrdersCodes Step 4  Inside For 
        //===============================================

        for ($a = 0; $a < count($datacodes); $a++) {
            $codesname = $datacodes[$a]['codes_name'];
            $dataorderscodes = array(
                "orderscode_code"   => $codesname,
                "orderscode_orders" =>  $maxidorders
            );
            $countinsertorderscodes  =  insertData("orderscode", $dataorderscodes);
            //============================================================
            // Update Data Codes  In table Codes for un Active Code  Step 5 
            //============================================================
            $dataupdatecodes = array(
                'codes_active' => 0
            );
            $countupdatetablecodes = updateData("codes", $dataupdatecodes, "codes_name  = $codesname");
        }
    }



    if ($countordersdetails > 0 && $countupdatetablecodes > 0 && $countinsertorderscodes  > 0) {

        echo json_encode(array("status" => "success"));


        // ====================================================

    } else {
        echo json_encode(array("status" => "orders details faild"));
    }
} else {
    // faild Orders 
    echo json_encode(array("status" => "orders faild"));
    // End faild Orders
}
