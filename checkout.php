<!doctype html>
<?php 
    session_start();
    include("functions/functions.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Food Share</title>
    <link rel="stylesheet" href="css/main.css" media="all"/>
	<link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="main_wrapper">
        
        <div class="header_wrapper">
            
            
            
        </div>
		<nav class="navbar navbar-inverse">
        <div class="container-fluid"><!--menubar-->
			<div class="navbar-header">
                <a href="#" class="navbar-brand" style="font-size: 35px; font-weight:bold; margin-left: 15px;">Food Share</a>
            </div>
            <ul class="nav navbar-nav"> <!--id="menu"--> 
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Foods</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="customer_register.php">Sign up</a></li>
                <li><a href="cart.php">Food Basket</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div id="form">
                <form class="form-group form-inline" method="get" action="results.php" enctype="multipart/form-data">
                    <input class="form-control" type="text" name="user_query" placeholder="Search a Food" />
                    <input class="form-control btn btn-primary" type="submit" name="search" value="Search" />
                </form>
            </div>
        </div>
		</nav>
        <div class="col-md-12"><!--content_wrapper-->
            <div class="col-md-3"><!--sidebar-->
                <div id="sidebar_title">Types of Food</div>
                <ul id="cats">
                    <?php 
                        getCats();
                    ?>
                </ul>
                <div id="sidebar_title">Restaurants</div>
                <ul id="cats">
                    <?php
                        getBrands();
                    ?>
                </ul>
            </div>
            <div class="col-md-9"><!--id="content_area"-->
                
                <?php cart() ?>
                
        <form action="paypal.php" method="post">

                <div id="shopping_cart">
                    <span style="float:right; font-size=16px; padding:5px; line-height:40px;">
                        <?php
                            if(isset($_SESSION['customer_email'])){
                                echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
                            }
                            else{
                                echo "<b>Welcome Guest:</b>";
                            }
                       
                        ?>
                       
                        <b style="color:yellow;"> Shopping Cart</b>
                        
                        <input type="text" style="background-color:black; color:white; border:none; margin-right:-40px;" name="items" value="Total Items: <?php total_items(); ?>">
                        
                        <input type="text" name="price" style="background-color:black; color:white; border:none;margin-right:-40px;" value="Total Price: <?php total_price(); ?> TK">  <a href="cart.php" style="color:yellow;">Go to Cart</a>
                        
                        <?php
                    
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php' style='color:white; text-decoration:none;'>Login</a>";
                            }
                            else{
                                echo "<a href='logout.php' style='color:white; text-decoration:none;'>Logout</a>";?>
                                        <div class="col-md-12 text-center">
                        <h2 align="center">Pay now with Bkash</h2>
    <p style="text_align:center;">
        <img src="Bkash.png" width="30%" height="15%"/>
        
    </p>
                                        <input class="btn btn-primary btn-block" type="submit" value="Pay Now">
                                            </div>

                            <?php }?>

                        
                    </span>
                    
                    
                    
                    </div>
                                </form>

                
                <div id="products_box">
                    <?php 
                        if(!isset($_SESSION['customer_email'])){
                            include("customer_login.php");
                        }
                        else{
                            require("payment.php");
                    }?>
                    
                    
                </div>
            </div>
            
        </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;"></h2>
        </div>
    </div>


</body>
</html>