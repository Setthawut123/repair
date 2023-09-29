<?php
include("..\page\header.php");
require('..\connect_db.inc.php');
include('..\page\status_1.php');

echo "<h2 align='center'>แก้ไขข้อมูล :: แสดงข้อมูลผู้ใช้</h2>";
$pin_id = $_GET["txt_id"];
$sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE user_id='$pin_id' ";
	$result = mysqli_query($conn,$sql) or die ("ไม่สามารถทำงานตามคำสั่ง SQL ได้" );
$row = mysqli_fetch_array($result);

$sex = $row['sex'];
$status = $row['status'];
?>

  
<form name="form1" method="post" action="update_user.php?info=<?php echo $row['info_id']; ?>">
<table >
<input type="hidden" name="txt_id" value="<?php echo $row['user_id']; ?>"/>
<tr>
<td width="50">Username </td>
<td><input type="text" name="txt_username"  value="<?php echo $row['username']; ?>" /></td>
</tr>
<tr>
<td>Password  </td>
<td><input type="password" name="txt_password" value="<?php echo $row['password']; ?>"/></td>
</tr>
<tr>
<td>สถานะ </td>
<td>
<select name="status" id="status">
	<option value="0" <?php if($status=="0") echo " selected"; ?>>แอดมิน</option>
	<option value="1" <?php if($status=="1") echo " selected"; ?>>เจ้าหน้าที่</option>
	<option value="2" <?php if($status=="2") echo " selected"; ?>>ช่างซ่อม</option>
	<option value="3" <?php if($status=="3") echo " selected"; ?>>ผู้ใช้</option>
</select>
</td>
</tr>
<tr>
<td>ชื่อ  </td>
<td><input type="text" name="txt_name" value="<?php echo $row['name']; ?>"/></td>
</tr>
<tr>
<td>สกุล :</td>
<td><input type="text" name="txt_lastname" value="<?php echo $row['surname'];?>"/></td>
</tr>
<tr>
<td>เลขบัตร </td>
<td><input type="text" name="txt_id_card" value="<?php echo $row['id_card']; ?>" required onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="13"/></td>
</tr>
<tr>
<td>เพศ </td>
<td>
<input type="radio" name="txt_sex" id="Radio_Type" value="m" <?php if($sex=="m" OR $sex=="M") echo " checked"; ?>>&nbsp;ชาย</input>
<input type="radio" name="txt_sex" id="Radio_Type" value="f" <?php if($sex=="f" OR $sex=="F") echo " checked"; ?>>&nbsp;หญิง</input>
</td>
</tr>
<tr>
<td>Email  </td>
<td><input type="email" name="txt_email" value="<?php echo $row['email'];?>"/></td>
</tr>
<tr>
<td>โทรศัพท์ </td>
<td><input type="text" name="txt_tel" value="<?php echo $row['phone'];?>" required onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="10"/></td>
</tr>
<tr>
<td>วันเกิด  </td>
<td><input type="date" name="txt_date" value="<?php echo $row['expire_date'];?>"/></td>
</tr>
</table>
<br>
<input type="submit" value="แก้ไขข้อมูลสมาชิก"/>
</form>
<br>
<?php
include '../page/footer.php';
?>