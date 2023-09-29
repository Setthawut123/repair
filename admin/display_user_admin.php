<?php
include('..\page\header.php');
require('..\connect_db.inc.php');
include('..\page\status_1.php');

$sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE u_w=1 ORDER BY user_id ASC";
/*if($_SESSION["sess_status"] != "0")
{
	$sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE status != 0 ORDER BY user_id ASC";
}*/
$result = mysqli_query($conn,$sql) or die ("ไม่สามารถทำงานตามคำสั่ง SQL ได้");
?>

<center/>
<h2 align='center'>ดู/แก้ไข/ลบ ข้อมูลผู้ใช้</h2>

<!--ตารางแสดงข้อมูล-->
<table  align="center"> 
<tr> <td>username</td>
<?php
if($_SESSION["sess_status"] == "0")
{
?>
<?php
}
?>
<td>ใช้งานล่าสุด</td><td>ชื่อ-สกุล</td><td>email</td><td>เพศ</td><td>สถานะ</td><td>แก้ไข</td><td>ลบ</td></tr>
<?php
while($row =mysqli_fetch_array($result)) {
	$s_status = $row["status"];
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
	
	echo "<tr>";
	echo " <td>" . $row["username"] . "</td>";

if($_SESSION["sess_status"] == "0")
{
	//echo "<td>" . $row["password"] . "</td>";
}	
	echo "<td> " . $row["time"] . "</td><td>" . $row["name"] . " " . $row["surname"] . "</td><td>" . $row["email"] . "</td>";
	echo "<td>";
	if ($row["sex"]=="m" OR $row["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($row["sex"]=="f" OR $row["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	echo "</td><td>" . $status . "</td>"  ;
?>
<?php
	if($row["status"] != "0" ) {
?>
	<td>[<a href='show_user_detail.php?txt_id=<?php echo " " . $row["user_id"] . " " ;?>'>แก้ไข</a>]</td>
<?php
 } 
 ?>
<?php
	if($row["status"] == "2" OR $row["status"] == "3") {
?>
		<td>
		[<a href="delete_user.php?txt_id=<?php echo " " . $row["user_id"] . " "; ?>&info_id= <?php echo " " . $row["info_id"] . " "; ?>" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" >ลบ</a>]</td>
<?php	
	}
	echo "</tr>";
}
?>
</table>
<!--ตารางแสดงข้อมูล-->
<br><br>

<?php
include '../page/footer.php';
?>