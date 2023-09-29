<?php
include('..\page\header.php');
require('..\connect_db.inc.php');
include('..\page\status_1.php');
include('script.php');
$sql = "SELECT * FROM inventory INNER JOIN type ON inventory.type_id=type.id ORDER BY serial ASC";
$result = mysqli_query($conn,$sql) or die ("ไม่สามารถทำงานตามคำสั่ง SQL ได้");
?>

<center/>
<h2 align='center'>ดูข้อมูผลิตภัณฑ์</h2>

<form name="form1" method="GET" action="detail_inven.php">
ระบุหมายเลขผลิตภัณฑ์ : <input type = "text" name="txt_id" onkeyup="autoTab(this)">
<input type="submit" value="แสดง">
</form>


<br>
<br>
<?php
include '../page/footer.php';
?>


