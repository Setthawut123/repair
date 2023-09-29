<?php session_start(); 
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ระบบแจ้งซ่อมคอมพิวเตอร์</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.footer {

   text-align: center;
	height:60px;
	position:fixed;
	left:0px;
	bottom:0px;
	background-color:#000000;
	width:100%;
	z-index: 99;
	color:#FFFFFF;
}
</style>
<body style="background-image: url('wall.jpg');">
<center>
<div style="text-align: center; margin-top:200px; border:1px solid black; width:400px; background-color:white; opacity:0.8; ">
<?php
require('connect_db.inc.php');
	$user = $_POST['txt_username'];
	$pass = $_POST['txt_password'];
	
$sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE username='$user' and password='$pass'";
$result = mysqli_query($conn,$sql)or die (mysqli_error($conn));
if(mysqli_num_rows($result)) {
	$row = mysqli_fetch_array($result);	

	$_SESSION["sess_user_id"] = $row["user_id"];
	$_SESSION["sess_info_id"] = $row["info_id"];
	$_SESSION["sess_name"] = $row["name"];
	$_SESSION["sess_lastname"] = $row["surname"];
	$_SESSION["sess_status"] = $row["status"];
	$_SESSION["sess_card"] = $row["id_card"];
	$count = $row["count"];
	$count+=1;
	echo "<h3 align='center'>เข้าสู่ระบบสำเร็จ กรุญารอสักครุ่</h3>";
	

} else {
echo "<script>";  
echo "alert( 'user หรือ  password ไม่ถูกต้อง'  );"; 
echo "window.history.back()";
echo "</script>";
//echo "<meta http-equiv='refresh'content='1;url=index.php'>";
}
$change = date('Y-m-d H:i:s');
$id = $_SESSION["sess_user_id"];
$sql = " UPDATE user SET time='$change',count='$count' WHERE user_id = '$id' ";
mysqli_query($conn,$sql) or die (mysqli_error($conn));

echo "<meta http-equiv='refresh'content='2;url=page/admin.php'>";
?>
</div>
<?php 
include 'page/footer.php';
?>

