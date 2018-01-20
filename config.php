<?php
@session_start();

class Config {

	public $handle;
	public $stmt;
	public $db_name = "project";


	public function __construct(){
		$this->handle = $this->dbEngine();
	}

	public function dbEngine(){
		try{
			$this->handle = new PDO("mysql:host=localhost;dbname=$this->db_name","root","");
				$this->handle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		return $this->handle;
	}

	public function product_search($item){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM product WHERE Product_name LIKE '%$item%' ");
			$this->stmt->execute();
			$getItems = $this->stmt->fetchAll();
			return $getItems;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function register_customer($sname, $oname, $email_address, $home_address, $phone_num, $password, $cpassword){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO customer_registration VALUES (null, :sname, :oname, :email_address, :home_address, :phone_num, :password, :cpassword)");
			$this->stmt->execute(array(':sname' =>$sname, ':oname' => $oname, ':email_address' => $email_address, ':home_address' => $home_address, ':phone_num' => $phone_num, ':password' => $password, ':cpassword' => $cpassword));
			return true;

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function login($email, $password){
		try{
			$this->stmt = $this->handle->prepare("SELECT id, Email_address, password FROM customer_registration WHERE Email_address = :email AND password = :password");
			$this->stmt->execute(array(':email' =>$email, ':password' => $password));
			$row = $this->stmt->rowCount();
			$user = $this->stmt->fetch();
			if($row > 0){


				@session_start();
      			$_SESSION['id'] = $user['id'];
      			return true;
				
				
			}
			else{
				echo "<center><b style='color:red'>Invalid username and / or password</b></center>";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function selectAllProduct(){
		try{
			$this->stmt = $this->handle->prepare("SELECT id, Product_name FROM product  ");
			$this->stmt->execute();
			$getItems = $this->stmt->fetchAll();
			return $getItems;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function selectSpecificProduct($item){
		try{
			$this->stmt = $this->handle->prepare("SELECT  * FROM product WHERE id = :item ");
			$this->stmt->execute(array(':item' => $item));
			$getItems = $this->stmt->fetch();
			return $getItems;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function addProductToCart($item_id, $quantity, $user_id, $unit_price, $total_amount){
		try{
			$date = date('d-m-Y');
			$day = date('d');
			$month = date('M');
			$year = date("Y");
			$this->stmt = $this->handle->prepare("INSERT INTO order_page (product_id, Quantities, user_id, unit_price, amount, process, day, month, year, dates ) VALUES (:p_id, :quantity, :user_id, :unit_price, :amount, 0, '$day', '$month', '$year', '$date')");
			$this->stmt->execute(array(':p_id' => $item_id , ':quantity' => $quantity, ':user_id' => $user_id, ':unit_price' => $unit_price, ':amount' => $total_amount));

			//$this->updateSpecificProduct($item_id, $quantity);
			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function updateSpecificProduct($item_id,$qty_bought){
		try{
			$this->stmt = $this->handle->prepare("SELECT  * FROM product WHERE id = :item ");
			$this->stmt->execute(array(':item' => $item_id));
			$getItems = $this->stmt->fetch();

			/*$stmt1 = $this->handle->prepare("SELECT SUM(Quantities) AS tot_bought FROM order_page WHERE product_id = :item ");
			$stmt1->execute(array(':item' => $item_id));
			$get_tot_bought = $stmt1->fetch();*/

			$quantity = $getItems['quantity'];
			//$qty_bought = $get_tot_bought['tot_bought'];
			
			$total_rem = $quantity - $qty_bought;

			//updating the product quantity
			$stmt2 = $this->handle->prepare("UPDATE product SET quantity = '$total_rem' WHERE id = :item_id");
			$stmt2->execute(array(':item_id' => $item_id));

			return true;


		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function checkProductRemaining($product_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT quantity FROM product WHERE id = :product_id");
			$this->stmt->execute(array(':product_id' => $product_id));
			$productRem = $this->stmt->fetch();
			return $productRem['quantity'];
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function invoice($customer_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT a.*, b.*, c.* FROM order_page As a, customer_registration AS b, product AS c WHERE a.user_id = :user_id AND a.user_id = b.id AND  a.product_id = c.id AND process = 0");
			$this->stmt->execute(array(':user_id' => $customer_id));
			$invoice = $this->stmt->fetchAll();
			return $invoice;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function admin_login($username, $password){
		try{
			$this->stmt = $this->handle->prepare("SELECT a_id, password FROM admin WHERE username = :username AND password = :password");
			$this->stmt->execute(array(':username' =>$username, ':password' => $password));
			$row = $this->stmt->rowCount();
			$user = $this->stmt->fetch();
			if($row > 0){


				@session_start();
      			$_SESSION['admin_id'] = $user['a_id'];
      			return true;
				
				
			}
			else{
				echo "<center><b style='color:red'>Invalid username and / or password</b></center>";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function add_category($cat_name, $cat_image){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO categories VALUES (null, :cat_name, :category)");
			$this->stmt->execute(array(':cat_name' =>$cat_name, ':category' => $cat_image));
			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function select_category(){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM categories");
			$this->stmt->execute();
			$cat = $this->stmt->fetchAll();
			return $cat;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function addProduct($p_name, $cat_id, $p_qty, $p_price, $image){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO product VALUES (null, :p_name, :cat_id, :p_price, :p_qty, :image)");
			$this->stmt->execute(array(':p_name' => $p_name, ':cat_id' => $cat_id, ':p_price' => $p_price, ':p_qty' => $p_qty, ':image' => $image));

			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function addStaff($s_name, $o_name, $address, $email, $p_num, $qaulification, $password){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO staff VALUES (null, :surname, :othername, :address, :email, :phone_num, :qaulification, :password)");
			$this->stmt->execute(array(':surname' => $s_name, ':othername' => $o_name, ':address' => $address, ':email' => $email, ':phone_num' => $p_num, ':qaulification' => $qaulification, ':password' => $password));

			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function select_product_in_category($cat_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM product WHERE cat_id = :cat_id");
			$this->stmt->execute(array(':cat_id' => $cat_id));
			$product = $this->stmt->fetchAll();
			return $product;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function select_a_product_in_category($p_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM product WHERE id = :p_id");
			$this->stmt->execute(array(':p_id' => $p_id));
			$product = $this->stmt->fetch();
			return $product;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function my_account($user_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM customer_registration WHERE id = :user_id");
			$this->stmt->execute(array(':user_id' => $user_id));
			$user = $this->stmt->fetch();
			return $user;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	

	public function staff_login($email, $password){
		try{
			$this->stmt = $this->handle->prepare("SELECT id, email, password FROM staff WHERE email = :email AND password = :password");
			$this->stmt->execute(array(':email' =>$email, ':password' => $password));
			$row = $this->stmt->rowCount();
			$user = $this->stmt->fetch();
			if($row > 0){


				@session_start();
      			$_SESSION['staff_id'] = $user['id'];
      			return true;
				
				
			}
			else{
				echo "<center><b style='color:red'>Invalid username and / or password</b></center>";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function order_list(){
		try{
			$this->stmt = $this->handle->prepare("SELECT op.*, cr.Surname, cr.Other_name, cr.Email_address, cr.Phone_number FROM order_page AS op, customer_registration AS cr WHERE op.user_id = cr.id AND op.process = 0 GROUP BY op.user_id");
			$this->stmt->execute();
			
			$order_list = $this->stmt->fetchAll();
			return $order_list;	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function contact($name, $email, $website, $message){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO contact VALUES (null, :Name, :Email, :Website, :Message)");
			$this->stmt->execute(array(':name' =>$name, ':Name' => $name, ':Email' => $email, ':Website' => $website, ':Message' => $message));
			return true;

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function select_customer($cust_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM customer_registration WHERE id = :cust_id");
			$this->stmt->execute(array(':cust_id' => $cust_id));
			
			$customer = $this->stmt->fetch();
			return $customer;	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function customer_order($cust_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT SUM(op.Quantities) AS qty, op.unit_price, SUM(op.amount) AS tot_amount, pr.Product_name FROM order_page AS op, product AS pr WHERE op.process= 0 AND op.user_id = :cust_id AND op.product_id = pr.id GROUP BY pr.id");
			$this->stmt->execute(array(':cust_id' => $cust_id));
			
			$order_list = $this->stmt->fetchAll();
			return $order_list;	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function my_invoice($user_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT op.unit_price, SUM(op.amount) AS tot_amount, SUM(op.Quantities) AS qty, pr.Product_name FROM order_page AS op, product AS pr WHERE op.user_id = :user_id AND op.product_id = pr.id AND op.process = 0 GROUP BY pr.id");
			$this->stmt->execute(array(':user_id' => $user_id));
			$user = $this->stmt->fetchAll();
			return $user;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function process_order($user_id){
		try{
			$date = date('Y-m-d');
			$this->stmt = $this->handle->prepare("UPDATE order_page SET process = 1 WHERE user_id = :user_id ");
			$this->stmt->execute(array(':user_id' => $user_id));

			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function all_product(){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM product ");
			$this->stmt->execute();
			$product = $this->stmt->fetchAll();

			return $product;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function delete_product($p_id){
		try{
			$this->stmt = $this->handle->prepare("DELETE FROM product WHERE id = :p_id ");
			$this->stmt->execute(array(':p_id' => $p_id));
			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	
	public function update_product($p_id, $qty, $price){
		try{
			$this->stmt = $this->handle->prepare("UPDATE product SET quantity = :qty, new_price = :price WHERE id = :p_id ");
			$this->stmt->execute(array(':p_id' => $p_id, ':qty' => $qty, ':price' => $price));
			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function select_day(){
		try{
			$this->stmt = $this->handle->prepare("UPDATE product SET quantity = :qty, new_price = :price WHERE id = :p_id ");
			$this->stmt->execute(array(':p_id' => $p_id, ':qty' => $qty, ':price' => $price));
			return true;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function transactByYear($year){
		try{
			$this->stmt = $this->handle->prepare("SELECT SUM(op.amount) AS amount, cr.Surname, cr.Other_name FROM order_page AS op, customer_registration AS cr WHERE op.year = :year AND op.process = 1 AND op.user_id = cr.id GROUP BY op.user_id");
			$this->stmt->execute(array(':year' => $year));
			$transact = $this->stmt->fetchAll();

			return $transact;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function transactByMonthnYear($month, $year){
		try{
			$this->stmt = $this->handle->prepare("SELECT SUM(op.amount) AS amount, cr.Surname, cr.Other_name FROM order_page AS op, customer_registration AS cr WHERE op.year = :year AND op.month = :month AND op.process = 1 AND op.user_id = cr.id GROUP BY op.user_id");
			$this->stmt->execute(array(':year' => $year, ':month' => $month));
			$transact = $this->stmt->fetchAll();

			return $transact;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function transactByDaynYear($day, $month, $year){
		try{
			$this->stmt = $this->handle->prepare("SELECT SUM(op.amount) AS amount, cr.Surname, cr.Other_name FROM order_page AS op, customer_registration AS cr WHERE op.year = :year AND op.month = :month AND op.day = :day AND op.process = 1 AND op.user_id = cr.id GROUP BY op.user_id");
			$this->stmt->execute(array(':year' => $year, ':month' => $month, ':day' => $day));
			$transact = $this->stmt->fetchAll();

			return $transact;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	



}


?>