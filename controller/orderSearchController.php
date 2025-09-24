<?php
session_start();
include("../model/userOrderModel.php");

header('Content-Type: application/json');

$userEmail = $_SESSION['user']['email'] ?? null;
$searchTerm = $_GET['search'] ?? "";

$orders = [];

if (!empty($searchTerm) && $userEmail) {
    $orders = searchOrdersByEmail($searchTerm, $userEmail); 
}

echo json_encode($orders);
exit;
