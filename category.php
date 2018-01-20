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

<div class="container" style="">
	<center>
  		<h2>Product Categories</h2>
  		<p>Choose the category of product you want</p>
  	</center>
  	<br><br>
    <div class="row">
    	<?php
    	$category = $dbConnect->select_category();
    	foreach ($category as $key => $value) {
    	?>
    		<a href="product.php?cat_id=<?php echo $value['id'] ?>">
		    	<div class="col-md-3">
		    		<center> <b style="font-size: 15px; color: blue"><?php echo $value['cat_name'] ?></b> </center><br>
		    		<img src="<?php echo 'category/'.$value['image'] ?>" class="img-rounded" alt="Cinque Terre" width="300" height="300">
		    		<br><br>
		    	</div>
	    	</a>
	    	<div class="col-md-1"></div>

    	<?php
        }
        ?>
    	
    </div>
  </div>
</body>