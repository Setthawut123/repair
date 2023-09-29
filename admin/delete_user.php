<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

$pin_id = $_GET['txt_id'];
$info_id = $_GET['info_id'];



$sql = "UPDATE  user SET u_w=2 WHERE user_id='$pin_id' ";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

/*$sql = "DELETE FROM user_info WHERE info_id='$info_id' ";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));*/
if($result)
{
	unset ($pin_id);
	echo "<h3 align='center'>ลบข้อมูลสำเร็จ</h3>";
	echo "<meta http-equiv='refresh'content='1;url=display_user_admin.php'>";
}
?>

<?php
include '../page/footer.php';
?>