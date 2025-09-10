<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .contact-info{

            border-radius: 5px;
            border : none ;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
            margin-bottom: 80px;
        }
        .info{

            width: 1fr;
            
        }
        
    </style>
</head>
<body>

     <section class="navbar">
        <div class="container">
            <div class="logo">
                   <span style="font-size: 46px;  color: #02633e;">Ramen Station</span>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>view/index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view/categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view/foods.php">Foods</a>
                    </li>
                
                    <li>
                        <a href="<?php echo SITEURL; ?>view/contact.php">Contact</a>
                    </li>
                     <li>
                        <a href="<?php echo SITEURL; ?>view/profile.php">Profile</a>
                    </li>
                     <li>
                        <a href="<?php echo SITEURL; ?>controller/login.php">Login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <section class="food-search text-center">
        <div class="container">

        </div>
    </section>
 

<div class="contact-info">
    <div class="info">
    <h2 style="padding-left: 45px; color:#02633e">Contact Us</h2>
    <h3>ramenhouse@email.com</h3>
    <h3 style="padding-left: 30px; padding-top: 10px;">+12321 12320 324</h3>
    </div>
</div>


    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Group-4</a></p>
        </div>
    </section>
    
</body>
</html>