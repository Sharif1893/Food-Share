<?php

    include("includes/db.php");

?>
<div>
    <form style="color:white;" method="post" action="">
        <table class="form" width="500" align="center" bgcolor="skyblue">
            <tr class="form-group" align="center">
                <td class="form-header" colspan="2"><h2>Login or Register to Buy!</h2></td>
            </tr>
            <tr class="form-group">
                <td align="right"><b>Email:</b></td>
                <td><input class="form-control" type="email" name="email" placeholder="Email"/> </td>
            </tr>
            <tr class="form-group">
                <td align="right"><b>Password:</b></td>
                <td><input class="form-control" type="password" name="pass" placeholder="Password"/></td>
            </tr>
            <tr class="form-group" align="center"><td></td>
                <td colspan="2" style="font-size:12px;"><a href="checkout.php?forgot_pass">Forgot Password?</a> </td>
            </tr>
            <tr class="form-group"><td></td><td><input  class="form-control btn btn-primary" type="submit" name="login" value="Login"/> </td></tr>
        </table>
        <h3 align="center" style="float:left; padding:5px; width:500px;"><a href="customer_register.php" style="text-decoration:none; color:#21990c;">Register Here</a></h3>
    </form>
    
    <?php
    
        if(isset($_POST['login'])){
            $c_email=$_POST['email'];
            $c_pass=$_POST['pass'];
            
            $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
            $run_c=mysqli_query($con, $sel_c);
            $check_customer=mysqli_num_rows($run_c);
            
            if($check_customer==0){
                echo"<script>alert('Password or email is incorrect!')</script>";
                exit();
            }
            $ip=getIp();
            $sel_cart ="select * from cart where ip_add='$ip'";
        
            $run_cart=mysqli_query($con, $sel_cart);
            $check_cart=mysqli_num_rows($run_cart);
            
            if($check_customer>0 AND $check_cart==0){
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You logged in successfully! Thank You!')</script>";
                echo "<script>window.open('customer/my_account.php','_self')</script>";
            }
            else{
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You logged in successfully! Thank You!')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
        }
    
    ?>
    
</div>