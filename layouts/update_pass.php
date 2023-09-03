<?php
session_start();
//$_SESSION['user_id'] = $data_row['id'];
include 'bd/dbcon.php';

$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$con_password=$_POST['con_password'];

// if (count($_POST) > 0) {
//     $result = mysqli_query($conn, "SELECT *from users WHERE id='" . $_SESSION["user_id"] . "'");
//     $row = mysqli_fetch_array($result);
//     if ($_POST["currentPassword"] == $row["password"]) {
//         mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
//         $message = "Password Changed";
//     } else
//         $message = "Current Password is not correct";
// }

$chg_pwd=mysql_query("select * from users where id='8'");
// var_dump($chg_pwd);
// exit();
$chg_pwd1=mysql_fetch_array($chg_pwd);
$data_pwd=$chg_pwd1['password'];
if($data_pwd==$old_password){
if($new_password==$con_password){
$update_pwd=mysql_query("update users set password='$new_password' where id='8'");
$change_pwd_error="Update Sucessfully !!!";
}
else{
$change_pwd_error="Your new and Retype Password is not match !!!";
}
}
else
{
$change_pwd_error="Your old password is wrong !!!";
}

?>