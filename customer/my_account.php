<!doctype html>
<?php 
    session_start();
    include("functions/functions.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
    <link rel="stylesheet" href="css/main.css" media="all"/>
</head>
<body>
    <div class="main_wrapper">
        
        <div class="header_wrapper">
            <img id="logo" src="images/echo_march.jpg"/>
            <img id="banner" src="images/Ecommerce-Banner.png"/>
            
            
        </div>
        <div class="menubar">
            <ul id="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../all_products.php">All Products</a></li>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="../customer_register.php">Sign up</a></li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search a Product" />
                    <input type="submit" name="search" value="Search" />
                </form>
            </div>
        </div>
        <div class="content_wrapper">
            <div id="sidebar">
                <div id="sidebar_title">My Account</div>
                <ul id="cats">
                    
                    <?php
                    
                    $user=$_SESSION['customer_email'];
                    $get_img = "select * from customers where customer_email='$user'";
                    $run_img=mysqli_query($con, $get_img);
                    
                    $row_img=mysqli_fetch_array($run_img);
                    
                    $c_image=$row_img['customer_image'];
                    
                    $c_name = $row_img['customer_name'];
                    
                    echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' heigh='150'/></p>";
                    
                    ?>
                    
                    <li><a href="my_account.php?my_orders">My orders</a></li>
                    <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                </ul>
                
            </div>

            <div id="content_area">
                
                <?php cart() ?>
                
                <div id="shopping_cart">
                    <span style="float:right; font-size=16px; padding:5px; line-height:40px;">
                        <?php
                            if(isset($_SESSION['customer_email'])){
                                echo "<b>Welcome: </b>" . $_SESSION['customer_email'];
                            }
                       
                        ?>
                        <?php
                    
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='../checkout.php' style='color:white; text-decoration:none;'>Login</a>";
                            }
                            else{
                                echo "<a href='../logout.php' style='color:white; text-decoration:none;'>Logout</a>";
                            }

                        ?>
                    </span>
                    
                    
                    
                </div>
                <div id="products_box">
                    
                    <h2 style="padding:20px;">Welcome: <?php echo $c_name; ?></h2><br>
                    
                    <b>You can see your orders' progress by clicking this <a href="my_account.php?my_orders">link</a></b>
                    
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;"></h2>
        </div>
    </div>


</body>
</html>