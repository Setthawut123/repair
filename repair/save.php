<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ระบบแจ้งซ่อมคอมพิวเตอร์</title>
<meta charset="utf-8">
<?php
include('../connect_db.inc.php');

$fix=$_POST['fix'];
$re_id=$_POST['repair_id'];

//$sql = "UPDATE repair SET fix='$fix' WHERE repair_id='$id' ";
//$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));

//$pin_id = $_GET['txt_id'];
$status = $_POST['status'];
$r_status;
$recieve= $_SESSION["sess_card"];
$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้' );
$change = date('Y-m-d H:i:s');

switch ($status)
{
	case "1":
	$r_status = $array_status[1];
	break;
	case "2":
	$r_status = $array_status[2];
	break;
	case "3":
	$r_status = $array_status[3];
	break;
}

$sql1 = " UPDATE repair SET r_status ='$r_status' WHERE repair_id = '$re_id' ";
$query1 = mysqli_query($conn,$sql1) or die (mysqli_error($conn));

$sql2 = "INSERT INTO recieve (repair_id,recieve,time,detail_fix) VALUES ('$re_id','$recieve','$change','$fix') ";
//$sql2 = "UPDATE recieve SET recieve ='$recieve',time='$change' WHERE repair_id = '$id' ";
$query2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
if ($query2 AND $query1)
{
	echo "<h3 align='center'>กำลังบันทึกการเปลี่ยนแปลง</h3>";
	echo "<meta http-equiv='refresh'content='1;url=../repair/detail_repair.php?txt_id=$re_id'>";
}else
{
	echo "กระจอก";
}
?>