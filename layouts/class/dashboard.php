<?php 

class Dash
{
	public function __construct()
	{
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "pharmacy_inv";

	$this->link = mysqli_connect($hostname,$username,$password,$database);

	}

	//maintenance Tab start from here

	public function customer_tab()
	{
	$query = "SELECT COUNT(*) FROM customer_details";

		return mysqli_query($this->link,$query);
	}

		public function product_tab()
	{
	$query = "SELECT COUNT(*) FROM product_list";

		return mysqli_query($this->link,$query);
	}


		public function dues_sum()
	{
	$query = "SELECT  SUM(dues) from customer_details";

		return mysqli_query($this->link,$query);
	}


	public function show_tab2()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-53-6527' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab3()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-53-5300' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab4()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-53-6837' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab5()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-56-3756' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab6()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-13-2865' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab7()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-15-0436' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab8()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-17-7422' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab9()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-18-4839' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab10()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-18-2585' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab11()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-18-4019' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function show_tab12()
	{
	$query = "SELECT * FROM maintenance_forms 
	INNER JOIN vehicle_no ON maintenance_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-52-0446' AND type_id = 1 ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}


	//Fuel Tab start from here

	public function fuel_tab1()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-52-0736' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab2()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-53-6527' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab3()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-53-5300' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab4()
	{
	$query = "SELECT * FROM fuel_forms
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-53-6837' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab5()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-56-3756' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab6()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-13-2865' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab7()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-15-0436' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab8()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-17-7422' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab9()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-18-4839' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab10()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-18-2585' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab11()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-GHA-18-4019' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}

	public function fuel_tab12()
	{
	$query = "SELECT * FROM fuel_forms 
	INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
 	WHERE vehicle_num = 'DM-CHA-52-0446' ORDER BY id DESC";

		return mysqli_query($this->link,$query);
	}





}


?>