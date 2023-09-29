<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

$pin_id = $_GET['txt_id'];
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

$sql = " UPDATE repair SET r_status ='$r_status' WHERE repair_id = '$pin_id' ";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$sql = "INSERT INTO recieve (repair_id,recieve,time) VALUES ('$pin_id','$recieve','$change') ";
//$sql = "UPDATE recieve SET recieve ='$recieve',time='$change' WHERE repair_id = '$pin_id' ";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
if($query)
	{
	echo "<meta http-equiv='refresh'content='1;url=show_fix.php'>";
	}

?>
<?php
include '../page/footer.php';
?>