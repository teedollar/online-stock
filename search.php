<?php
require_once "header.php";
require_once "config.php";

$dbConnect = new Config();
$msg = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Store Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <br><br><br><br>

    <div class="container">
    <div class="row"><center><h2>Product in Store</h2></center></div><br><br>
  
<?php

if(isset($_POST['button_search'])){
  if(!empty($_POST['product_search'])){
    $item = $_POST['product_search'];
    $getItems = $dbConnect->product_search($item);
    foreach ($getItems as $key => $value) {
      ?>
        
        <div class="row">
        <div class="col-md-2">  </div>
        <div class="col-md-2">  
          <img src="images/Pro1.jpg" class="img-rounded" alt="Cinque Terre" width="152" height="168">
        </div>
        <div class="col-md-6">  
          <p><b>Name:</b>&nbsp;&nbsp;&nbsp;<?php echo $value['Product_name'] ?></p>
          <p><b>Description:</b>&nbsp;&nbsp;&nbsp;<?php echo $value['Product_name'] ?></p>
          <p><b>Size:</b>&nbsp;&nbsp;&nbsp;<?php echo $value['Product_name'] ?></p>
          <p><b>Quantity in stock:</b>&nbsp;&nbsp;&nbsp;<?php echo $value['quantity'] ?></p>
          <p><b>Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $value['old_price'] ?></p>
        </div>
        <div class="col-md-2">  </div>
      </div>          
       <br><br>
    

      <?php      
    }
  }
  else{
    $msg = "You must type an item's name";
  }
}
?>

</div>
    </div>
</body>
</html>

