<?php
session_start() ;
 include('../partials-front/menu.php'); ?>
<?php 
      
        if(isset($_GET['food_id']))
        {
          
            $food_id = $_GET['food_id'];

            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
          
            $res = mysqli_query($conn, $sql);
        
            $count = mysqli_num_rows($res);
           
            if($count==1)
            {
               
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                
                header('location:index.php');
            }
        }
        else
        {
          
            header('location:index.php');
        }
    ?>


   <section class="food-order">
        <div class="container">
            
            <h2 class="text-center text-black">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                         
                            if($image_name=="")
                            {
                               
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                            
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Tonkotsu Ramen" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
    
                   <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" class="input-responsive" readonly value="<?php echo $_SESSION['user']['username'] ?>">

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter your phone number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="input-responsive" readonly value="<?php echo $_SESSION['user']['email'] ?>">

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder=" Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 

             
              if (isset($_POST['submit'])) {
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty; 

    $order_date = date("Y-m-d H:i:s");  // use SQL datetime format

    $status = "Ordered"; 

    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

    $sql2 = "INSERT INTO tbl_order 
        (food, price, quantity, total, order_date, status, customer_name, customer_contact, customer_email, customer_address)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql2);
    $stmt->bind_param(
        "sdidssssss", 
        $food, 
        $price, 
        $qty, 
        $total, 
        $order_date, 
        $status, 
        $customer_name, 
        $customer_contact, 
        $customer_email, 
        $customer_address
    );

    $res2 = $stmt->execute();
    $stmt->close();

    if ($res2) {
            $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
        }
     else {
            $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food. " . $conn->error . "</div>";
        }
            header("Location: index.php");
            exit;

}
            
            ?>

        </div>
    </section>
 
     <?php include('../partials-front/footer.php'); ?>





   