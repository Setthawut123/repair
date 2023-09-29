<?php
$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้');
/*total*/
$sql = "SELECT repair_id FROM repair ";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$sum = mysqli_num_rows($query);	

$sql = "SELECT repair_id FROM repair WHERE r_status = '$array_status[1]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$sum1 = mysqli_num_rows($query);

$sql = "SELECT repair_id FROM repair WHERE r_status = '$array_status[2]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$sum2 = mysqli_num_rows($query);

$sql = "SELECT repair_id FROM repair WHERE r_status = '$array_status[3]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$sum3 = mysqli_num_rows($query);

/*year*/
$sql = "SELECT r_date FROM repair WHERE year(r_date) = year(now())";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$year = mysqli_num_rows($query);

$sql = "SELECT r_date FROM repair WHERE year(r_date) = year(now()) AND r_status = '$array_status[1]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$year1 = mysqli_num_rows($query);

$sql = "SELECT r_date FROM repair WHERE year(r_date) = year(now()) AND r_status = '$array_status[2]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$year2 = mysqli_num_rows($query);

$sql = "SELECT r_date FROM repair WHERE year(r_date) = year(now()) AND r_status = '$array_status[3]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$year3 = mysqli_num_rows($query);

/*month*/
$sql = "SELECT r_date FROM repair WHERE month(r_date) = month(now())";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$month = mysqli_num_rows($query);

$sql = "SELECT r_date,r_status FROM repair WHERE month(r_date) = month(now()) AND r_status = '$array_status[1]' ";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$month1 = mysqli_num_rows($query);

$sql = "SELECT r_date,r_status FROM repair WHERE month(r_date) = month(now()) AND r_status = '$array_status[2]' ";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$month2 = mysqli_num_rows($query);

$sql = "SELECT r_date,r_status FROM repair WHERE month(r_date) = month(now()) AND r_status = '$array_status[3]' ";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$month3 = mysqli_num_rows($query);

/*day*/
$sql = "SELECT repair_id FROM repair WHERE day(r_date) = day(now())";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$day = mysqli_num_rows($query);

$sql = "SELECT repair_id FROM repair WHERE day(r_date) = day(now()) AND r_status = '$array_status[0]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$day0 = mysqli_num_rows($query);

$sql = "SELECT repair_id FROM repair WHERE day(r_date) = day(now()) AND r_status != '$array_status[0]'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$day1 = mysqli_num_rows($query);

/*user*/
$sql = "SELECT status FROM user";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$sumuser = mysqli_num_rows($query);

$sql = "SELECT status FROM user where status=0";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$admin = mysqli_num_rows($query);

$sql = "SELECT status FROM user where status=1";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$serviece = mysqli_num_rows($query);

$sql = "SELECT status FROM user where status=2";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$repair = mysqli_num_rows($query);

$sql = "SELECT status FROM user where status=3";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$user = mysqli_num_rows($query);

$sql = mysqli_query($conn,"SELECT SUM(count) as total FROM user");
$row = mysqli_fetch_array($sql);
$sumlog = $row['total'];



/*com*/
$sql = "SELECT type_id FROM inventory";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$inven = mysqli_num_rows($query);

$sql = "SELECT type_id FROM inventory WHERE type_id='1'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$inven1 = mysqli_num_rows($query);

$sql = "SELECT type_id FROM inventory WHERE type_id='2'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$inven2 = mysqli_num_rows($query);

$sql = "SELECT type_id FROM inventory WHERE type_id='3'";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$inven3 = mysqli_num_rows($query);

/*me*/

?>


