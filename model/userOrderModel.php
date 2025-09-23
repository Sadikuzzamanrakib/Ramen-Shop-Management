<?php
include("constants.php");

function getOrdersByUserEmail( $email) {
    global $conn;
    $sql = "SELECT*
            FROM tbl_order 
            WHERE customer_email = ? 
            ORDER BY order_date DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    $stmt->close();
    return $orders;
}

function getOrderById($order_id) {
    global $conn;
    $sql = "SELECT* FROM tbl_order WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        $order = null;  
    }

    $stmt->close();

    return $order;
}