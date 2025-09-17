    <?php include('../partials-front/menu.php'); ?>

    <!-- Search Section -->
    <section class="food-search text-center">
        <div class="container">
            
          <form action="<?php echo SITEURL; ?>view/food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Ramen.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
 
   <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>


    <!-- Explore Ramen Section -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Ramen</h2>

           <?php 
                
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
               
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                      $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>view/category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                             
                                    if($image_name=="")
                                    {
                                       
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                     
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Egg Ramen" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php

                    }

                }

                     {
                                       
                                        echo "<div class='error'>Image Available</div>";
                                    }

?>

          
          

            <div class="clearfix"></div>
        </div>
    </section>
 

    <!-- Our Ramen Menu Section -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Our Ramen Menu</h2>
             <?php 
            
        
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 4";

            
            $res2 = mysqli_query($conn, $sql2);

           
            $count2 = mysqli_num_rows($res2);

           
            if($count2>0)
            {
                
                while($row=mysqli_fetch_assoc($res2))
                {
                   
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                              
                                if($image_name=="")
                                {
                                  
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                  
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Tonkotsu Ramen" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
            
                              </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>view/order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
               
                echo "<div class='error'>Food not available.</div>";
            }
            
            ?>


            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    
  
        <?php include('../partials-front/footer.php'); ?>
