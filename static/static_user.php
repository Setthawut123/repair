<?php
include("../page/header.php");
require('../connect_db.inc.php');

include 'static.php';
$a=$_GET["a"];
//$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
?>
<table>
<tr>
<th  /><a href="?a=all">ผู้ใช้งานทั้งหมด: <?php echo $sumuser; ?>&nbsp คน</a>
<td /><a href="?a=a0">แอดมิน: <?php echo $admin; ?>&nbsp คน</a>
<td /><a href="?a=a1">เจ้าหน้าที่: <?php echo $serviece; ?>&nbsp คน</a>
<td /><a href="?a=a2">ช่างซ่อม: <?php echo $repair; ?>&nbsp คน</a>
<td /><a href="?a=a3">ผู้ใช้งาน: <?php echo $user; ?>&nbsp คน</a>
<td />เข้าใช้งานแล้ว: <?php echo $sumlog; ?>&nbsp ครั้ง
</tr>
</table>
<table>
<tr />
<td />ชื่อ
<td />สกุล
<td />เพศ
<td />สถานะ
<td />เบอร์โทรศัพท์
<tr>
<?php if ($a == "all" )
{
	  $sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card ";
   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
   
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
	$s_status = $result["status"];
	$array_status = array('แอดมิน','เจ้าหน้าที่','ช่างซ่อม','ผู้ใช้งาน');
	
	switch ($s_status)
{
	case "0":
	$status = $array_status[0];
	break;
	case "1":
	$status = $array_status[1];
	break;
	case "2":
	$status = $array_status[2];
	break;
	case "3":
	$status = $array_status[3];
	break;
}
?>
<tr>
    <td><div align="center"><?php echo $result["name"];?></td>
    <td ><div align="center"><?php echo $result["surname"];?></td>
    <td ><div align="center"><?php if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</td>
    <td ><div align="center"><?php echo $status;?></td>
    <td ><div align="center"><?php echo $result["phone"];?></td>
</tr>
<?php
	}
}
elseif ($a == "a1" )
{
	  $sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE status=1";
   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
   
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
	$s_status = $result["status"];
	$array_status = array('แอดมิน','เจ้าหน้าที่','ช่างซ่อม','ผู้ใช้งาน');
	
	switch ($s_status)
{
	case "0":
	$status = $array_status[0];
	break;
	case "1":
	$status = $array_status[1];
	break;
	case "2":
	$status = $array_status[2];
	break;
	case "3":
	$status = $array_status[3];
	break;
}
?>
<tr>
    <td><div align="center"><?php echo $result["name"];?></td>
    <td ><div align="center"><?php echo $result["surname"];?></td>
    <td ><div align="center"><?php if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</td>
    <td ><div align="center"><?php echo $status;?></td>
    <td ><div align="center"><?php echo $result["phone"];?></td>
</tr>
<?php 
	}
} 
elseif($a == "a2" )
{
	  $sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE status=2";
   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
   
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
	$s_status = $result["status"];
	$array_status = array('แอดมิน','เจ้าหน้าที่','ช่างซ่อม','ผู้ใช้งาน');
	
	switch ($s_status)
{
	case "0":
	$status = $array_status[0];
	break;
	case "1":
	$status = $array_status[1];
	break;
	case "2":
	$status = $array_status[2];
	break;
	case "3":
	$status = $array_status[3];
	break;
}
?>
<tr>
    <td><div align="center"><?php echo $result["name"];?></td>
    <td ><div align="center"><?php echo $result["surname"];?></td>
    <td ><div align="center"><?php if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</td>
    <td ><div align="center"><?php echo $status;?></td>
    <td ><div align="center"><?php echo $result["phone"];?></td>
</tr>
<?php 
	}
} 
elseif($a == "a3" )
{
	  $sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card 
	  WHERE status=3";
   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
   
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
	$s_status = $result["status"];
	$array_status = array('แอดมิน','เจ้าหน้าที่','ช่างซ่อม','ผู้ใช้งาน');
	
	switch ($s_status)
{
	case "0":
	$status = $array_status[0];
	break;
	case "1":
	$status = $array_status[1];
	break;
	case "2":
	$status = $array_status[2];
	break;
	case "3":
	$status = $array_status[3];
	break;
}
?>
<tr>
    <td><div align="center"><?php echo $result["name"];?></td>
    <td ><div align="center"><?php echo $result["surname"];?></td>
    <td ><div align="center"><?php if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</td>
    <td ><div align="center"><?php echo $status;?></td>
    <td ><div align="center"><?php echo $result["phone"];?></td>
</tr>
<?php
	}
}
elseif($a == "a0" )
{
	  $sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card 
	  WHERE status=0";
   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
   
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{//while
	$s_status = $result["status"];
	$array_status = array('แอดมิน','เจ้าหน้าที่','ช่างซ่อม','ผู้ใช้งาน');
	
	switch ($s_status)
{
	case "0":
	$status = $array_status[0];
	break;
	case "1":
	$status = $array_status[1];
	break;
	case "2":
	$status = $array_status[2];
	break;
	case "3":
	$status = $array_status[3];
	break;
}
?>
<tr>
    <td><div align="center"><?php echo $result["name"];?></td>
    <td ><div align="center"><?php echo $result["surname"];?></td>
    <td ><div align="center"><?php if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</td>
    <td ><div align="center"><?php echo $status;?></td>
    <td ><div align="center"><?php echo $result["phone"];?></td>
	<?php 
	}
}
?>
</tr>
</table>