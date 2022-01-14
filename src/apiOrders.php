<?php

include 'orders.php';

class ApiOrders{
    function getAll(){
        $orders = new Orders();
        $ordersinfo = array();
        $ordersinfo['register']= array();
        
        $result = $orders->getAll();
        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                'id_order'=>$row['id_order'],
                'date'=>$row['date'],
                'company'=>$row['company'],
                'qty'=>$row['qty'],
                );
                array_push($ordersinfo['register'], $register);
            }
            http_response_code(200);
            echo json_encode($ordersinfo);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>'Elemento no encontrado'));
        }
    }
    function getCompany(){
        $orders = new Orders();
        $ordersinfo = array();
        $ordersinfo['register']= array();
        
        $result = $orders->getCompany($_GET['company']);
        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                'id_order'=>$row['id_order'],
                'date'=>$row['date'],
                'company'=>$row['company'],
                'qty'=>$row['qty'],
                );
                array_push($ordersinfo['register'], $register);
            }
            http_response_code(200);
            echo json_encode($ordersinfo);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>'Elemento no encontrado'));
        }
    }
    function getDate(){
        $orders = new Orders();
        $ordersinfo = array();
        $ordersinfo['register']= array();
        
        $result = $orders->getDate($_GET['date']);
        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                'id_order'=>$row['id_order'],
                'date'=>$row['date'],
                'company'=>$row['company'],
                'qty'=>$row['qty'],
                );
                array_push($ordersinfo['register'], $register);
            }
            http_response_code(200);
            echo json_encode($ordersinfo);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>'Elemento no encontrado'));
        }
    }
}
$api = new ApiOrders();
if(isset($_GET['company'])){
    $api->getCompany();
}else if(isset($_GET['date'])){
    $api->getDate();
}else{
$api->getAll();
}
?>