<?php 
session_start();
require_once "header.php";
require_once "config.php";

$dbConnect = new Config();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br>



	<?php

        if(isset($_GET['product_id'])){
        	$theProduct = $dbConnect->selectSpecificProduct($_GET['product_id']);
        ?>

	<div class="row">
        <div class="col-md-2">  </div>
        <div class="col-md-2"> 

                  <img src="images/Pro1.jpg" class="img-rounded" alt="Cinque Terre" width="152" height="168">
        </div>
        <div class="col-md-6">  


          <p><b>Name:</b>&nbsp;&nbsp;&nbsp;<?php echo $theProduct['Product_name']; ?></p>
          <p><b>Description:</b>&nbsp;&nbsp;&nbsp;<?php echo $theProduct['id']; ?></p>
          <p><b>Size:</b>&nbsp;&nbsp;&nbsp;<?php echo $theProduct['Product_name'] ?></p>
          <p><b>Quantity left:</b>&nbsp;&nbsp;&nbsp;<?php echo $theProduct['quantity'] ?></p>
          <p><b>Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $theProduct['new_price'] ?></p>
        </div>
        <div class="col-md-2">  </div>
      </div>

      <div class="row">
          <form class="form-horizontal" role="form" action="cart.php?product_id=<?php echo $_GET['product_id']; ?>" method="post">
              <div class="form-group">
                <label for="sel1" class="col-sm-0"></label>
                <div class="col-sm-9">
                <input type="text" name="number" class="form-control" placeholder="Enter the quantity you want to order">
              </div>
              <div class="col-sm-3">
                  <input type="submit" name="order" class="btn btn-primary" value="Add to cart">
              </div>
              </div>
          </form>
        </div>
      <div class="col-md-2"> 
        </div>
        <?php

      $truth = false;
      $msg = "";
      if(isset($_POST['order'])){
        $qty = $_POST['number'];
        if(is_numeric($qty)){
          if($theProduct['quantity'] >= $qty){
          	$total_amount = $qty * $theProduct['new_price'];
            if($dbConnect->addProductToCart($theProduct['id'], $qty, $_SESSION['id'], $theProduct['new_price'], $total_amount)){
            	if($dbConnect->updateSpecificProduct($theProduct['id'], $qty)){
            		$msg = "You have successfully added ".$qty." ".$theProduct['Product_name'].". Total amount, <b>N".$total_amount."</b> to cart";
              		$truth = true;
              		$url = "cart.php?product_id=".$theProduct['id'];
              		//header("Refresh: 2; URL = '$url'");
          		}
          		else{
          			$msg = "Could not update the product quantity ";
          			$truth = false;
          		}	  
            }


        }
        else{
          $msg = "The quantity you entered is more than the number we have available in the store ";
          $truth = false;
        }
        
      }
      else{
        $msg = "Please enter a valid number";
        $truth = false;
      }
    }
  
    ?>
  <div class="row">
    <?php
    if(isset($_POST['order'])){
      if($truth == false){
        ?>
          <div class="alert alert-danger">
             <?php echo $msg ?>
          </div>
        <?php    
      }

      if($truth == true){
        ?>
          <div class="alert alert-success">
             <?php echo $msg ?>
          </div>
        <?php    
      }
    }
    ?>
    <br><br>
    <center>
    	<a href="order.php"><input type="submit" class="btn btn-default" value="Go back to Order page"></a>
    </center>
    
  </div>
  <?php
}
?>
