<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

$a=$_GET["a"];

echo "<h2 align='center'>รายการแจ้งซ่อม</h2>";
$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้','ยกเลิกแล้ว' );
?>

<?php
if($_SESSION['sess_status'] == "0" OR $_SESSION['sess_status'] == "1")
{//if1
?>
<table >
<tr>
	<th width ="10%" />วันที่แจ้งซ่อม 
	<th width ="18%"/>หมายเลขครุภัณฑ์
	<th width ="20%" />รายการ
	<th width ="13%"/>ชื่อผู้แจ้งซ่อม
	<th width ="10%"/>รายละเอียด
	<th width ="12%" />สถานะ
	<th width ="10%" />คำขอ
	<th width ="5%" />ลบ
</tr>
<?php
	include ('show_admin_list.php');
}//if1
elseif ($_SESSION['sess_status'] == "2")
{
?>
<table >
<tr>
	<th width ="10%" />วันที่แจ้งซ่อม 
	<th width ="18%"/>หมายเลขครุภัณฑ์
	<th width ="20%" />รายการ
	<th width ="13%"/>ชื่อผู้แจ้งซ่อม
	<th width ="10%"/>รายละเอียด
	<th width ="12%" />สถานะ
	<th width ="10%" />คำขอ
</tr>
<?php
include ('show_repair_list.php');
}
else
{//else
?>
<table >
<tr>
	<th width ="10%" />วันที่แจ้งซ่อม 
	<th width ="18%"/>หมายเลขครุภัณฑ์
	<th width ="20%" />รายการ
	<th width ="13%"/>สถานะการดำเนินงาน
	<th width ="10%"/>ผู้ดำเนินการ
	<th width ="12%" />วันที่/เวลา ที่ดำเนินการ
	<th width ="10%" />ยกเลิก
</tr>
<?php
include 'show_me_fix.php';
	}//else1
?>
<br><br><br>
<?php
include '../page/footer.php';
?>
