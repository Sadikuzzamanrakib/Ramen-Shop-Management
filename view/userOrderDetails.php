<?php
session_start();

if (!isset($_SESSION['order_details'])) {
    echo "<p>No order details found.</p>";
    exit();
}


$orderDetails = $_SESSION['order_details'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/orderDetails.css">
</head>
<body>

    <div class="container">
        <h1>Order Details</h1>
        
        <div class="order-details">
            <div><span class="label">Order ID:</span> <span class="value"><?php echo $orderDetails['id']; ?></span></div>
            <div><span class="label">Food:</span> <span class="value"><?php echo $orderDetails['food']; ?></span></div>
            <div><span class="label">Quantity:</span> <span class="value"><?php echo $orderDetails['quantity']; ?></span></div>
            <div><span class="label">Price:</span> <span class="value">$<?php echo $orderDetails['price']; ?></span></div>
            <div><span class="label">Total:</span> <span class="value">$<?php echo $orderDetails['total']; ?></span></div>
            <div><span class="label">Order Date:</span> <span class="value"><?php echo $orderDetails['order_date']; ?></span></div>
            <div><span class="label">Customer Name:</span> <span class="value"><?php echo $orderDetails['customer_name']; ?></span></div>
            <div><span class="label">Customer Contact:</span> <span class="value"><?php echo $orderDetails['customer_contact']; ?></span></div>
            <div><span class="label">Customer Email:</span> <span class="value"><?php echo $orderDetails['customer_email']; ?></span></div>
            <div><span class="label">Customer Address:</span> <span class="value"><?php echo $orderDetails['customer_address']; ?></span></div>
        </div>

        <div class="order-summary">
            <div class="total">Total Amount: $<?php echo $orderDetails['total']; ?></div>
            <div class="status">Status: <?php echo $orderDetails['status']; ?></div>
        </div>

        <a href="javascript:history.back()" class="btn-back">Back to Previous Page</a>
    </div>

</body>
</html>