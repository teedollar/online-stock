<?php 
@session_start();
    require_once "header2.php";
    require_once "../config.php";

    $dbConnect = new Config();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online store | Update Product</title>
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

if(isset($_GET['p_id']))
{


 
$dbConnect = new Config();
$msg = "";
$find = false;

if(isset($_POST['update_product'])){
  if((!empty($_POST['qty'])) && (!empty($_POST['unit_price'])))
  {
    if((is_numeric($_POST['qty'])) && (is_numeric($_POST['unit_price'])))
    {

      if($dbConnect->update_product($_GET['p_id'], $_POST['qty'], $_POST['unit_price'])){
        $msg = "Product successfully updated";
        $find = true;
        header("Refresh: 2; URL = product_list.php");
      }else
      {
        $msg = "Product not updated";
        $find = false;
      }
    }else
    {
      $msg = "Quantity and Unit price fields should be numeric";
      $find = false;
    }
  }else{
    $msg = "Quantity and Unit price fields should not be empty";
    $find = false;
  }
}

$product = $dbConnect->select_a_product_in_category($_GET['p_id']);

?>
  <div class="fbg" style="background-color: #fff;">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="../images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <form action="update_product.php?p_id=<?php echo $product['id'] ?>" method="post" id="sendemail" >
            <ol><br/><br/><br/>
            <h4> Update Product </h4>
              <center>
                <div class="row">
                  <div class="col-md-2">
                  <div class="col-md-8">
                    <?php
                    if(isset($_POST['update_product']))
                    {
                      if($find == false){
                        ?>
                        <div class="alert alert-danger">
                        <?php
                          
                            echo $msg;
                        ?>
                      </div>
                      <?php
                      }else
                      {
                        ?>
                          <div class="alert alert-success">
                        <?php
                            echo $msg;
                          
                        ?>
                      </div>
                        <?php
                      }
                    }
                    ?>
                  </div>
                  <div class="col-md-2">
                </div>
              </center>
              <li>
                <label for="name"> Product name </label>
                <input id="name" class="text" value="<?php echo $product['Product_name'] ?>" type="text" readonly="readonly" />
              </li> <br/>

             

              <li>
                <label for="name"> Quantity </label>
                <input id="name" name="qty" class="text" value="<?php echo $product['quantity'] ?>" type="text" />
              </li> <br/>

              <li>
                <label for="name"> Unit Price </label>
                <input id="name" name="unit_price" class="text" value="<?php echo $product['new_price'] ?>" type="text" />
              </li> <br/>

              
              
              <li>
                <input type="submit" value= "Update Product"name="update_product" id="imageField" src="images/submit.gif" class="send" />
              <div class="clr"></div>
              </li><br/>
            </ol>
          </form>

      </div>
    
      <div class="clr"></div>
    </div>
    </div>
      </div>

    <?php
  }else
{
  echo "<p style = 'font-size: 30'>You are not allowed to be here </p>";
}
?>
    <br><br><br><br><br>
 
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
