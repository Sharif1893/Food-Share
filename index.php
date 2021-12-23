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
		<nav class="navbar navbar-light navbar-fixed-top"style="background-color: #beddf3;">
        <div class="container-fluid"><!--menubar-->
			<div class="navbar-header fixed-top">
                <a href="#" class="navbar-brand" style="font-size: 35px; color:DeepPink; font-weight:bold; margin-left: 15px;">Food Share</a>
            </div>
            <!--id="menu"-->
            <ul class="nav navbar-nav mx-50px text-success" style="font-size: 15px; font-weight:bold;">  
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Foods</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="customer_register.php">Sign up</a></li>
                <li><a href="cart.php">Food Basket</a></li>
                <li><a href="index.php">Contact Us</a></li>
            </ul>
            <div id="form">
                <form class="form-group form-inline" method="get" action="results.php" enctype="multipart/form-data">
                    <input class="form-control" type="text" name="user_query" placeholder="Search a Food" />
                    <input class="form-control btn btn-primary" type="submit" name="search" value="Search" />
                </form>
            </div>
        </div>
		</nav>
        <div class="col-md-12" style="background-color:DeepPink;margin-top: 61px;"><!--content_wrapper-->
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
                
                <div id="shopping_cart" style="margin:10px; font-size:15px; background-color:DeepPink;">
                    <span style="float:center; font-size=50px; padding:60px; line-height:50px;">
                        <?php
                            if(isset($_SESSION['customer_email'])){
                                echo "<b>Welcome:  </b> " . $_SESSION['customer_email'] . "<b style='color:yellow;'>&nbsp Your</b>";
                            }
                            else{
                                echo "<b>Welcome Guest:</b>";
                            }
                       
                        ?>
                        <b style="color:yellow;"> Shopping Cart</b>  &nbsp Total Items: <?php total_items(); ?> &nbsp Total Price: <?php total_price(); ?> TK <a href="cart.php" style="color:yellow;">&nbsp Go to Cart</a>
                        <?php
                    
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php' style='color:black; text-decoration:none; font-weight:bold; margin-bottom:40px;'>&nbsp Login</a>";
                            }
                            else{
                                echo "<a href='logout.php' style='color:blue; text-decoration:none;'>&nbsp Logout</a>";
                            }

                        ?>
                    </span>
                    
                    
                    
                </div>
                <div><!--id="products_box"-->
                    <?php getPro();  ?>
                    <?php getCatPro(); ?>
                    <?php getBrandPro(); ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;"></h2>
        </div>
    </div>


</body>
</html>