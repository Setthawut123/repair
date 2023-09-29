<?php
include("..\page\header.php");
include("..\connect_db.inc.php");


$pin_id = $_GET['txt_id'];

$sql = "DELETE FROM recieve WHERE repair_id='$pin_id' ";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
$sql = "DELETE FROM repair WHERE repair_id='$pin_id' ";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
if($result)
{
	unset ($pin_id);
	echo "<h3 align='center'>ลบข้อมูลสำเร็จ</h3>";
	echo "<meta http-equiv='refresh'content='1;url=show_fix.php'>";
}
?>

<?php
include '../page/footer.php';
?>