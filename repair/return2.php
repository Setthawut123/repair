<?php
$conn = new mysqli("localhost","root","", "repair") or die( mysqli_connect_error());
mysqli_set_charset($conn,'utf8');
$strSQL = "SELECT * FROM inventory WHERE w_id=1 AND serial = '".$_POST["sCusID"]."' ";
$result = $conn->query($strSQL) or die ($conn->error);
//$intNumField = $result->field_count(); //ไม่จำเป็นต้องใช้
$resultArray = array();
while($row = $result->fetch_assoc()){ // ใช้คำสั่ง assoc จะได้ array ที่เป็น keyname ไม่ใช่ keynumber
	$resultArray[]=$row;
}
echo json_encode($resultArray);
?>