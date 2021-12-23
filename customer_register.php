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
                        <b style="color:yellow;"> Shopping Cart</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> TK <a href="cart.php" style="color:yellow;">Go to Cart</a>
                        <?php
                    
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php' style='color:white; text-decoration:none;'>Login</a>";
                            }
                            else{
                                echo "<a href='logout.php' style='color:white; text-decoration:none;'>Logout</a>";
                            }

                        ?>
                    </span>
                    
                    
                    
                </div>
                <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    <table class="form" align="center" width="750" style="color:white;">
                        <tr class="form-group" align="center">
                            <td class="form-header" colspan="6"><h2>Create an Account</h2><br></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer Name:</td>
                            <td><input class="form-control" type="text" name="c_name" required/></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer Email:</td>
                            <td><input class="form-control" type="email" name="c_email" required/></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer Password:</td>
                            <td><input class="form-control" type="password" name="c_pass" required/></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer image:</td>
                            <td><input class="form-control" type="file" name="c_image" required/></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer Country:</td>
                            <td><select class="form-control" name="c_country">
                                <option>Select a Country</option>
                                <option>Afganistan</option>
                                
                               <option>Bangladesh</option> <option>India</option>
                                <option>Japan</option>
                                <option>Pakistan</option>
                                
                               <option>Nepal</option> <option>United Arab Emirates</option>
                                <option>United States</option>
                                <option>United Kingdom</option>
                                
                               <option>Vutan</option> <option>Myanmar</option>
                                <option>Srilanka</option>
                                </select> </td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer City:</td>
                            <td><input class="form-control" name="c_city" required/></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer Contact:</td>
                            <td><input class="form-control" type="text" name="c_contact" required/></td>
                        </tr>
                        <tr class="form-group">
                            <td align="right">Customer Address:</td>
                            <td><textarea class="form-control" cols="20" rows="5" name="c_address"></textarea> </td>
                        </tr>
                        <tr class="form-group" align="center">
                            <td colspan="6"><input class="form-control btn btn-primary" type="submit" name="register" value="Create Account"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="footer">
            
        </div>
    </div>


</body>
</html>

<?php 
    if(isset($_POST['register'])){
        $ip = getIp();
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        
        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
        
        $insert_c="insert into customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
        $run_c=mysqli_query($con,$insert_c);
        
        $sel_cart ="select * from cart where ip_add='$ip'";
        
        $run_cart=mysqli_query($con, $sel_cart);
        $check_cart=mysqli_num_rows($run_cart);
        
        if($check_cart==0){
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('Account has been created successful! Thank You!')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }
        else {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('Account has been created successful! Thank You!')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        
        
    }

?>