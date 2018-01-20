<?php
  @session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-georgia.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>

</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <?php
            if(isset($_SESSION['id'])){ 
              ?>

              <li><a href="category.php"><span>Home</span></a></li>
              <li><a href="invoice.php"><span>My Invoice</span></a></li>
              <li><a href="logout.php"><span>Logout</span></a></li>

              <?php
            }
            
            else{
              ?>
                <li ><a href="index.php"><span>Home Page</span></a></li>
                <li><a href="register.php"><span>Register</span></a></li>
                <li><a href="login.php"><span>Login</span></a></li>
                <li><a href="about.php"><span>About Us</span></a></li>
                <li><a href="contact.php"><span>Contact Us</span></a></li>
              <?php
            }
          ?>
          
          
          <!--<li><a href="invoice.php"><span>Invoice Page</span></a></li>-->

        </ul>
      </div>
	<br>
      <div class="logo">
        <h1><a href="index.html">SHOKEM <span> STORE</span></a></h1>
      </div>
     
    </div>
  </div>

</div>

