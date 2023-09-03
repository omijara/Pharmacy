<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Model
{	
	public $link;
	public function __construct()
	{
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "pharmacy_inv";

		$this->link = mysqli_connect($hostname, $username, $password, $database);
	}

	public function customer_input($insertID)
	{

		$name = $_POST["name"];
		$mobile = $_POST["mobile"];
		$address = $_POST["address"];
		$dues = $_POST["dues"];

		date_default_timezone_set('Asia/Dhaka');
		$created_at = date('d-M-y h:i a');
		//$selectedVendor = ($_POST['vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['vendor'];

		$check="SELECT * FROM customer_details WHERE mobile = '$mobile'";
		$con = mysqli_query($this->link, $check);
		$data = mysqli_fetch_array($con);
		if($data[0] > 1) {
		    header("location: customer_list.php?err=User already exist.");
		}

		else{

		$query = "INSERT INTO `customer_details`(`name`, `mobile`, `address`, `dues`,`created_on`) VALUES ('$name','$mobile','$address', '$dues','$created_at')";
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link, $query);

		// var_dump($this->link);
		// exit();
		//header("location: forms.php");
		if ($sql == true) {
			header("location: customer_list.php?succ=Data inserted successfully");
			//exit();
		} else {
			echo "Failed to insert";
		}
	}
	}
	public function new_customer_input($insertID)
	{

		$name = $_POST["name"];
		$mobile = $_POST["mobile"];
		$address = $_POST["address"];
		$dues = $_POST["dues"];

		date_default_timezone_set('Asia/Dhaka');
		$created_at = date('d-M-y h:i a');
		//$selectedVendor = ($_POST['vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['vendor'];

		$check="SELECT * FROM customer_details WHERE mobile = '$mobile'";
		$con = mysqli_query($this->link, $check);
		$data = mysqli_fetch_array($con);
		if($data[0] > 1) {
		    header("location: create_sales.php?err=Customer already exist.");
		}

		else{

		$query = "INSERT INTO `customer_details`(`name`, `mobile`, `address`, `dues`,`created_on`) VALUES ('$name','$mobile','$address', '$dues','$created_at')";
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link, $query);

		// var_dump($this->link);
		// exit();
		//header("location: forms.php");
		if ($sql == true) {
			header("location: create_sales.php?succ=New customer added successfully");
			//exit();
		} else {
			echo "Failed to insert";
		}
	}
	}
	public function sales_insert($insertID)
	{


		$c_id = $_POST['customer_id'];
		$paid = $_POST['total_paid'];
		$sales_id = rand(10000, 99999);
		$pay_able = $_POST['total_payable'];
		date_default_timezone_set('Asia/Dhaka');
		$created_at = date('d-M-y h:i a');
		$query =  "INSERT INTO `sales`(`sales_id`,`customer_id`, `total`, `paid`,`created_on`) VALUES('$sales_id', '$c_id', '$pay_able', '$paid','$created_at')";
		// var_dump($query);
		// exit();
		$sql = mysqli_query($this->link, $query);

		if ($sql == true) {
			$due_query = "SELECT * FROM `customer_details` WHERE id='$c_id'";
			$due_result = mysqli_query($this->link, $due_query);
			$due_result = mysqli_fetch_array($due_result);
			$total_dues = (int)$due_result['dues'] + (int) $pay_able;
			$net_due = $total_dues - $paid;
			$update_query = "UPDATE `customer_details` SET dues='$net_due' WHERE id='$c_id'";
			// var_dump($update_query);
			// exit();
			$update_sql = mysqli_query($this->link, $update_query);

			$product_id = $_POST['product_id'];
			$quantity = $_POST['quantity'];
			$product_price = $_POST['product_price'];



			foreach ($product_id as $key => $value) {
				$p_id = $product_id[$key];
				// var_dump($p_id);
				// exit();
				$qty = $quantity[$key];
				$pp = $product_price[$key];

				$stock = (int) $_POST['stock'][$key] - (int)$qty;
			
				$update_stock = "UPDATE `product_list` SET quantity=$stock WHERE product_id=$p_id";

				mysqli_query($this->link, $update_stock);

				$single_query = "INSERT INTO `sales_item` (`sales_id`, `product_id`, `sell_quantity`, `unit_price`) VALUES('$sales_id', '$p_id', '$qty', '$pp')";
				// var_dump($single_query);
				// exit();
				mysqli_query($this->link, $single_query);
			}

			if ($update_sql) {
				header("location: sales_list.php?succ=New sales created successfully");
				//exit();
			}
		} else {
			echo "Failed to insert";
		}
	}
	public function print_sales_data($salesId)
	{
	$query = "SELECT * FROM sales 
	INNER JOIN customer_details ON sales.customer_id = customer_details.id
 	WHERE sales_id = '$salesId'";
	$result = mysqli_query($this->link,$query);
	
		return $result;
	}

	public function print_sales_item_data($salesId)
	{
	$query = "SELECT * FROM sales_item
	INNER JOIN product_list ON sales_item.product_id = product_list.product_id WHERE sales_id = '$salesId'";
	$result = mysqli_query($this->link,$query);
	
		return $result;
	}

	public function show_sales_data()
	{
	$query = "SELECT * FROM sales 
	INNER JOIN customer_details ON sales.customer_id = customer_details.id";
	$result = mysqli_query($this->link,$query);
	
		return $result;
	}

	public function category_input($insertID)
	{

		$cat_name = $_POST["category"];

		$query = "INSERT INTO `product_category`(`cat_name`) VALUES ('$cat_name')";
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link, $query);

		if ($sql == true) {
			header("location: categories.php?succ=Category inserted successfully");
			//exit();
		} else {
			echo "Failed to insert";
		}
	}

	public function product_input($insertID)
	{
		$c_name = $_POST["c_name"];
		$p_name = $_POST["p_name"];
		$p_quantity = $_POST["quantity"];
		//$price = $_POST["price"];

		$query = "INSERT INTO `product_list`(`cat_id`,`product_name`,`quantity`) VALUES ('$c_name','$p_name','$p_quantity')";
		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link, $query);
		if ($sql == true) {
			header("location: product_list.php?succ=Product added successfully");
			//exit();
		} else {
			echo "Failed to insert";
		}
	}

	public function show_customer_data()
	{

		$query = "SELECT * FROM customer_details 
	ORDER BY id DESC";


		return mysqli_query($this->link, $query);
	}

	public function show_category()
	{

		$query = "SELECT * FROM product_category 
	ORDER BY cat_id ASC";


		return mysqli_query($this->link, $query);
	}

	public function show_product()
	{

		$id = $_GET['cat'];
		switch ($id) {
			case "tok":
				$query = "SELECT * FROM product_list 
	WHERE cat_id = '1' ORDER BY product_id ASC";
				break;

			case "selection":
				$query = "SELECT * FROM product_list 
	WHERE cat_id = '2' ORDER BY product_id ASC";
				break;

			case "local":
				$query = "SELECT * FROM product_list 
	WHERE cat_id = '3' ORDER BY product_id ASC";
				break;
		}
		return mysqli_query($this->link, $query);
	}
	public function show_product_sales()
	{
		$query = "SELECT * FROM product_list ORDER BY product_id ASC";
		return mysqli_query($this->link, $query);
	}

	public function print_customer_data($userId)
	{
		$query = "SELECT * FROM customer_details WHERE id = '$userId'";
		$result = mysqli_query($this->link, $query);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		} else {
			echo "Record not found";
		}
	}

	public function display_product_data($userId)
	{
		$query = "SELECT * FROM product_list INNER JOIN product_category ON product_list.cat_id = product_category.cat_id
	 WHERE product_id = '$userId'";
		$result = mysqli_query($this->link, $query);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		} else {
			echo "Record not found";
		}
	}

		public function show_all_product()
	{

		$query = "SELECT * FROM product_list INNER JOIN product_category ON product_list.cat_id = product_category.cat_id
	ORDER BY product_id
	 ASC";


		return mysqli_query($this->link, $query);
	}



	//maintenance Tab start from here


	public function customer_data_delete($id)
	{
		$query = "DELETE FROM `customer_details` WHERE id = $id";

		$sql = mysqli_query($this->link, $query);

		//$sql = $this->link->query($query);
		if ($sql == true) {
			$message = "Record deleted successfully";
			header("Location:customer_list.php?succ=$message");
		} else {
			echo "Failed to delete";
		}
	}

	public function category_delete($id)
	{
		$query = "DELETE FROM `product_category` WHERE cat_id = $id";

		$sql = mysqli_query($this->link, $query);

		//$sql = $this->link->query($query);
		if ($sql == true) {
			$message = "Record deleted successfully";
			header("Location:categories.php?succ=$message");
		} else {
			echo "Failed to delete";
		}
	}


	public function product_delete($id)
	{
		$query = "DELETE FROM `product_list` WHERE product_id = $id";

		$sql = mysqli_query($this->link, $query);

		//$sql = $this->link->query($query);
		if ($sql == true) {
			$message = "Record deleted successfully";
			header("Location:product_list.php?succ=$message");
		} else {
			header("Location:product_list.php?err=Failed to delete record");
		}
	}


	public function customer_update($data)

	{
		$id = $_POST['id'];
		$name = $_POST["name"];
		$mobile = $_POST["mobile"];
		$address = $_POST["address"];
		$dues = $_POST["dues"];


		$query = "UPDATE `customer_details` SET `name` = '$name', `mobile` = '$mobile', `address` = '$address', `dues` = '$dues' WHERE id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link, $query);

		//$sql = $this->link->query($query);
		if ($sql == true) {
			header("Location:customer_list.php?succ=Customer information updated successfully");
		} else {
			header("Location:customer_list.php?err=Customer information updated successfully");
		}
	}

	public function product_update($data)

	{
		$id = $_POST['id'];
		$c_name = $_POST["c_name"];
		$p_name = $_POST["p_name"];


		$query = "UPDATE `product_list` SET `cat_id` = '$c_name', `product_name` = '$p_name' WHERE product_id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link, $query);

		//$sql = $this->link->query($query);
		if ($sql == true) {
			header("Location:product_list.php?succ=Product record updated successfully");
		} else {
			header("Location:product_list.php?err=Failed to Update product record");
		}
	}

	public function update_quantity($data)

	{
	  $id = $_POST['id'];
	  $new_quantity = $_POST["new_quantity"];

	$query = "UPDATE `product_list` SET `quantity` = quantity + $new_quantity WHERE product_id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
			header("Location:product_list.php?succ=Product quantity updated successfully");
			die;
			}else{
				header("Location:product_list.php?err=Failed to Update product record");
			}
	}

	function en_to_bn($input)
{
	$bn_digits = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
	$output = str_replace(range(0, 9), $bn_digits, $input);
	return $output;
}

}


