<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ระบบแจ้งซ่อมคอมพิวเตอร์</title>
<meta charset="utf-8">
<style>
* {
  box-sizing: border-box;
  font-family : Georgia, serif;
}

body {
  margin: 0;
  font-family : “Lucida Console”, Monaco, monospace;
  
}
/* Style the content */
.content {
 style="text-align: center; 
 margin-top:200px; 
 width:95%; 
 border:1px solid black;  
 background-color:white; 
 opacity:0.8; "
}

/* Style the footer */
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
</head>
<body style="background-image: url('../wall.jpg'); ">
<center>
<br>
<br>
<br>
<br>
<br>
<br>
<div  >
<div class="content">
<?php
require('..\connect_db.inc.php');
include('..\page\status_1.php');
 $id = $_POST["txt_id"];
 $serial = $_POST['txt_serial'];
 $c_name = $_POST['txt_c_name'];
 $name = $_POST['txt_name'];
 $date = $_POST['status'];
		
$sql1 = "UPDATE inventory SET  
			 
			c_name='$c_name' , 
			type_id='$name' , 
			department='$date'  
			WHERE id=$id ";

$result = mysqli_query($conn,$sql1)or die (mysqli_error($conn));
 
	
if($result)
{//if1
		echo "<h3 align='center'>แก้ไขข้อมูลสำเร็จ</h3>";
}//if1
else
{//else1
	echo "<h3 align='center'>แก้ไขข้อมูลไม่สำเร็จ</h3>";
}//else1

?>

<?php
include '../page/footer.php';
?>

