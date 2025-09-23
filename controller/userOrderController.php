<?php
session_start();
include("../model/userOrderModel.php");

$userEmail = $_SESSION['user']['email'] ?? null;
$orders = [];

if ($userEmail) {
    $orders = getOrdersByUserEmail( $userEmail);
    echo json_encode($orders);
}
