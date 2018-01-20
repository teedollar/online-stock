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

if(isset($_POST['add_product'])){
  if((!empty($_POST['product'])) && (!empty($_POST['cat_id'])) && (!empty($_POST['qty'])) && (!empty($_POST['unit_price'])) && (!empty($_FILES['image']['name']))) 
  {
    if((is_numeric($_POST['qty'])) && (strlen($_POST['qty']) > 0))
    {
      if((is_numeric($_POST['unit_price'])) && (strlen($_POST['unit_price']) > 0) ){

        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../image/'.$image);
        $file_path = '../image/'.$image;

        if($dbConnect->addProduct($_POST['product'], $_POST['cat_id'], $_POST['qty'], $_POST['unit_price'], $file_path)){
        $find = true;
        $msg = "category successfully added";
      }else
      {
        $find = false;
        $msg = "Something went wrong";
      }
    }else
      {
        $find = false;
        $msg = "Unit price of a product must be numeric and greater than 0";
      }
    }else
    {
      $find = false;
      $msg = "Quantity of a product must be numeric and greater than 0";
    }
    
    }
    else{
      $find = false;
      $msg ="All fields should be filled";
    }
  } 

?>
  <div class="fbg" style="background-color: #fff;">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="../images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="sendemail" enctype= "multipart/form-data">
            <ol><br/><br/><br/>
            <h4> Add a Product </h4>
              <center>
                <div class="row">
                  <div class="col-md-7">
                    <div class="alert alert-success">
                    <?php
                      if(isset($_POST['add_product'])){
                        echo $msg;
                      }
                    ?>
                  </div>
                  </div>
                </div>
              </center>
              <li>
                <label for="name"> Product name </label>
                <input id="name" name="product" class="text" placeholder="product name" type="text" />
              </li> <br/>

              <li>
                <label for="name"> Choose a Category name </label>
                <select class="text" name="cat_id" >
                  <option value="">--Select a category</option>
                  <?php
                  $category = $dbConnect->select_category();
                    foreach ($category as $key => $value) {
                      ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['cat_name']; ?></option>
                      <?php
                    }
                  ?>
                </select>
              </li> <br/>

              <li>
                <label for="name"> Quantity </label>
                <input id="name" name="qty" class="text" placeholder="name" type="text" />
              </li> <br/>

              <li>
                <label for="name"> Unit Price </label>
                <input id="name" name="unit_price" class="text" placeholder="name" type="text" />
              </li> <br/>

              <li>
                <label for="name"> Add product image </label>
                <input id="name" name="image" class="text" type="file" />
              </li> <br/>
              
              <li>
                <input type="submit" value= "Add Product"name="add_product" id="imageField" src="images/submit.gif" class="send" />
              <div class="clr"></div>
              </li><br/>
            </ol>
          </form>

      </div>
    
      <div class="clr"></div>
    </div>
    </div>
    <br><br><br><br><br>
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
