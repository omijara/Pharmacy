<?php
require_once('class/main.php');
$obj = new Model;

 if(isset($_POST['save_data'])) {
      $insertID = $_POST['save_data'];
      $obj->customer_input($insertID);
  }
 if(isset($_POST['new_save_data'])) {
      $insertID = $_POST['new_save_data'];
      $obj->new_customer_input($insertID);
  }
  
   if(isset($_POST['save_cat'])) {
      $insertID = $_POST['save_cat'];
      $obj->category_input($insertID);
  }

     if(isset($_POST['save_product'])) {
      $insertID = $_POST['save_product'];
      $obj->product_input($insertID);
  }
  

   if(isset($_POST['c_update'])) {
      $data = $_POST['c_update'];
      $obj->customer_update($data);
  }

     if(isset($_POST['p_update'])) {
      $data = $_POST['p_update'];
      $obj->product_update($data);
  }
  if(isset($_POST['save_sales'])){
    $data = $_POST['save_sales'];
      $obj->sales_insert($data);
  }

     if(isset($_POST['u_quantity'])) {
      $data = $_POST['u_quantity'];
      $obj->update_quantity($data);
  }
?>
