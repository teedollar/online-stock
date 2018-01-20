<?php 
@session_start();
require_once "header2.php";
require_once "../config.php";

$dbConnect = new Config();


$message = "";
$boolean = false;
if(isset($_GET['action']) && isset($_GET['p_id'])){
	if($dbConnect->delete_product($_GET['p_id'])) {
		$message = "Selected product removed from stock successfully";
		$boolean = true;
	}
}

$all_product = $dbConnect->all_product();
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
<center><h2> All Product </h2><center>
<br><br>

<div class="container">
	<?php
	if($boolean == true)
	{
		?>
		<div class="row">
			<div col-md-2></div>
			<div col-md-8>
				<p class="alert alert-success"><?php  echo $message ?></p>
			</div>
			<div col-md-2></div>
		</div>
		<?php
	}
	?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
				<table class="table">
					<?php
					if(count($all_product)> 0)
					{
						
						
					?>
					<thead>
						<tr>
							<th>#</th>
							<th>Product Name</th>
							<th>Unit Price</th>
							<th>Amount in stock</th>
						
						</tr>
					</thead>

					<?php
					foreach ($all_product as $key => $value) {
						?>

					<tbody>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['Product_name'] ?></td>
							<td><?php echo $value['new_price'] ?></td>
							<td><?php echo $value['quantity'] ?></td>
							<td>
								<a href="update_product.php?p_id=<?php echo $value['id'] ?>">
									<input type="submit" value="Update" class="btn btn-success">
								</a>
							</td>
							<td>
								<a href="product_list.php?action=r&p_id=<?php echo $value['id'] ?>">
									<input type="submit" value="Remove" class="btn btn-danger" onclick=" return confirm('Are you sure you want to remove this product?')">
								</a>
							</td>
						</tr>
						
					</tbody>

					<?php
					}
				}else
				{

					echo "<tr><td>No product available</td></tr>";				}
				?>
				</table>
		</div>
		<div class="col-md-1"></div>
	</div>
			    
  </div>
  <br><br><br><br>
</body>