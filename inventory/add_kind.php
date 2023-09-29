<?php
include('..\page\header.php');
include('..\page\status_1.php');
require('..\connect_db.inc.php');
?>

<?php 
if(isset($_GET["act"]))
{
 $act=$_GET["act"];	
	if ($act == 'add')
	{
		$txt_id = $_POST["txt_id"];
		$depart = $_POST["depart"];
		//echo $depart;
		$sql1="INSERT INTO kind (id,k_name) value ('$txt_id','$depart')";
		$query = mysqli_query($conn,$sql1) or die (mysqli_error($conn));
	}
	elseif ($act == 'del')
	{
		$txt_id = $_GET["txt_id"];
		//echo $depart;
		$sql1="DELETE FROM  kind WHERE id='$txt_id' ";
		$query = mysqli_query($conn,$sql1) or die (mysqli_error($conn));
	}
	elseif ($act == 'edit')
	{
		$txt_id = $_GET["txt_id"];
		$depart = $_POST["depart"];
		//echo $depart;
		$sql1="UPDATE  kind SET k_name='$depart' WHERE id='$txt_id' ";
		$query = mysqli_query($conn,$sql1) or die (mysqli_error($conn));
	}
	
}
?>
<?php
   $sql8 = "SELECT MAX(id) MAXIMUM FROM kind";
   $result8 = mysqli_query($conn, $sql8) or die (mysqli_error($conn));
   $array = mysqli_fetch_array($result8);
      $nums = ++$array['MAXIMUM'];
      $auto_id = str_pad($nums,11,"0",STR_PAD_LEFT); 
     // echo $auto_id;
?>
<table>
<tr>
<td />name
<td />แก้ไข
<td />ลบ
</tr>
<?php
$sql = "SELECT * FROM kind";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>
<form method="POST" action="add_kind.php?act=add">
<tr>
<td colspan="2">ระบุประเภท<input type="text" name="txt_id" value=" <?php echo $auto_id; ?>" readonly > 
 <input type="text" name="depart"> 
<input type="submit" value="เพิ่ม">
</tr>
</form>
<?php
while($row=mysqli_fetch_array($query))
	{
?>
<tr>
<form method="POST" action="add_kind.php?act=edit&txt_id=<?php echo $row["id"] ;?>">
<td /><input type="text" name="depart" value="<?php echo $row["k_name"] ;?>"> 
<td /><input type="submit" value="แก้ไข">
</form>
<td /><a href='add_kind.php?act=del&txt_id=<?php echo $row["id"] ;?>' onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">ลบ</a>
</tr>
<?php
	}
 ?>


</table>