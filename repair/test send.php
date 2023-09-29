<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

echo "<h2 align='center'>รายการแจ้งซ่อม</h2>";

$sql = "SELECT * FROM repair";
$result = mysqli_query($conn, $sql) or die ("ไม่สามารถทำงานตามคำสั่ง SQL ได้");

$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
?>
<table border=1 > 
<tr>
	<td />วันที่แจ้งซ่อม 
	<td />หมายเลขผลลิตภัณฑ์
	<td />รายการ
	<td />ชื่อผู้แจ้งซ่อม
	<td />รายละเอียด
	<td />สถานะการดำเนินงาน
	<td />คำขอ
	<td />ลบ
</tr>
<?php

while($row = mysqli_fetch_assoc($result)) 
{ //while
	$status = $row['r_status'];
?>
<form name="form1" method="post" action="allow_repair.php?txt_id=<?php echo" " . $row["id"] . ""; ?>">	
<tr> 
	<td /><?php echo " " . $row["r_date"] . " ";?>
	<td /><?php echo "" . $row["serial"] . " ";?>
	<td /><?php echo "" . $row["c_name"] . ""; ?>
	<td /><?php echo "" . $row["r_name"] . " "; ?>
	<td ><a href='detail_repair.php?txt_id=<?php " " . $row["id"] . " "; ?>'>[ดูรายละเอียด]</a></td>
	<td>
<?php
if ($status == $array_status[0])
{//if1
 echo " " . $row["r_status"] . " "; 
}//if1
else
{//else1
?>
<select name="status" id="status" >
	<option value="1" <?php if($status== $array_status[1]) echo " selected"; ?>>กำลังดำเนินการ</option>
	<option value="2" <?php if($status== $array_status[2]) echo " selected"; ?>>ซ่อมสำเร็จ</option>
	<option value="3" <?php if($status== $array_status[3]) echo " selected"; ?>>ซ่อมไม่ได้</option>
</select>
<?php
}//else1
?>
	</td>
	<td>
	<center>
	<?php
if ($status == $array_status[0])
{ //if2
?>
<a href='allow_repair.php?txt_id=<?php echo" " . $row["id"] . ""; ?>'>[ ✔ ]</a>
<?php
}//if2
else
{//else2	
?>
<input type="submit" name="submit" />
<?php
}//else2
?>
	</center>
	</td>
	<td>
	<a href='delete_repair.php?txt_id=<?php echo " " . $row["id"] . " "; ?>' onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ '); \">[ ✖ ]</a>
	</td>
</tr>
</form> 	
<?php
} //while
?>
</table>