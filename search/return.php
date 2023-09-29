<?php
$conn = new mysqli("localhost","root","12345678", "repair") or die( mysqli_connect_error());
mysqli_set_charset($conn,'utf8');
$strSQL = "SELECT * FROM inventory 
   INNER JOIN type ON  inventory.department=type.id WHERE 1 ";
$result = $conn->query($strSQL) or die ($conn->error);
$resultArray = array();
while($row = $result->fetch_assoc()){ 
	$resultArray[]=$row;
}
echo json_encode($resultArray);
?>