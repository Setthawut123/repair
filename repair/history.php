<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

echo "<h2 align='center'>รายการแจ้งซ่อม</h2>";

$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
?>


<table>
<tr>
	<td width ="105" />วันที่แจ้งซ่อม 
	<td width ="175"/>หมายเลขผลลิตภัณฑ์
	<td width ="200" />รายการ
	<td width ="120"/>ชื่อผู้แจ้งซ่อม
	<td width ="100" />สถานะการดำเนินงาน
	<td width ="115"/>รายละเอียด

</tr>
<?php
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE r_status='$array_status[2]' OR r_status='$array_status[3]'
ORDER BY r_date DESC";
//$sql = "SELECT * FROM repair ORDER BY id DESC";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>
<script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>

<?php

while($row = mysqli_fetch_assoc($result)) 
{ //while
	//$status = $row['r_status'];
?>
<tr> 
	<td /><?php echo " " . $row["r_date"] . " ";?>
	<td /><?php echo "" . $row["serial"] . " ";?>
	<td /><?php echo "" . $row["c_name"] . ""; ?>
	<td /><?php echo "" . $row["name"] . " " . $row["surname"] . " "; ?>
		<td>
 <?php echo " " . $row["r_status"] . " "; ?>
	</td>
	<td ><a href="javascript:popup('detail_repair.php?txt_id=<?php echo $row["repair_id"]; ?>','',800,600)" >[ดูรายละเอียด]</a></td>

</tr>
<?php
} //while
?>
</table>
<br>
<br><br><br>
<?php
include '../page/footer.php';
?>
