<?php
include('..\page\header.php');
require('..\connect_db.inc.php');
include('..\page\status_1.php');
$pin_id = $_GET['txt_id'];

$sql = "UPDATE inventory SET w_id=2 WHERE serial='$pin_id' ";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
if($result)
{
	unset ($pin_id);
	echo "<h3 align='center'>ลบข้อมูลสำเร็จ</h3>";
	echo "<meta http-equiv='refresh'content='1;url=../search/search_inven.php'>";
}
?>

<?php
include '../page/footer.php';
?>