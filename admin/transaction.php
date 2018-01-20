<?php 
@session_start();
require_once "header2.php";
require_once "../config.php";

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

				<center>
			  		<h2>Product </h2>
			  		<p>Choose the product you want</p>
			  	</center>
  				<br><br>
			    <div class="row">
			    	<div class="col-md-1"></div>
			    	<div class="col-md-3">
			    		<form action="transaction.php" method="post">
			    		<select class="text" name="day" >
		                  <option value="">--Select day</option>
		                  <?php
		                    for($i = 0; $i < 31; $i++){
		                      ?>
		                        <option value="<?php echo str_pad( ($i+1), 2, '0', STR_PAD_LEFT); ?>" >
		                        	<?php echo str_pad(($i+1), 2, '0', STR_PAD_LEFT); ?>
		                        </option>
		                      <?php
		                    }
		                  ?>
                		</select>
			    	</div>
			    	<div class="col-md-3">
			    		<select class="text" name="month" >
		                  <option value="">--Select month</option>
		                  <option value="Jan">Jan</option>
		                  <option value="Feb">Feb</option>
		                  <option value="Mar">Mar</option>
		                  <option value="Apr">Apr</option>
		                  <option value="May">May</option>
		                  <option value="Jun">Jun</option>
		                  <option value="Jul">Jul</option>
		                  <option value="Aug">Aug</option>
		                  <option value="Sep">Sep</option>
		                  <option value="Oct">Oct</option>
		                  <option value="Nov">Nov</option>
		                  <option value="Dec">Dec</option>
		                  
                		</select>
			    	</div>

			    	<div class="col-md-3">
			    		<select class="text" name="year" >
		                  <option value="">--Select year</option>
		                  <?php
		                  	for($i = 2015; $i < 2026; $i++){
		                  		?>
		                  			<option value="<?php echo $i ?>"><?php echo $i ?></option>
		                  		<?php
		                  	}
		                  ?>
		                  
                		</select>
			    	</div>
			    	<div class="col-md-2">
			    		<input type="submit" name="search" class="btn btn-success" value="Search">
			    	</div>
			    	</form>
				</div>
   	
			    
  </div>
  <br><br><br><br>

  <?php

  	$transaction = array();
  	if (isset($_POST['search'])) {
  		if( (!empty($_POST['year'])) && (empty($_POST['month'])) && (empty($_POST['day'])) )
  		{
  			$transaction = $dbConnect->transactByYear($_POST['year']);
  		}
  		else if( (!empty($_POST['year'])) && (!empty($_POST['month'])) && (empty($_POST['day'])) )
  		{
  			$transaction = $dbConnect->transactByMonthnYear($_POST['month'], $_POST['year']);
  		}
  		else if( (!empty($_POST['year'])) && (!empty($_POST['month'])) && (!empty($_POST['day'])) )
  		{
  			$transaction = $dbConnect->transactByDaynYear($_POST['day'], $_POST['month'], $_POST['year']);
  		}
  		else if( (empty($_POST['year'])) )
  		{
  			?>
  			<center>
  				<p style="color: red; font-weight: bold; font-size: 15px">Please select a specific year</p>
  			</center>
  			<?php
  		}
  		else
  		{
  			$transaction = $dbConnect->transactByDaynYear(date('d'), date('M'), date('Y'));
  		}
  	}

  ?>

<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
				<table class="table">
					<?php
					if(count($transaction)> 0)
					{
						
						
					?>
					<thead>

						<tr>
							<th>S/N</th>
							<th>Customer's Name</th>
							<th>Amount Of Goods Purchased</th>
						
						</tr>
					</thead>

					<?php
					$tot_amount = 0;
					foreach ($transaction as $key => $value) {
						?>

					<tbody>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['Surname']." ".$value['Other_name'] ?></td>
							<td><?php echo $value['amount'] ?></td>
							
						</tr>
						
					</tbody>

					<?php
					$tot_amount += $value['amount'];
					}
					?>
					<tr>
						<td></td>
						<td></td> 
						<td style='font-weight:bold; font-size:25px; color:darkgreen'>
							The total amount of transaction on this date is <?php echo $tot_amount ?> 
						</td>
					</tr>
					<?php
				}else
				{

					echo "<tr><td>No transaction available for this selected date</td></tr>";				}
				?>
				</table>
		</div>
		<div class="col-md-1"></div>
	</div>

</body>