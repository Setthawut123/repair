<?php
include("../page/header.php");
require('../connect_db.inc.php');

include 'static.php';
?>
<table>
<tr>
<th  /><h3>สถิติการแจ้งซ่อม</h3>
<th /><a href="static_repair.php?a=all">รายการแจ้งซ่อมทั้งหมด: <?php echo $sum; ?>&nbsp รายการ</a>
</tr>
<tr>
<th /><h3>สถิติอุปกรณ์</h3>
<td /><a href="static_inven.php?a=all">อุปกรณ์ทั้งหมด: <?php echo $inven; ?>&nbsp รายการ</a>
</tr>
<tr>
<th /><h3>สถิติผู้ใช้</h3>
<td /><a href="static_user.php?a=all">ผู้ใช้งานทั้งหมด: <?php echo $sumuser; ?>&nbsp คน</a>
</tr>
</table>

<?php
include '../page/footer.php';
?>