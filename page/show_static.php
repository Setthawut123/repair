<?php
include("header.php");
require('../connect_db.inc.php');

include 'static.php';
?>

<table>
<tr>
<th colspan="2" /><h3>สถิติการแจ้งซ่อม</h3>
</tr>
<tr>
<th /><a href="">รายการแจ้งซ่อมทั้งหมด: <?php echo $sum; ?>&nbsp รายการ</a>
<td />กำลังดำเนินการ: <?php echo $sum1; ?>&nbsp รายการ
<td />ซ่อมได้: <?php echo $sum2 ?>&nbsp รายการ
<td />ซ่อมไม่ได้: <?php echo $sum3; ?>&nbsp รายการ 
</tr>
<tr>
<th />รายการแจ้งซ่อมปีนี้: <?php echo $year; ?>&nbsp รายการ
<td />กำลังดำเนินการ: <?php echo $year1; ?>&nbsp รายการ
<td />ซ่อมได้: <?php echo $year2; ?>&nbsp รายการ
<td />ซ่อมไม่ได้: <?php echo $year3; ?>&nbsp รายการ
</tr>
<tr>
<th />รายการแจ้งซ่อมเดือนนี้: <?php echo $month; ?>&nbsp รายการ
<td />กำลังดำเนินการ: <?php echo $month1; ?>&nbsp รายการ
<td />ซ่อมได้: <?php echo $month2; ?>&nbsp รายการ
<td />ซ่อมไม่ได้: <?php echo $month3; ?>&nbsp รายการ
</tr>
<tr>
<th colspan="2" /><h3>สถิติอุปกรณ์</h3>
</tr>
<tr>
<td />อุปกรณ์ทั้งหมด: <?php echo $inven; ?>&nbsp รายการ
<td />คอมพิวเตอร์: <?php echo $inven1; ?>&nbsp รายการ
<td />ปริ้นเตอร์: <?php echo $inven2; ?>&nbsp รายการ
<td />อุปกรณ์อื่นๆ: <?php echo $inven3; ?>&nbsp รายการ
</tr>
<tr>
<th colspan="2" /><h3>สถิติผู้ใช้</h3>
</tr>
<tr>
<td />ผู้ใช้งานทั้งหมด: <?php echo $sumuser; ?>&nbsp คน
<td />เข้าใช้งานแล้ว: <?php echo $sumlog; ?>&nbsp ครั้ง
</tr>
</table>



<?php
include 'footer.php';
?>