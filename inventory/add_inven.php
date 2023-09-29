<?php
include('..\page\header.php');
include('..\page\status_1.php');
require('..\connect_db.inc.php');
include('script.php');
?>


<center>
<form name="form1" method="post" action="save_register.php"><br>
 <h2>เพิ่มข้อมูล </h2><br>
  <table >
      <tr>
        <td>หมายเลขผลิตภัณฑ์</td>
        <td><input name="name" type="text" id="name" size="35" onkeyup="autoTab(this)" required></td>
      </tr>
	  <tr>
        <td>ชื่อ</td>
        <td><input name="surname" type="text" id="surname" size="35" required></td>
      </tr>
	  <tr>
        <td> ประเภท</td>
        <td>
<select name="sex" id="status">
<option >กรุณาเลือก</option>
		<?php 
		$sql4 = "SELECT * FROM kind ";
	$result4 = mysqli_query($conn,$sql4) ;
	 while($row4 = mysqli_fetch_assoc($result4))
{
?>
	<option value="<?php echo $row4["id"]; ?>" /><?php echo $row4["k_name"]; ?>
<?php
}
?>
</select>
<?php if($_SESSION['sess_status'] == "0")
{
?>
<a href="add_kind.php">แก้ไข</a>
<?php } ?>
		</td>
      </tr>
	  <tr />
	  <td />แผนก
	  <td />
<select name="dep" id="status">
<?php
$sql3 = "SELECT * FROM type ";
$result3 = mysqli_query($conn,$sql3) ;
	 while($row5 = mysqli_fetch_assoc($result3))
{
?>
<option value="<?php echo $row5["id"]; ?>" /><?php echo $row5["name"]; ?>
<?php
}
?>
</select>
<?php if($_SESSION['sess_status'] == "0")
{
?>
<a href="add_dev.php">แก้ไข</a>
<?php } ?>

  </table>
  <br>
  <input type="submit" name="Submit" value="เพิ่ม">
</form>
</center>
<br>
<br>

<?php
include '../page/footer.php';
?>