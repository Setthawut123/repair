<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

	$serial_id = $_POST['txtCustomerID'];
	$r_id= $_SESSION["sess_card"];
	$bad = $_POST['txt_bad'];
	$at = $_POST['txt_at'];
	$date = date('Y-m-d H:i:s');
	$r_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );

$sql5="SELECT * FROM repair WHERE serial='$serial_id'  ";
$result1 = mysqli_query($conn, $sql5) or die (mysqli_error($conn));
$check = 1;
while($row5 = mysqli_fetch_assoc($result1))
{
	$status5 = $row5["r_status"];
	if($status5 == $r_status[0] OR  $status5 == $r_status[1])
	{
		$check++;
	}
}
//echo $check;
	if($check == 1)
	{
		$sql = "INSERT INTO repair (r_id,r_date,serial,r_status,at,bad) VALUES ('$r_id','$date','$serial_id','$r_status[0]','$at','$bad') ";
		$result = mysqli_query($conn, $sql);
		//$last_id = mysqli_insert_id($conn);
		if($result)
		{
		unset($serial_id,$bad,$at,$r_id,$date,$r_status,$check);
		echo "<script type='text/javascript'>";
		echo "alert('แจ้งซ่อมสำเร็จ');";
		echo "window.location = '../page/admin.php'; ";
		echo "</script>";
		}
		else
		{
		echo "<script type='text/javascript'>";
		echo "alert('ผิดพลาด กรุณาลองใหม่อีกครั้ง');";
		echo "window.location = '../page/admin.php'; ";
		echo "</script>";
		}
	}
	else
	{
	unset($check);
	echo "<script type='text/javascript'>";
	echo "alert('หมายเลขนี้ได้รับการแจ้งซ่อมแล้ว หรือ อยู่ในระหว่างการดำเนินการ');";
	echo "window.location = '../page/admin.php'; ";
	echo "</script>";
	}
?>

<?php
include '../page/footer.php';
?>