<?php
	include("..\page\header.php");
	require('..\connect_db.inc.php');
	
$username = $_POST["txtusername"];
$password = $_POST["u_pass"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$sex = $_POST["sex"];
$id_card = $_POST["txtid_card"];
$email = $_POST["email"];
$date = $_POST["date"];
$status = $_POST["status"];
$tel = $_POST["phone"];

	if($_POST["u_pass"] != $_POST["c_pass"])
	{
		echo "Password ไม่ตรงกัน";
		exit();
	}
	
	$sql = "SELECT username,id_card FROM user WHERE username = '$username' AND id_card = '$id_card' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	if($result)
	{
			echo "มีชื่อผู้ใช้งาน/เลขบัตรประชาชน อยู่แล้ว!";
	}
	else
	{		
		$sql = "INSERT INTO user_info (name, surname,sex,id_card,expire_date,email,phone) VALUES('$name','$surname','$sex','$id_card','$date','$email','$tel')";
		$query = mysqli_query($conn,$sql)or die(mysqli_error($conn));
		
		$sql = "INSERT INTO user (username, password,status,id_card,u_w) VALUES('$username','$password','$status','$id_card','1')";
		$query = mysqli_query($conn,$sql)or die(mysqli_error($conn));
		if($query)
		{
		echo "<script type='text/javascript'>";
		echo "alert('สมัครสมาชิกสำเร็จ');";
		echo "window.location = '../page/admin.php'; ";
		echo "</script>";
		}
		
	}

?>

<?php
include '../page/footer.php';
?>