<?php
require_once('class/main.php');
$obj = new Model;

 if(isset($_GET['customer_Id']) && !empty($_GET['customer_Id'])) {
      $customer_Id = $_GET['customer_Id'];
      $obj->customer_data_delete($customer_Id);
  }
  
  if(isset($_GET['category_Id']) && !empty($_GET['category_Id'])) {
      $cat_Data = $_GET['category_Id'];
      $obj->category_delete($cat_Data);
  }

    if(isset($_GET['productId']) && !empty($_GET['productId'])) {
      $p_Data = $_GET['productId'];
      $obj->product_delete($p_Data);
  }


     
?>