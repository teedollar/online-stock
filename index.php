<?php
@session_start();
if(isset($_SESSION['id'])){
  session_destroy();
}
require_once "header.php";
require_once "config.php";

$dbConnect = new Config();

if(isset($_POST['button_search'])){
  if($_POST['product_search'] != ""){
    header("Location: category.php");

  }
  else{
    $msg = "You must type an item's name";
  }
}
?>


  <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="500" height="200" alt="" /></a> <a href="#"><img src="images/slide2.jpg" width="500" height="150" alt="" /></a> <a href="#"><img src="images/slide3.jpg" width="500" height="150" alt="" /></a> </div>
        <div class="clr"></div>
      </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>WELCOME </span> </h2>
          <div class="clr"></div>
          <div class="img"><img src="images/img1.jpg" width="178" height="185" alt="" class="fl" /></div>
          <div class="post_content">
            <p><span> <h3> We welcome you to Shokem giftshop and Supermarket Stores located at Tanterlizer building Agbowo, Ibadan North Oyo Nigeria.We assured of getting quality goods delivered at your door step.Check through our website to have a view of our quality goods.</h3></span></p>
          
          </div>
          <div class="clr"></div>
        </div>
        
       
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="index.php">
            <span>
            <input name="product_search" class="editbox_search" id="editbox_search" placeholder="Search our site:" type="text" />
            </span>
            <input name="button_search" class="button_search" type="submit" value="Search item" />
          </form>
        </div>
        <div class="clr"></div>
       
     
      </div>
      <div class="clr"></div>
    </div>
  </div>
  
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">shokem.com</a>. All Rights Reserved</p>
      <p class="rf">Developed by: Badmus Basirat Biodun     185757  </a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
