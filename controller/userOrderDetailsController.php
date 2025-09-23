<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("../model/userOrderModel.php");

header('Content-Type: application/json');  


if($_SERVER["REQUEST_METHOD"] == "GET"){
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    $orderDetails = getOrderById($orderId); 

    if ($orderDetails) {
        $_SESSION['order_details']=$orderDetails;
        echo json_encode([
            'success' => true,
            'data' => $orderDetails
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No order found with this ID'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Order ID is required'
    ]);
}}
else{
    echo json_encode([
        'success' => false,
        'message' => 'Method is not GET'
    ]);
}
?>