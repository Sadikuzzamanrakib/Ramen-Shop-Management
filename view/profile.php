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
        <div class="edit">
            <button class="edit-btn" id="edit-btn" onclick="Edit()">Edit</button>
        </div>

        </div>
        
        <div class="edit-info">
            <div class="edit-row1">
                <div class="name-block">
                       <span class="input-label">Name</span>
                       <div class="input-field">     
                           <input type="text" name="name-edit" id="name-edit" placeholder="  <?= $user['username']; ?>" readonly>
                        
                       </div>
         

                </div>
             </div>
            
            <div class="edit-row2">
                 <div class="email-block">
                    <span class="input-label">Email</span>
                    <div class="input-field">
         <input type="email" name="email-edit" id="email-edit" placeholder="<?= $user['email']; ?>" readonly >
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

    <script>
            let st= 2 ;
            console.log(st);
      function Edit(){
           // disabled editing st 
           console.log("Edit function called");
        if(st%2==0){
            st++;
            console.log("Enabaling Edit");
            enableEdit();
        }
        else{
            st++;
            disableEdit();
            
        }
            }

        function enableEdit(){
        document.getElementById('name-edit').removeAttribute('readonly');
        document.getElementById('email-edit').removeAttribute('readonly') ; 
        document.getElementById('edit-btn').innerText="Save";
        }
         function disableEdit(){
        document.getElementById('name-edit').setAttribute('readonly', true);
        document.getElementById('email-edit').setAttribute('readonly' ,true) ; 
        document.getElementById('edit-btn').innerText="Edit";
        }
       
     </script>


    
</body>
</html>