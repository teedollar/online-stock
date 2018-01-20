<?php
require_once "header2.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online store | About</title>
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
    if(isset($_POST['addStaff'])){
      if(!empty($_POST['sname']) && !empty($_POST['oname']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['pnumber']) && !empty($_POST['qualification']) ){
          
          if(!is_numeric($_POST['sname']) && !is_numeric($_POST['oname'])){
            if(stripos($_POST['email'], ".com")){
               
                if($dbConnect->addStaff($_POST['sname'], $_POST['oname'], $_POST['address'], $_POST['email'], $_POST['pnumber'], $_POST['qualification'], $_POST['sname'])){

                  //header("Location: login.php");
                  //$msg = "Registration successful";

                }
                else{
                  $msg = "Registration not successful";
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
  
  <div class="fbg" style="background-color: #fff;">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="../images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h4> Staff Registration Page </h4>
        <div style="color: #0000ff; font-size: 15px"><?php echo $msg ?> </div><br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="sendemail">
            <ol><br/>
             
              <li>
                <label for="name"> Staff Surname </label>
                <input id="name" name="sname" class="text" placeholder="surname" />
              </li><br/>
              <li>
                <label for="name"> Staff Other Names </label>
                <input id="name" name="oname" class="text" placeholder="other names" />
              </li><br/>
              <li>
                <label for="address"> Home Address </label>
                <input id="address" name="address" class="text" placeholder="address" />
              </li><br/>
              <li>
                <label for="email"> Email Address </label>
                <input id="email" name="email" class="text" placeholder="email" />
              </li><br/>
              <li>
                <label for="qualification"> Qualification </label>
                <select name="qualification" class="select">
                  <option value= "">--Your qualification</option>
                  <option value= "SSCE">SSCE</option>
                  <option value= "ND">ND</option>
                  <option value= "HND">HND</option>
                  <option value= "B.SC">B.SC</option>
                </select>
              </li><br/>
              <li>
                <label for="pnumber"> Phone Number </label>
                <input id="pnumber" name="pnumber" placeholder= "PhoneNumber" class="text" type= "text" />
              </li><br/>
              <li>
                <input type="submit" value= "Submit"name="addStaff" id="imageField" src="images/submit.gif" class="send" />
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
      <p class="rf">Design by: Badmus Basirat Biodun </a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
