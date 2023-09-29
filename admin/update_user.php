<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

 $id = $_POST['txt_id'];
 $user_name = $_POST['txt_username'];
 $pass_word = $_POST['txt_password'];
 $status = $_POST['status'];
 $name = $_POST['txt_name'];
 $last_name = $_POST['txt_lastname'];
 $id_card = $_POST['txt_id_card'];
 $sex = $_POST['txt_sex'];
 $e_mail = $_POST['txt_email'];
 $tel = $_POST['txt_tel'];
 $date = $_POST['txt_date'];
 $info = $_GET['info'];
 
$sql = "UPDATE user
SET username='$user_name', password='$pass_word',status='$status' 
WHERE user_id='$id' ";
 
$result = mysqli_query($conn,$sql)or die (mysqli_error($conn));



$sql1 = "UPDATE user_info SET  
			name='$name' ,
			surname='$last_name' , 
			id_card='$id_card' , 
			sex='$sex' , 
			email='$e_mail' , 
			phone='$tel' , 
			expire_date='$date'  
			WHERE info_id='$info' ";
			
$result1 = mysqli_query($conn,$sql1)or die (mysqli_error($conn));	
		
	if($result)
{
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'display_user_admin.php'; ";
	echo "</script>";
}
	else
{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}

?>