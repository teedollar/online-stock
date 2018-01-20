<?php 
@session_start();
require_once "header2.php";
require_once "../config.php";

$dbConnect = new Config();

if(isset($_GET['u_id']))
{

	$cust_id = $_GET['u_id'];

	$customer = $dbConnect->select_customer($cust_id);
	$customer_order = $dbConnect->customer_order($cust_id);

	if(isset($_POST['process']))
	{
		if($dbConnect->process_order($cust_id))
		{
			header("Location:message.php");
		}
	}
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
				<p style="font-size: 25px; font-weight: bold">Order List</p>
			</div>
			<div class="col-md-2"></div>
		</div>

		<div class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
				<table class="table">
					<tr><th>Customer's Name</th><td><?php echo $customer['Surname']." ".$customer['Other_name'] ?></td></tr>
					<tr><th>Home address</th><td><?php echo $customer['Home_address'] ?></td></tr>
					<tr><th>Email address</th><td><?php echo $customer['Email_address'] ?></td></tr>
					<tr><th>Phone number</th><td><?php echo $customer['Phone_number'] ?></td></tr>
					<tr><th>Payment type</th><td>Pay on delivery</td></tr>
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
				<table class="table">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($customer_order) > 0){
							$total_amount = 0;
							foreach ($customer_order as $key => $value) {

								?>
							<tr>
								<td><?php echo $value['Product_name'] ?> </td>
								<td><?php echo $value['qty'] ?> </td>
								<td><?php echo $value['unit_price'] ?> </td>
								<td><?php echo ($value['qty'] * $value['unit_price']) ?></td>
							</tr>
								<?php
								$total_amount += ($value['qty'] * $value['unit_price']);
							}
						}
					?>
						<tr>
							<th colspan="3">Total Amount of products</th>
							<th><?php echo $total_amount; ?></th>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>
		<br>
		<div class = row>
			<div class="col-md-4"></div>
			<div class="col-md-7">
				<form action="process_order.php?u_id=<?php echo $cust_id ?>" method="post">
					<input type="submit" name="process" value="Process Order" class="btn btn-success">
				</form>
			</div>
			
		</div>
	  </div>

  <?php
}

?>
  <br><br>
</body>