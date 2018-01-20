<?php 
@session_start();
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


<div class="container">
  <?php 
  /*if(isset($_GET['p_id']))
  {*/
    $product = $dbConnect->select_a_product_in_category($_GET['p_id']);

   

    //processing order
    $msg = "";
    if(isset($_POST['order']))
      {
        if(!($_POST['qty'] == ""))
        {
        
            if(is_numeric($_POST['qty']))
            {
              if($_POST['qty'] > 0)
              {
              
              $product_rem = $dbConnect->checkProductRemaining($product['id']);
              if($_POST['qty'] <= $product_rem  )
              {
                $total_amount = $product['new_price'] * $_POST['qty'];
                if($dbConnect->addProductToCart($product['id'], $_POST['qty'], $_SESSION['id'], $product['new_price'], $total_amount))
                {
                  $dbConnect->updateSpecificProduct($product['id'], $_POST['qty']);
                  $msg =  "Your order has been successfully made";
                  //$url = "order.php?p_id=".$product['id'];
                  header("Location: message.php");
                }else
                {
                  $msg = "There was a problem processing your order";
                }
              }else
              {
                $msg = "The quantity you entered is more than the quantity in stock";
              }
              
            }else
            {
              $msg = "Quantity should be one and above";
            }
          }else
          {
            $msg = "Please enter a valid quantity";
          }
        }
        else
        {
          $msg = "Quantity should not be empty";
        }
      }
  ?>

  <center><h2><?php echo $product['Product_name'] ?></h2></center> 
  
  <br><br>
    <div class="row">
      <div class="col-md-5">
        <img src="<?php echo 'image/'.$product['image'] ?>" width="400" height="500">
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <br><br>
        <table class="table">
          <tr>
            <th>Product name</th><td><?php echo $product['Product_name'] ?></td>
          </tr>
          <tr>
            <th>Quantity in stock</th><td><?php echo $product['quantity'] ?></td>
          </tr>
          <tr>
            <th>Product price</th><td><?php echo $product['new_price'] ?></td>
          </tr>
        </table>
        <br><br>

        <?php
        if(isset($_POST['order'])){
          ?>
          <div class="row">
            <p class="alert alert-success"><?php echo $msg; ?></p>
          </div>
          <?php
        }
        ?>
        <div class="form-group">
        <form action="order.php?p_id=<?php echo $product['id'] ?>" method = "POST" >
           <input type="text" name="qty" class="form-control" placeholder="Enter the quantity here"><br>
           

           <input type="submit" name="order" class="btn btn-primary" value="Place Order">
        </form>
      </div>
      </div>
    </div>

  </div>

    <?php

//}
          
    

    ?>


</body>
</html>
