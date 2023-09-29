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
  padding: 10px;
}
th {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
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
INNER JOIN recieve ON repair.repair_id = recieve.repair_id
WHERE repair.repair_id='$pin_id'
ORDER BY r_date DESC";
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn) );
$row = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM (recieve
INNER JOIN user_info ON recieve.recieve = user_info.id_card)
WHERE repair_id='$pin_id' ";
$result1 = mysqli_query($conn,$sql1) or die (mysqli_error($conn) );
$row1 = mysqli_fetch_array($result1);

$status = $row['r_status'];
$serial = $row['serial'];

$sql2 = "SELECT * FROM (inventory
INNER JOIN type ON  inventory.department=type.id 
INNER JOIN kind ON  inventory.type_id=kind.id)
WHERE serial='$serial' ";
$result2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn) );
$row2 = mysqli_fetch_array($result2);

?>
<form name="form1" action="save.php" method="POST"  >
<table align="center"  width="80%" >
  <tr>
	<th colspan="3">รายละเอียดการแจ้งซ่อม</th>
  </tr> 
  <tr>
		<td width="200"/>หมายเลขการแจ้งซ่อม
		<td  colspan="2"/><?php echo $pin_id;?>
		<input type="hidden" name="repair_id" value="<?php echo $pin_id;?>">
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
		<td  colspan="2"/><?php echo $row2['k_name']; ?>
  </tr>
  <tr>
		<td/>แผนก
		<td  colspan="2"/><?php echo $row2['name']; ?>
  </tr>
  <tr>
		<td/>อาคาร/ชั้น/ห้อง
		<td  colspan="2"/><?php echo $row['at']; ?>
  </tr>
  <tr >
		<td/>อาการเสีย
		<td  colspan="2"  /><?php echo $row['bad']; ?>
  </tr>
  <tr>
	<th colspan="3">รายละเอียดผู้แจ้งซ่อม</th>
  </tr>
   <tr>
		<td/>ชื่อ-สกุล
		<td  colspan="2"/><?php echo "" .$row['name'].  " "; ?><?php echo "" .$row['surname'].""; ?>
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
  </tr>
   </tr>
     <tr>
		<td/>เมื่อวันที่/เวลา : 
		<td colspan="2"/><?php echo $row1['time']; ?>
  </tr>
  <?php if($status != $array_status[0]) { ?>
       <tr>
		<td/>ซ่อมโดยการ<font color="red">*</font> : 
		<td colspan="2"/><textarea id="txt_bad" name="fix" value="<?php echo $row['detail_fix']?>" cols="40" rows="4" required></textarea>
		</tr>
		<tr>
		<td/>เปลี่ยนสถานะ : 
		<td colspan="2"/>  
<select name="status" id="status" >
	<option value="1" <?php if($status== $array_status[1]) echo " selected"; ?>>กำลังดำเนินการ</option>
	<option value="2" <?php if($status== $array_status[2]) echo " selected"; ?>>ซ่อมสำเร็จ</option>
	<option value="3" <?php if($status== $array_status[3]) echo " selected"; ?>>ซ่อมไม่ได้</option>
</select>
  </tr>
  <?php } ?>
    <tr>
	<th colspan="3">รายละเอียดผู้ดำเนินการ</th>
  </tr>
   <tr>
		<td/>ชื่อ-สกุล
		<td  colspan="2"/><?php echo "" .$row1['name'].  " "; ?><?php echo "" .$row1['surname'].""; ?>
  </tr>
   <tr>
		<td/>เบอร์โทรศัพท์
		<td  colspan="2"/><?php echo $row1['phone']; ?>
  </tr>
   <tr >
		<td/>อีเมล์
		<td colspan="2"/><?php echo $row1['email']; ?>
  </tr>
    <tr /><td colspan="2"/> <center><input type="submit" value="เปลี่ยนสถานะการดำเนินการ">
</table>
</form>
<br>
</div></center><br>
</body>