<?php
require_once "header.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online store | About</title>
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
  <?php
  
  require_once "config.php";
  $dbConnect = new Config();
  $msg = "";
    if(isset($_POST['regCustomer'])){
      echo strlen($_POST['phone_number']);
      if(!empty($_POST['sname']) && !empty($_POST['oname']) && !empty($_POST['email']) && !empty($_POST['home_address']) && !empty($_POST['phone_number']) && !empty($_POST['password']) && !empty($_POST['password2'])){
          if(!is_numeric($_POST['sname']) && !is_numeric($_POST['oname'])){
            if(stripos($_POST['email'], ".com")){
              if(/*(is_numeric($_POST['phone_number'])) &&*/ (strlen($_POST['phone_number']) == 11) )
              {
              if($_POST['password'] == $_POST['password2']){
               
                if($dbConnect->register_customer($_POST['sname'], $_POST['oname'], $_POST['email'], $_POST['home_address'], $_POST['phone_number'], $_POST['password'], $_POST['password2'])){

                  header("Location: login.php");
                  //$msg = "Registration successful";

                }
                else{
                  $msg = "Registration not successful";
                }
              }else
              {
                $msg = "Passwords do not match each other";
              }
              }
              else{
                $msg = "Please enter a valid phone number";
              }
            }
            else{
              $msg = "Wrong email address";
            }
          }
          else{
            $msg = "Wrong name format";
          }
        }
        else{
          $msg = "All fields should be filled";
        }
      }
  ?>
<br><br><br><br><br><br>
  
  <div class="fbg" style="background-color: #fff;">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c1 reg">
        <h4> Customer Registration </h4><br>
        <div style="color: #0000ff"><?php echo $msg ?> </div><br><br>
        <form action="register.php" method="post" id="sendemail" >
          
            <ol><br/>
             
              <li>
                <label for="name"> Customer Surname </label>
                <input id="name" name="sname" class="text" placeholder="surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?> " />
              </li><br/>
              <li>
                <label for="name"> Customer Other Names </label>
                <input id="name" name="oname" class="text" placeholder="other names" value="<?php if(isset($_POST['oname'])) echo $_POST['oname']; ?> "/>
              </li><br/>
              <li>
                <label for="name"> Email Address </label>
                <input id="name" name="email" class="text" placeholder="name"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?> "/>
              </li><br/>
              <li>
                <label for="name"> Home Address </label>
                <input id="name" name="home_address" class="text" placeholder="name" value="<?php if(isset($_POST['home_address'])) echo $_POST['home_address']; ?> "/>
              </li><br/>
              <li>
                <label for="password"> Phone Number </label>
                <input id="password" name="phone_number" placeholder= "Phone Number" class="text"  />
              </li><br/>
              <li>
              <li>
                <label for="password"> Password </label>
                <input id="password" name="password" placeholder= "Password" type="password" class="text" />
              </li><br/>
              <li>
              <li>
                <label for="password"> Confirm password </label>
                <input id="password" name="password2" placeholder= "Confirm password" type="password" class="text" />
              </li><br/>
              <li>
                <input type="submit" value= "Submit"name="regCustomer" id="imageField" src="images/submit.gif" class="send" />
              <div class="clr"></div>
              </li><br/><br/><br/><br/>
            </ol>
          </form>
      </div>    
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">shokem.com </a>. All Rights Reserved</p>
      <p class="rf">Developed by: Badmus Basirat Biodun     185757  </a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
