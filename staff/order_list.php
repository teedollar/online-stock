<?php 
@session_start();
require_once "header2.php";
require_once "../config.php";

$dbConnect = new Config();

$order_list = $dbConnect->order_list();
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
				<?php 
				if(count($order_list) > 0){
					?>
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						foreach ($order_list as $key => $value) {

							?>
						<tr>
							<td><?php echo $value['Surname']." ".$value['Other_name'] ?> </td>
							<td><?php echo $value['Email_address'] ?> </td>
							<td><?php echo $value['Phone_number'] ?> </td>
							<td><a href="process_order.php?u_id=<?php echo $value['user_id'] ?>"><input type="submit" value="View Order" class="btn btn-success"></a></td>
						</tr>
							<?php
						}
					}else{
						echo "<tr><td><b>No customer orders to process</b></td></tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		<div class="col-md-2"></div>
	</div>
  </div>
</body>