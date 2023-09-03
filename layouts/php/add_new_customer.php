<?php
// Check if all required parameters are present in the URL
if(isset($_GET["name"]) && isset($_GET["contact_number"]) && isset($_GET["address"]) && isset($_GET["doctor_name"]) && isset($_GET["doctor_address"])) {
  
  // Get the parameters and capitalize the necessary ones
  $name = ucwords($_GET["name"]);
  $contact_number = $_GET["contact_number"];
  $address = ucwords($_GET["address"]);
  $doctor_name = ucwords($_GET["doctor_name"]);
  $doctor_address = ucwords($_GET["doctor_address"]);

  // Database connection
  require "db_connection.php"; // Make sure the file exists and contains database connection details

  if($con) {
    // Check if the customer already exists in the database
    $query = "SELECT * FROM customers WHERE CONTACT_NUMBER = '$contact_number'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    
    if($row) {
      echo "Customer ".$row['NAME']." with contact number $contact_number already exists!";
    } else {
      // Insert the new customer into the database
      $query = "INSERT INTO customers (NAME, CONTACT_NUMBER, ADDRESS, DOCTOR_NAME, DOCTOR_ADDRESS) VALUES('$name', '$contact_number', '$address', '$doctor_name', '$doctor_address')";
      $result = mysqli_query($con, $query);
      
      if(!empty($result)) {
        echo "$name added...";
      } else {
        echo "Failed to add $name!";
      }
    }
  } else {
    echo "Failed to connect to the database.";
  }
} else {
  echo "Missing required parameters.";
}
?>
