<?php 
@session_start();
    require_once "header2.php";
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
$find = false;

if(isset($_POST['add_cat'])){
  if((!empty($_POST['category'])) && (!empty($_FILES['image']['name'])) ) {

    $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../category/'.$image);
        $file_path = '../category/'.$image;

    if($dbConnect->add_category($_POST['category'], $file_path)){
      $find = true;
      $msg = "category successfully added";
    }
    else{
      $find =false;
      $msg ="Category not added";
    }
  } 
  else{
    $find = false;
    $msg = "Please write a category name";
  }
}

?>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="../images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h4> Add Categories of Products </h4>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="sendemail" enctype= "multipart/form-data">
            <ol><br/><br/><br/>
            
              <center>
                <div class="row">
                  <div class="col-md-7">
                    <div class="alert alert-success">
                    <?php
                      if(isset($_POST['add_cat'])){
                        echo $msg;
                      }
                    ?>
                  </div>
                  </div>
                </div>
              </center>
              <li>
                <label for="name"> Category name </label>
                <input id="name" name="category" class="text" placeholder="name" type="text" />
              </li> <br/>

              <li>
                <label for="name"> Category image </label>
                <input id="name" type="file" name="image" class="text"  />
              </li> <br/>
              
              <li>
                <input type="submit" value= "Add Category"name="add_cat" id="imageField" src="images/submit.gif" class="send" />
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
