<?php
if(!isset($_POST['price'])){
    echo"<script>alert('Password or email is incorrect!'); window.location.href='checkout.php';</script>";

    
    
    exit();
}

include("includes/db.php");

$username= mysqli_real_escape_string($con, $_POST['username']);
$password=$_POST['password'];
$price= mysqli_real_escape_string($con, $_POST['price']);

$sel_c = "select * from customers where customer_pass='$password' AND customer_email='$username'";
            $run_c=mysqli_query($con, $sel_c);
            $check_customer=mysqli_num_rows($run_c);
            
            if($check_customer!=1){
                echo"<script>alert('Password or email is incorrect!');  window.location.href='checkout.php';</script>";
               // header('location: checkout.php');
                exit();
            }
            else if($check_customer==1){
                $sel_c = "UPDATE customers SET expenditure = '$price' WHERE customer_email= '$username'" ;
                        $run_c = mysqli_query($con, $sel_c);
                echo "success here ".$run_c;
                if(!$run_c){
                    echo"<script>alert('Db is not right');</script>";
                    //echo $run_c;
                    exit();
                }
                else{
                    header('location: success.php');
                    exit();
                }

            }

            else{
                echo"<script>alert('Something is not right');</script>";

            }

?>