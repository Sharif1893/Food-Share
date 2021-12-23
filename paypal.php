<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>

<link rel="stylesheet" href="css/font-awesome.css">


<div class="container">
<hr>

<div class="row">
	<aside class="col-sm-12">

<article class="card">
<div class="card-body p-5">
<p> 
   <img style="margin-left:350px;" src="Bkash.png" height="15%" width="35%">
</p>

    
    
<p class=" text-center alert alert-success"><?php echo $_POST['items'];?>
                            <br><br>
                            <?php echo $_POST['price'];?> BDT
</p>
    
<p class="alert alert-success text-center">Please Enter Your Credentials to Verify and Payment</p>

<form role="form" class="col-md-12" action="pay.php" method="post">
<div class="form-group ">
<label for="username">ENTER YOUR BKASH ACCOUNT NUMBER</label>
<div class="input-group col-md-12">
	<div class="input-group-prepend">
<!--		<span class="input-group-text"><i class="fa fa-user"></i></span>-->
	</div>
	<input type="number" class="form-control" name="username" placeholder="" required="">
	<input type="hidden" class="form-control" name="price" value="<?php echo $_POST['price'];?>" >
</div> <!-- input-group.// -->
</div> <!-- form-group.// -->

<div class="form-group">
<label for="cardNumber">ENTER YOUR PIN</label>
<div class="input-group col-md-12">
	<div class="input-group-prepend">
<!--		<span class="input-group-text"><i class="fa fa-credit-card"></i></span>-->
	</div>
	<input type="password" class="form-control" name="password" placeholder="" required="">
</div> <!-- input-group.// -->
</div> <!-- form-group.// -->


<!--<button class="subscribe btn btn-primary btn-block" type="button" onlcick="pay();"> Pay  </button>-->
<input class="subscribe btn btn-primary btn-block" type="submit"> 
</form>
</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
	<aside class="col-sm-6">



	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

<br><br>

<script type="application/javascript">

    function pay(){
        
        
    }
</script>
