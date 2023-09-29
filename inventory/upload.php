<html>
<head>
<title>ThaiCreate.Com PHP & CSV To MySQL</title>
</head>
<body>
<?php
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

require ('..\connect_db.inc.php');// Conect to MySQL
 $date = date('Y-m-d');
$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$strSQL = "INSERT INTO inventory ";
	$strSQL .="(serial,c_name,type_id,inven_date) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
	$strSQL .=",'".$date."') ";
	$objQuery = mysqli_query($conn,$strSQL);
}
fclose($objCSV);

echo "Upload & Import Done.";
?>
</table>
</body>
</html>