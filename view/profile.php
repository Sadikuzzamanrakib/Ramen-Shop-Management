<?php

include('../partials-front/menu.php');

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
                 John Doe 
            </div>
            <div class="email">
                    johndoe@example.com
            </div>
            <div class="number">
                555-1234
            </div>

        </div>
        <div class="edit">
            <button class="edit-btn">Edit</button>
        </div>

        </div>
        
        <div class="edit-info">
            <div class="edit-row1">
                <div class="name-block">
                       <span class="input-label">Name</span>
                       <div class="input-field">     
                           <input type="text" name="name-edit" id="name-edit" placeholder="John Doe">
                        
                       </div>
         

                </div>
             </div>
            
            <div class="edit-row2">
                 <div class="email-block">
                    <span class="input-label">Email</span>
                    <div class="input-field">
 <input type="email" name="email-edit" id="email-edit" placeholder="johndoe@example.com">
                    </div>
                   
                 </div>
                
                 <div class="number-block">
                     <span class="input-label">Phone</span>
                      <div class="input-field">
                        <input type="text" name="number-edit" id="number-edit" placeholder=" 555-1234">
                      </div>
                 </div>

            </div>

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


    
</body>
</html>