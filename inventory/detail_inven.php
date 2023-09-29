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

/*table*/


th, td {
  border-bottom: 1px solid #ddd;
  padding: 15px;
  text-align: left;
}
</style>
</head>
<body style="background-image: url('../wall.jpg'); ">
<center>
<br>
<br>
<br>
<div  >
<div class="content">
<?php
require('..\connect_db.inc.php');
include('..\page\status_1.php');
include('script.php');
echo "<h2 align='center'>แก้ไขข้อมูลผลิตภัณฑ์</h2>";
$id = $_GET["txt_id"];
$sql = "SELECT * FROM inventory WHERE serial='$id' ";
$result = mysqli_query($conn,$sql) ;
	
$row = mysqli_fetch_array($result);

$status =  $row['department']; 	
$sex = $row['type_id']; 	
?>

<form name="form1" method="post" action="update_inven.php">
<table>
<input type="hidden" name="txt_id" value="<?php echo $row['id']; ?>"/>
<tr>
<td >หมายเลขผลิตภัณฑ์ </td>
<td><input type="text" name="txt_serial" onkeyup="autoTab(this)" value="<?php echo $row['serial']; ?>" /></td>
</tr>
<tr>
<td>ชื่อ  </td>
<td><input type="text" name="txt_c_name" value="<?php echo $row['c_name']; ?>"/></td>
</tr>
<tr>
<td>ประเภท</td>
<td>
<select name="txt_name" id="status">
<option >กรุณาเลือก</option>
		<?php 
		$sql4 = "SELECT * FROM kind ";
	$result4 = mysqli_query($conn,$sql4) ;

	 while($row4 = mysqli_fetch_assoc($result4))
{
	$xxx = $row4["id"];
?>
	<option value="<?php echo $row4["id"]; ?>" <?php if($sex=="$xxx") { echo " selected"; } ?> /><?php echo $row4["k_name"]; ?>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>แผนก</td>
<td>
<select name="status" id="status">
<?php
$sql3 = "SELECT * FROM type ";
$result3 = mysqli_query($conn,$sql3) ;
while($row5 = mysqli_fetch_assoc($result3))
{
	
$xx = $row5["id"];
?>
<option value="<?php echo $row5["id"]; ?>" <?php if($status=="$xx") { echo " selected"; } ?>/><?php echo $row5["name"]; ?>
<?php

}

 ?>

</select>
</td>
</tr>
<tr />
<td />
</table>
<br>
<input type="submit" value="แก้ไขข้อมูล"/>
</form>
<br><br>
<?php
include '../page/footer.php';
?>