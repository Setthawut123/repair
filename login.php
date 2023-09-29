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

<?php
session_start();

if(@$_SESSION["sess_status"] != null AND $_SESSION["sess_name"] != null)
	{
	echo "<script>";  
	echo "window.location = 'page/admin.php'; ";
	echo "</script>";
		exit();
	}
?>

<body style="background-image: url('wall.jpg');">
<center>
<div style="text-align: center;  border:1px solid black; width:800px; background-color:white; opacity:0.8; ">
<h1 align='center'>ระบบแจ้งซ่อมคอมพิวเตอร์ วิทยาลัยการอาชีพเบตง</h1></div>
<div style="text-align: center; margin-top:120px; border:1px solid black; width:300px; background-color:white; opacity:0.8; ">
<h3 align='center'>เข้าสู่ระบบ</h3><br>
<form name="form1" method="POST" action="check.php">
<input type="text" name="txt_username" required placeholder="Username" style="padding:8px;"><br><br>
<input type="password" name="txt_password"  required placeholder="Password" style="padding:8px;"><br><br><br>
<input type="submit" value=" Login " style="color:white; background-color:#28AA2E; padding:8px; border:none;"><br><br>
<br>
</div>

<?php
include 'page/footer.php';
?>