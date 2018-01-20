<?php 
@session_start();
require_once "header.php";
require_once "config.php";

$dbConnect = new Config();

$user = $dbConnect->my_account($_SESSION['id']);
$invoice = $dbConnect->customer_order($_SESSION['id']);
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

  <div class="container" >

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-7">
        <p style="font-size: 25px; font-weight: bold">My invoice</p>
      </div>
      <div class="col-md-2"></div>
    </div>
    <br>
        <?php
    if(count($invoice) > 0)
    {

      ?>
      
    <div class="row">
      <div class="col-md-2"></div>

      <div class="col-md-8">
        <table class="table">
          <tr><th>Customer's Name</th><td><?php echo $user['Surname']." ".$user['Other_name'] ?></td></tr>
          <tr><th>Email</th><td><?php echo $user['Email_address'] ?></td></tr>
          <tr><th>Phone number</th><td><?php echo $user['Phone_number'] ?></td></tr>
          <tr><th>Home address</th><td><?php echo $user['Home_address'] ?></td></tr>
          <tr><th>Payment type</th><td>Pay on delivery</td></tr>
        </table>
      </div>
      <div class="col-md-2"></div>
    </div>

    <br><br>



    <div class="row">
      <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                    <tr>
                      <td><strong>Item</strong></td>
                      <td ><strong>Price</strong></td>
                      <td ><strong>Quantity</strong></td>
                      <td ><strong>Amount</strong></td>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $total_amount = 0;
                  foreach ($invoice as $key => $value) {
                   ?>
                    <tr>
                      <td><?php echo $value['Product_name'] ?></td>
                      <td><?php echo $value['unit_price'] ?></td>
                      <td ><?php echo $value['qty'] ?></td>
                      <td ><?php echo ($value['qty'] * $value['unit_price']) ?></td>

                    </tr>
                  <?php
                  $total_amount += ($value['qty'] * $value['unit_price']);
                  }
                ?>
                <tr>
              <th colspan="3">Total Amount of products</th>
              <th><?php echo $total_amount; ?></th>
            </tr>

                </tbody>
              </table>
            </div>

        </div>
            
          </div>

          <?php
        }else
        {
          echo "<center><b>You have not ordered for any product at the moment</b></center>";
        }

        ?>
        </div>
      </div>
    </div>
    <br>
    
    </div>

  <br><br>
</body>