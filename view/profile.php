<?php

include('../partials-front/menu.php');
session_start();
$user = $_SESSION['user'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
         <h2>  
        Profile Information
    </h2>

   
    <div class="container">
        <div class="stored-info">

            <div class="image">
                 <img src="../pic1.jpg" alt="picture here" class="profile-pic">
        </div>
        <div class="profile-info">
            <div class="name">
              <?= $user['username']; ?>
            </div>
            <div class="email">
                      <?= $user['email']; ?>
            </div>
    </div>

   

    <h2>Purchase History</h2>

    <table class="purchase-history-table">
        <tr>
            <th>Order Id</th>
            <th>Date</th>
            <th>Items</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
    </table>

    <script>
    
    
       
     </script>


    
</body>
</html>