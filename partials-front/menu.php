<?php include('../model/constants.php');

session_start();
$user = $_SESSION['user'] ?? null;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramen House</title>
    <link rel="shortcut icon" href="../images/ramen logo.png" type="image/x-icon">
   
    <link rel="stylesheet" href="../css/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>

<body>
   
    <!-- Header Section -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <span><img src="../images/ramen logo.png" alt="Ramen House Logo" width="80" height="80"></span>
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
                       <?php if ($user): ?>
                     <!-- User Logged In -->
                    <li><a href="profile.php">Profile (<?= htmlspecialchars($user['username']) ?>)</a></li>
                    <li><a href="../controller/userLogoutController.php">Logout</a></li>
                    <?php else: ?>
                    <!-- NO Login -->
                     <li>
                        <a href="<?php echo SITEURL; ?>view/registration.php">Login</a>
                    </li>
                    <?php endif; ?>
                     <li>
                        <a href="<?php echo SITEURL; ?>controller/login.php">Admin</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
