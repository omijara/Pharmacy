<?php
//include'db/dbcon.php';
session_start();
$username = $_POST['uname'];
$password = $_POST['pword'];
require_once('layouts/db/dbcon.php');
$sql = "SELECT *FROM users WHERE (username = '$username' and password = '$password')";
$result = mysqli_query($link, $sql);
// var_dump($result);
// exit();
$data_row = mysqli_fetch_array($result);



//$row = mysqli_num_rows($result);



if(mysqli_num_rows($result)==1){


       
     // if(!$row == 0) {

        // $_SESSION['login_user'] = $username;

         //echo "Login Success";
   
if( ($username ==  $data_row['username'] && $password == $data_row['password']) )
{
        $_SESSION['user_id'] = $data_row['id']; 
        $_SESSION['username'] = $data_row['username'];
        $_SESSION['user_level'] = $data_row['user_level'];
        $_SESSION['name'] = $data_row['name'];
         header("Location:layouts/index.php");
}
else
{
$msg ="Username or Password is invalid";
header("location:login.php?msg=".$msg);
}


}
else{

$msg ="Username or Password is invalid";
header("location: login.php?msg=".$msg);
}


        
       // 
         
         
//if ($rows['username'] == $username and $rows['password'] == $password) {



?>
