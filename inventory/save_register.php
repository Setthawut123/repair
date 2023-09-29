<?php
	include("..\page\header.php");
	require('..\connect_db.inc.php');	
	$serial_id = $_POST['name'];
	$name = $_POST['surname'];
	$type = $_POST['sex'];
	$dep = $_POST['dep'];

$sql = "INSERT INTO inventory (serial,c_name,type_id,department,w_id) VALUES ('$serial_id','$name','$type','$dep','1') ";
		$objQuery = mysqli_query($conn,$sql)or die(mysqli_error($conn));
		if($objQuery)
		{
		echo "เพิ่มข้อมูลสำเร็จ<br>";		
		echo "<meta http-equiv='refresh'content='1;url=..\page\admin.php'>";
		}
		

?>

<?php
include '../page/footer.php';
?>