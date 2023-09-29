<?php
include("../page/header.php");
require('../connect_db.inc.php');

include 'static.php';
$a=$_GET["a"];
$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
?>
<table>
<tr>
<th  /><a href="?a=all">อุปกรณ์ทั้งหมด: <?php echo $inven; ?>&nbsp รายการ</a>
<td /><a href="?a=a1">คอมพิวเตอร์: <?php echo $inven1; ?>&nbsp รายการ</a>
<td /><a href="?a=a2">ปริ้นเตอร์: <?php echo $inven2; ?>&nbsp รายการ</a>
<td /><a href="?a=a3">อุปกรณ์อื่นๆ: <?php echo $inven3; ?>&nbsp รายการ</a>
</tr>
</table>
<table>
<tr>
<?php if ($a == "all" )
{
	$sql = "SELECT * FROM inventory 
   INNER JOIN type ON  inventory.department=type.id
   INNER JOIN kind ON  inventory.type_id=kind.id
   ORDER BY serial ASC";

   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
?>
<tr>
    <td><div align="center"><?php echo $result["serial"];?></td>
    <td ><div align="center"><?php echo $result["c_name"];?></td>
</tr>
<?php
	}
}
elseif ($a == "a1" )
{
	$sql = "SELECT * FROM inventory 
   INNER JOIN type ON  inventory.department=type.id
   INNER JOIN kind ON  inventory.type_id=kind.id
   WHERE type_id =1
   ORDER BY serial ASC";

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
	$sql = "SELECT * FROM inventory 
   INNER JOIN type ON  inventory.department=type.id
   INNER JOIN kind ON  inventory.type_id=kind.id
   WHERE type_id =2
   ORDER BY serial ASC";
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
	$sql = "SELECT * FROM inventory 
     INNER JOIN type ON  inventory.department=type.id
     INNER JOIN kind ON  inventory.type_id=kind.id
     WHERE type_id =3
	ORDER BY serial ASC";
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