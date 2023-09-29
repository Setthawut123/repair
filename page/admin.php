<?php
include("header.php");
require('../connect_db.inc.php');
?>
<br>
<?php
	$name = $_SESSION["sess_name"] ;
	$sur =$_SESSION["sess_lastname"] ;
	$id_card = $_SESSION["sess_card"] ;
	
	$array_status = array('แจ้งซ่อมแล้ว','กำลังดำเนินการ','ซ่อมสำเร็จ','ซ่อมไม่ได้');
	echo'<center><h1>';
	echo"สวัสดีคุณ ";
	echo "$name ";
	echo "$sur ";
	echo'</h1></center>';
	
	include 'static.php';


if($_SESSION["sess_status"] =="0" OR $_SESSION["sess_status"] =="1")
{
?>
<a href="..\repair\show_fix.php?a=s_today"><h2>รายการแจ้งซ่อมวันนี้: <?php echo $day; ?>&nbsp รายการ</h2></a>
<a href="..\repair\show_fix.php?a=s_not"><h2>รายการที่ยังไม่อนุมัติทั้งหมด: <?php echo $none; ?>&nbsp รายการ</h2></a>
<a href="..\repair\show_fix.php"><h2>คลิกเพื่อดูรายการทั้งหมด: <?php echo $fix_all; ?>&nbsp รายการ</h2></a>
<?php 
} 
elseif($_SESSION["sess_status"] =="2" )
{
?>
	<a href="..\repair\show_fix.php"><h2>รายการที่ต้องซ่อม : <?php echo $fix; ?>&nbsp รายการ</h2></a>
<?php	
}
else
{
?>
<a href="..\repair\show_fix.php"><h2>แจ้งซ่อมทั้งหมด: <?php echo $me_send; ?>&nbsp รายการ</h2></a>
<a href="..\repair\show_fix.php?a=u_1"><h2>กำลังดำเนินการ: <?php echo $me_send1; ?>&nbsp รายการ</h2></a>
<a href="..\repair\show_fix.php?a=u_2"><h2>ซ่อมสำเร็จ: <?php echo $me_send2; ?>&nbsp รายการ</h2></a>
<a href="..\repair\show_fix.php?a=u_3"><h2>ซ่อมไม่ได้: <?php echo $me_send3; ?>&nbsp รายการ</h2></a>
<a href="..\repair\show_fix.php?a=u_0"><h2>ยังไม่อนุมัติ: <?php echo $me_send0; ?>&nbsp รายการ</h2></a>
<?php
}
?>
<br><br>

<?php
include 'footer.php';
?>