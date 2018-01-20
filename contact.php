<?php ;
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
  ?>

  <br><br><br><br><br>
  <div class="fbg" style="background-color: #fff;">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div><br/><br/>
      <div class="col c2">
         <h4> Send us mail </h4> <br><br>
        <!-- <form action="contact.php" method="post" id="sendemail">
            <ol>
           
              <li>
                <label for="name">Name  (Surname First)</label>
                <input id="name" name="name" class="text"  value = "<?php if(isset($_POST ['name'])) echo $_POST['name'];?>"/>
              </li>
              <li>
                <label for="email">Email Address (required)</label>
                <input id="email" name="email" class="text" value = "<?php if(isset($_POST ['email'])) echo $_POST['email'];?>"/>
              </li>
              <li>
                <label for="website">Website</label>
                <input id="website" name="website" class="text"  value = "<?php if(isset($_POST ['website'])) echo $_POST['website'];?>"/>
              </li>
              <li>
                <label for="message">Your Message</label>
                <textarea id="message" name="message" value = "<?php if(isset($_POST ['message'])) echo $_POST['message'];?>"rows="8" cols="50"></textarea>
              </li>
              <li>
                <input type="image" name="imageField" id="imageField" src="images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol><br/><br/><br/>
          </form> -->
          Email us on Shokemsupermarket@gmail.com
          <h4> Or call </h4> <br><br>
          08045672345, 09056321796
      </div> 
        
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">shokem.com </a>. All Rights Reserved</p>
      <p class="rf">Design by: Badmus Basirat Biodun </a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
