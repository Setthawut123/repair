<?php
     include '../page/header.php';
	 require '../connect_db.inc.php';
	 include('..\page\status_1.php');
?>
<?php
	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table >
    <tr>
<br>
      <th>ชื่อ/สกุล/เลขบัตร/email
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>" placeholder="กรอกข้อมูล">
      <input type="submit" value="ค้นหา"></th>
    </tr>
  </table>
</form>

<?php

   $sql = "SELECT * FROM user INNER JOIN user_info ON user.id_card=user_info.id_card  WHERE name LIKE '%".$strKeyword."%' OR phone LIKE '%".$strKeyword."%'  
   OR user.id_card LIKE '%".$strKeyword."%' OR surname LIKE '%".$strKeyword."%' OR email LIKE '%".$strKeyword."%' ";
   $query = mysqli_query($conn,$sql)or die (mysqli_error($conn));
?>
<br>
<table >
  <tr>
    <th >บัญชีผู้ใช้</th>
	 <th > สถานะ</th>
    <th >ชื่อ</th>
    <th >นามสกุล</th>
	<th>เพศ</th>
    <th >รหัสบัตรประชาชน</th>
	 <th >วันเกิด</th>
	  <th >อีเมล์</th>
	   <th >หมายเลขโทรศัพท์</th>	   
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	$s_status = $result["status"];
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
		if($result["u_w"] != 1)
		{
?>
  <tr>
    <td><font color="red"><?php echo $result["username"];?></font></td>
    <td><font color="red"><?php echo $status; ?></font></td>
    <td><font color="red"><?php echo $result["name"];?></font></td>
	<td><font color="red"><?php echo $result["surname"];?></font></td>
	<td><font color="red">
	<?php
	if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</font>
	</td>
	<td><font color="red"><?php echo $result["id_card"];?></font></td>
	<td><font color="red"><?php echo $result["expire_date"];?></font></td>
	<td><font color="red"><?php echo $result["email"];?></font></td>
	<td><font color="red"><?php echo $result["phone"];?></font></td>
  </tr>
<?php
		}
		else
		{
?>
 <tr>
    <td><?php echo $result["username"];?></td>
    <td><?php echo $status; ?></td>
    <td><?php echo $result["name"];?></td>
	<td><?php echo $result["surname"];?></td>
	<td>
	<?php
	if ($result["sex"]=="m" OR $result["sex"]=="M")
	{
	echo "ผู้ชาย";
	}
	else if ($result["sex"]=="f" OR $result["sex"]=="F")
	{
	echo "ผู้หญิง";
	}
	?>
	</td>
	<td><?php echo $result["id_card"];?></td>
	<td><?php echo $result["expire_date"];?></td>
	<td><?php echo $result["email"];?></td>
	<td><?php echo $result["phone"];?></td>
  </tr>
<?php
		}
}//while
// } //else
?>
</table>
<br><br>

<?php
include '../page/footer.php';
?>