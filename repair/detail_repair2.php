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
 width:90%; 
 border:1px solid black;  
 background-color:white; 
 opacity:0.8; "
}
/*table*/


 td {
  border-bottom: 1px solid #ddd;
  text-align: left;
}
th {
  background-color: #4CAF50;
  color: white;
}

</style>
<body>
<br><center>
<div class="content">
<?php
require('..\connect_db.inc.php');
$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
echo "<h2 align='center'>รายละเอียด</h2>";
$pin_id = $_GET["txt_id"];

$sql = "SELECT * FROM repair
INNER JOIN user_info ON repair.r_id = user_info.id_card
INNER JOIN inventory ON repair.serial = inventory.serial
INNER JOIN type ON  inventory.department=type.id 
INNER JOIN kind ON  inventory.type_id=kind.id
WHERE repair_id='$pin_id'
ORDER BY r_date DESC";

$result = mysqli_query($conn,$sql) or die (mysqli_error($conn) );
$row = mysqli_fetch_array($result);


$sql1 = "SELECT * FROM user_info
INNER JOIN repair ON repair.r_id = user_info.id_card
WHERE repair_id='$pin_id'
ORDER BY r_date DESC";
$result1 = mysqli_query($conn,$sql1) or die (mysqli_error($conn) );
$row1 = mysqli_fetch_array($result1);

$sql2 = "SELECT * FROM recieve
INNER JOIN repair ON repair.repair_id = recieve.repair_id
WHERE repair.repair_id='$pin_id' 
ORDER BY r_date DESC";
$result2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn) );
$row2 = mysqli_fetch_array($result2);

?>
<table align="center"  width="80%" >
 <tr>
	<th colspan="3">รายละเอียดการแจ้งซ่อม</th>
  </tr> 
  <tr>
		<td width="200"/>หมายเลขการแจ้งซ่อม
		<td  colspan="2"/><?php echo $pin_id;?>
  </tr>
<tr>
		<td width="200"/>วันที่แจ้งซ่อม
		<td  colspan="2"/><?php echo $row['r_date']; ?>
  </tr>
  <tr>
	<th colspan="3">รายละเอียดเครื่องคอม</th>
  </tr> 
  <tr>
		<td />หมายเลขผลิตภัณฑ์
		<td  colspan="2"/><?php echo $row['serial']; ?>
  </tr>
   <tr>
		<td/>ชื่ออุปกรณ์
		<td  colspan="2"/><?php echo $row['c_name']; ?>
  </tr>
     <tr>
		<td/>ประเภท
		<td  colspan="2"/><?php echo $row['k_name']; ?>
  </tr>
  <tr>
		<td/>แผนก
		<td  colspan="2"/><?php echo $row['name']; ?>
  </tr>
  <tr>
		<td/>อาการเสีย
		<td  colspan="2"/><?php echo $row['bad']; ?>
  </tr>
  <tr>
		<td/>อาคาร/ชั้น/ห้อง
		<td  colspan="2"/><?php echo $row['at']; ?>
  </tr>
  <tr>
	<th colspan="3">รายละเอียดผู้แจ้งซ่อม</th>
  </tr>
   <tr>
		<td/>ชื่อ-สกุล
		<td  colspan="2"/><?php echo "" .$row1['name'].  " "; ?><?php echo "" .$row1['surname'].""; ?>
  </tr>
   <tr>
		<td/>เบอร์โทรศัพท์
		<td  colspan="2"/><?php echo $row['phone']; ?>
  </tr>
   <tr >
		<td/>อีเมล์
		<td colspan="2"/><?php echo $row['email']; ?>
  </tr>
  <tr>
	<th colspan="3">สถานะการแจ้งซ่อม</th>
  </tr> 
     <tr>
		<td/>สถานะการดำเนินการ
		<td colspan="2"/><?php echo $row['r_status']; ?>

</table>

<br>
<!--
<center /><input type="button" name="Button" value="พิมพ์หน้านี้" onclick="javascript:this.style.display='none';window.print();window.close();" class="btn btn-primary">
-->
</div></center><br>
</body>