<?php
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE r_status='$array_status[1]'
ORDER BY r_date DESC";
//$sql = "SELECT * FROM repair ORDER BY id DESC";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>
<script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>


<?php

while($row = mysqli_fetch_assoc($result)) 
{ //while
	$status = $row['r_status'];
?>
<form name="form1" method="post" action="change_status.php?txt_id=<?php echo" " . $row["repair_id"] . ""; ?>">	
<tr> 
	<td /><?php echo " " . $row["r_date"] . " ";?>
	<td /><?php echo "" . $row["serial"] . " ";?>
	<td /><?php echo "" . $row["c_name"] . ""; ?>
	<td /><?php echo "" . $row["name"] . " " . $row["surname"] . " "; ?>
	<td ><a href="javascript:popup('detail_repair1.php?txt_id=<?php echo $row["repair_id"]; ?>','',800,600)" >[ดูรายละเอียด]</a></td>
	<td>
<?php
if ($status == $array_status[0])
{//if1
 echo " " . $row["r_status"] . " "; 
}//if1
elseif ($status == $array_status[1] OR $status == $array_status[2] OR $status == $array_status[3])
{//else1
?>
<?php echo $row["r_status"]; ?>
<!--<select name="status" id="status" >
	<option value="1" <?php// if($status== $array_status[1]) echo " selected"; ?>>กำลังดำเนินการ</option>
	<option value="2" <?php //if($status== $array_status[2]) echo " selected"; ?>>ซ่อมสำเร็จ</option>
	<option value="3" <?php// if($status== $array_status[3]) echo " selected"; ?>>ซ่อมไม่ได้</option>
</select>-->
<?php
}//else1
?>
	</td>
	<td>
	<?php
if ($status == $array_status[0])
{ //if2
?>
<a href='allow_repair.php?txt_id=<?php echo $row["repair_id"]; ?>'>[ ✔ ]</a>
<?php
}//if2
else
{//else2
echo "อนุมัติแล้ว";	
?>
<!--<input type="submit" name="submit" />-->
<?php
}//else2
?>
	</td>
</tr>
</form> 	
<?php
} //while
?>
</table>
<br>