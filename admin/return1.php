<?php
$conn = new mysqli("localhost","root","", "repair") or die( mysqli_connect_error($conn));
$strSQL = "SELECT * FROM user WHERE 1 AND username = '".$_POST["username"]."' OR id_card = '".$_POST["id_card"]."'";
mysqli_set_charset($conn,'utf8');
$result = $conn->query($strSQL) or die ($conn->error);
//$intNumField = $result->field_count(); //ไม่จำเป็นต้องใช้
$resultArray = array();
while($row = $result->fetch_assoc()){ // ใช้คำสั่ง assoc จะได้ array ที่เป็น keyname ไม่ใช่ keynumber
	$resultArray[]=$row;
}
echo json_encode($resultArray);
?>
