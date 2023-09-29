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
$s_id= $_SESSION["sess_card"];

if($a == 'u_1')
{
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE  r_id='$s_id'  AND r_status='$array_status[1]'  
ORDER BY r_date DESC";
}
elseif ($a== 'u_2')
{
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE  r_id='$s_id'  AND r_status='$array_status[2]'  
ORDER BY r_date DESC";
}
elseif ($a== 'u_3')
{
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE  r_id='$s_id'  AND r_status='$array_status[3]'  
ORDER BY r_date DESC";
}
elseif ($a== 'u_0')
{
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE  r_id='$s_id' AND r_status='$array_status[0]'  
ORDER BY r_date DESC";
}
else
{
$sql = "SELECT * FROM ((repair 
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE  r_id='$s_id' 
ORDER BY r_date DESC";
}

$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<?php
while($row = mysqli_fetch_assoc($result))
{
	$status2 = $row['r_status'];
?>
<tr>
	<td /><?php echo " " . $row["r_date"] . " ";?>
	<td /><?php echo "" . $row["serial"] . " ";?>
	<td /><?php echo "" . $row["c_name"] . ""; ?>
	<td /><?php echo " " . $row["r_status"] . " ";?>
<?php
	if($status2 != $array_status[0])
	{//if
$sql1 = "SELECT * FROM ((recieve
INNER JOIN user_info ON recieve.recieve = user_info.id_card)
INNER JOIN repair ON recieve.repair_id = repair.repair_id)
WHERE  recieve.repair_id=repair.repair_id ";
$result1 = mysqli_query($conn, $sql1) or die (mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);
?>
	<td /><?php echo "" . $row1["name"] . " "; ?>
	<td /><?php echo "" . $row1["time"] . " "; ?>
<?php
	}//if
	else
	{//else
?>

<td />ยังไม่มีผู้รับเรื่อง
<td />-
<?php		
	}//else
	if ($status2 != $array_status[0] )
	{//if2
?>
<td >
	<a href="javascript:popup('detail_repair.php?txt_id=<?php echo $row["repair_id"]; ?>','',800,600)" >[ดูรายละเอียด]</a>
	</td>
<?php
	}//if2
	else
	{//else2
?>
	<td>
	<a href="delete_repair.php?txt_id=<?php echo " " . $row["repair_id"] . " "; ?>" onClick="javascript:return confirm('คุณต้องการยกเลิกใช่หรือไม่');" >[ ✖ ]</a>
	</td>
<?php
}//else2
?>
</tr>	
<?php
}//while
?>
</table>