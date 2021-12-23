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
    <div class="main_wrapper container-fluid">
        
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
        <div class="col-md-12">
            <div class="col-md-3">
                <div id="sidebar_title">Catagories</div>
                <ul id="cats">
                    <?php 
                        getCats();
                    ?>
                </ul>
                <div id="sidebar_title">Brands</div>
                <ul id="cats">
                    <?php
                        getBrands();
                    ?>
                </ul>
            </div>

            <div id="col-md-9">
                <div id="shopping_cart">
                    <span style="float:right; font-size=18px; padding:5px; line-height:40px;">
                        Welcome Guest!<b style="color:yellow;"> Shopping Cart</b> Total Items: Total Price: <a href="cart.php" style="color:yellow;">Go to Cart</a>
                    </span>
                </div>
                <div>
                    <?php 
                        $get_pro = "select * from products";

                        $run_pro = mysqli_query($con, $get_pro);

                        while($row_pro=mysqli_fetch_array($run_pro)){
                            $pro_id=$row_pro['product_id'];
                            $pro_cat=$row_pro['product_cat'];
                            $pro_brand=$row_pro['product_brand'];
                            $pro_title=$row_pro['product_title'];
                            $pro_price=$row_pro['product_price'];
                            $pro_image=$row_pro['product_image'];

                            echo "
                                <a href='details.php?pro_id=$pro_id'><div class='col-md-2' style='background-color:white; margin:2px;; border-radius:15px; padding:10px; height:400px;'>
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
                                    <p><b> $pro_price TK </b></p>
                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>

                                    <a href='index.php?pri_id=$pro_id'><button style='float:right'>Add to Basket</button></a>
                                </div></a>


                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;"></h2>
        </div>
    </div>


</body>
</html>