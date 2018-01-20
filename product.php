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
		if(isset($_GET['cat_id']))
		{
			?>
				<center>
			  		<h2>Product </h2>
			  		<p>Choose the product you want</p>
			  	</center>
  				<br><br>
			    <div class="row">
			    	<?php
			    	$product = $dbConnect->select_product_in_category($_GET['cat_id']);
			    	foreach ($product as $key => $value) {
			    	?>
			    		<div class="col-md-3">
			    		
					    <center> <b style="font-size: 20px; color: darkgreen"><?php echo $value['Product_name'] ?></b> </center><br>
					    <img src="<?php echo 'image/'.$value['image'] ?>" class="img-rounded" alt="Cinque Terre" width="300" height="170">
					    <br><br>
				    	<b><center>
				    	<p>Price:  N<?php echo $value['new_price'] ?></p>
				    	<p>Stock: <?php echo $value['quantity'] ?></p></b>

				    	<?php
				    	if(isset($_SESSION['id']))
				    	{
				    	?>
					    	<a href="order.php?p_id=<?php echo $value['id'] ?>">
					    		<input type="submit" value="ADD TO CART" class="btn btn-success">
					    	</a>
				    	<?php
				    	}
				    	?>
				    	</center>
				    	<br><br>
				    	</div>

				   		<div class="col-md-1"></div>

			    	<?php
			        }
			       ?>
			    </div>
			<?php
		}
					
	?>
			    	
			    
  </div>
  <br><br><br><br>
</body>