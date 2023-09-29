<?php
include("../page/header.php");
require('../connect_db.inc.php');

include 'static.php';
$a=$_GET["a"];
$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
?>
<table>
<tr>
<th  /><a href="?a=all">รายการแจ้งซ่อมทั้งหมด: <?php echo $sum; ?>&nbsp รายการ</a>
<td /><a href="?a=a1">กำลังดำเนินการ: <?php echo $sum1; ?>&nbsp รายการ</a>
<td /><a href="?a=a2">ซ่อมสำเร็จ: <?php echo $sum2 ?>&nbsp รายการ</a>
<td /><a href="?a=a3">ซ่อมไม่ได้: <?php echo $sum3; ?>&nbsp รายการ </a>
</tr>
</table>
<table>
<tr>
<?php if ($a == "all" )
{
	$sql = "SELECT * FROM ((repair
	INNER JOIN user_info ON repair.r_id = user_info.id_card)
	INNER JOIN inventory ON repair.serial = inventory.serial)
	ORDER BY repair.serial ASC ";
	$query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
?>
<tr>
    <td><div align="center"><?php echo $result["serial"];?></td>
    <td ><div align="center"><?php echo $result["c_name"];?></td>
	<td><div align="center"><?php echo $result["r_status"];?></div></td>
</tr>
<?php
	}
}
elseif ($a == "a1" )
{
	$sql = "SELECT * FROM ((repair
	INNER JOIN user_info ON repair.r_id = user_info.id_card)
	INNER JOIN inventory ON repair.serial = inventory.serial)
	WHERE r_status = '$array_status[1]'
	ORDER BY repair.serial ASC ";
	$query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
?>
<tr>
    <td><div align="center"><?php echo $result["serial"];?></td>
    <td ><div align="center"><?php echo $result["c_name"];?></td>
	<td><div align="center"><?php echo $result["r_status"];?></div></td>
</tr>
<?php 
	}
} 
elseif($a == "a2" )
{
	$sql = "SELECT * FROM ((repair
	INNER JOIN user_info ON repair.r_id = user_info.id_card)
	INNER JOIN inventory ON repair.serial = inventory.serial)
	WHERE r_status = '$array_status[2]'
	ORDER BY repair.serial ASC ";
	$query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
?>
<tr>
    <td><div align="center"><?php echo $result["serial"];?></td>
    <td ><div align="center"><?php echo $result["c_name"];?></td>
	<td><div align="center"><?php echo $result["r_status"];?></div></td>
</tr>
<?php 
	}
} 
elseif($a == "a3" )
{
	$sql = "SELECT * FROM ((repair
	INNER JOIN user_info ON repair.r_id = user_info.id_card)
	INNER JOIN inventory ON repair.serial = inventory.serial)
	WHERE r_status = '$array_status[3]'
	ORDER BY repair.serial ASC ";
	$query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
?>
<tr>
    <td><div align="center"><?php echo $result["serial"];?></td>
    <td ><div align="center"><?php echo $result["c_name"];?></td>
	<td><div align="center"><?php echo $result["r_status"];?></div></td>
</tr>
<?php
	}
}
?>
</table>