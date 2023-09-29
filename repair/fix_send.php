<?php
include('..\page\header.php');
include('script.php');


?>


<h2>แจ้งซ่อม</h2>
<form name="form1" method="POST" action="send.php">
<table width="60%" >

  <tr>
    <td width="30%">Serial</td>
    <td width="50%"><input type="text" id="txtCustomerID" name="txtCustomerID" size="40" onkeyup="autoTab(this)"></td>
  <span id="sCusID"></span>
  </tr>
  <tr>
    <td>ชื่ออุปกรณ์</td>
    <td><input type="text" id="txt_cname" name="txt_cname" size="60"></td>
  </tr>
  <tr>
    <td>อาการเสีย</td>
    <td><textarea id="txt_bad" name="txt_bad" cols="70" rows="4"></textarea></td>
  </tr>
  <tr>
    <td>อาคาร / ชั้น / ห้อง</td>
    <td><textarea id="txt_at" name="txt_at" cols="70" rows="3"></textarea></td>
  </tr>

</table>
<br>
  <input type="submit" value ="แจ้งซ่อม" />
  </form>
<br>

<?php
include '../page/footer.php';
?>