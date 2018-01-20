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
<br><br><br><br><br><br><br><br>


<div class="container">
<div class="row" style="background-color: darkgreen; padding: 20px">
	<div col-md-2></div>

	<div col-md-8>
		<center>
		<p style="color: white; font-size: 17px">We have received your order<br>You will be be notified when your order is processed<br><br>Regards: Management</p>
		</center>
	</div>
	<div col-md-2></div>
</div>

</div>


</body>
</html>