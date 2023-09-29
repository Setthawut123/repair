<?php
include('..\page\header.php');
require('..\connect_db.inc.php');
include('script.php');

echo "<h2 align='center'>แก้ไขข้อมูล :: แสดงข้อมูลผู้ใช้</h2>";
$id = $_SESSION["sess_user_id"];


$sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card WHERE user_id='$id' ";
	$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

$sex = $row['sex'];
$status = $row['status'];

?>

<form name="form1" method="post" action="update_me.php">
<table >
<input type="hidden" name="txt_id" readonly value="<?php echo $row['user_id']; ?>"/>
<tr>
<td>username </td>
<td><input type="text" name="txt_username" readonly value="<?php echo $row['username']; ?>"/></td>
</tr>
<tr>
<td>password </td>
<td><input type="text" name="txt_password" value="<?php echo $row['password']; ?>"/></td>
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
<td><input type="text" name="txt_id_card" value="<?php echo $row['id_card']; ?>" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="13" /></td>
</tr>
<tr>
<td>เพศ </td>
<td>
<input type="radio" name="txt_sex" id="Radio_Type" value="m" <?php if($sex=="m" OR $sex=="M") echo " checked"; ?>>&nbsp;ชาย</input>
<input type="radio" name="txt_sex" id="Radio_Type" value="f" <?php if($sex=="f" OR $sex=="F") echo " checked"; ?>>&nbsp;หญิง</input>
</td>
</tr>
<tr>
        <td>E-mail</td>
        <td><span id="email"></span><br>
		<input type='text'  name="email" id='email' onblur='check_email(this)' value="<?php echo $row['email'];?>" />
		</td>
</tr>
<tr>
<td>โทรศัพท์ </td>
<td><input type="text" name="txt_tel" value="<?php echo $row['phone'];?>" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="10"/></td>
</tr>
<tr>
<td>วันเกิด  </td>
<td><input type="date" name="txt_date" value="<?php echo $row['expire_date'];?>"/></td>
</tr>
</table>
<br>
<input type="submit" value="แก้ไขข้อมูล"/>
</form>

<br>
<?php
include '../page/footer.php';
?>