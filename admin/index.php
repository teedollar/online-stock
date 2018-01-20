<?php 

@session_start();
//session_destroy();
    require_once "header1.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online store | login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-georgia.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/coin-slider.min.js"></script>
</head>
<body>
<br><br><br><br><br><br>


<?php

require_once "../config.php";
$dbConnect = new Config();
$msg = "";

if(isset($_POST['admin_login'])){
  if((!empty($_POST['username'])) && (!empty($_POST['password']))) {
    if($dbConnect->admin_login($_POST['username'], $_POST['password'])){
      
            header("Location: add_cat.php");
    }
  } 
}

?>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="../images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="sendemail">
            <ol><br/><br/><br/>
            <h4> Admin Login Page </h4>
              <li>
                <label for="name"> Username or Email </label>
                <input id="name" name="username" class="text" placeholder="name" type="text" />
              </li> <br/>
              <li>
                <label for="password"> Password </label>
                <input id="password" name="password" placeholder= "password" class="text" type="password" />
              </li><br/>

              <label class="checkbox">
              <input type="checkbox" name="keep_login" /> Keep me sign in
              </label><br/>
              
              <li>
                <input type="submit" value= "Sign in"name="admin_login" id="imageField" src="images/submit.gif" class="send" />
              <div class="clr"></div>
              </li><br/>
            </ol>
          </form>

      </div>
    
      <div class="clr"></div>
    </div>
  </div> 
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">shokem.com </a>. All Rights Reserved</p>
      <p class="rf">Developed by: Badmus Basirat Biodun     185757  </p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
