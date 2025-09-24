<?php
session_start();
include("../model/userOrderModel.php");

header('Content-Type: application/json');

$userEmail = $_SESSION['user']['email'] ?? null;
$q = $_GET['q'] ?? "All";

$orders = [];

    $orders =getOrderByStatusAndEmail($q, $userEmail); 

echo json_encode($orders);
exit;