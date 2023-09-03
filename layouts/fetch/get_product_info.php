<?php
include "../db/dbcon.php";
$productID = $_POST['productId'];

$qry = "SELECT * FROM product_list WHERE product_id ='$productID' ORDER BY product_id DESC limit 1";
// $data = your class query builder;
// echo json_encode($data);

$result = mysqli_query($link,$qry);
$data = [];
$response = [];
while( $row = mysqli_fetch_array($result) ){
    $data[] = $row;
    
}
if(count($data) > 0){
	$response = [
	"status" => "success",
	"data" => $data[0],
	"msg" => ""
	];
}
else{
	$response = [
	"status" => "error",
	"data" => [],
	"msg" => "Previous reading not found"
	];
}
echo json_encode($response);
exit;

?>