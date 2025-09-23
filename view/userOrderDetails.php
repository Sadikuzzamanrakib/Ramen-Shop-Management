<?php
session_start();

// Check if order details are stored in the session
if (!isset($_SESSION['order_details'])) {
    echo "<p>No order details found.</p>";
    exit();
}

// Retrieve the order details from the session
$orderDetails = $_SESSION['order_details'];

// Clear the session data after displaying
unset($_SESSION['order_details']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .order-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-details div {
            font-size: 1.2rem;
            color: #555;
        }

        .order-details .label {
            font-weight: bold;
            color: #333;
        }

        .order-details .value {
            color: #777;
        }

        .btn-back {
            display: block;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 30px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #45a049;
        }

        .order-summary {
            margin-top: 20px;
            text-align: center;
        }

        .order-summary .total {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
        }

        .order-summary .status {
            font-size: 1.2rem;
            font-weight: 600;
            color: #4CAF50;
        }
    </style>
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