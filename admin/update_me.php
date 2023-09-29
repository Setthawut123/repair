<?php
include("..\page\header.php");
require('..\connect_db.inc.php');

$info_id = $_SESSION["sess_info_id"];
 $id = $_POST['txt_id'];
 $user_name = $_POST['txt_username'];
 $pass_word = $_POST['txt_password'];
 $name = $_POST['txt_name'];
 $last_name = $_POST['txt_lastname'];
 $id_card = $_POST['txt_id_card'];
 $sex = $_POST['txt_sex'];
 $e_mail = $_POST['email'];
 $tel = $_POST['txt_tel'];
 $date = $_POST['txt_date'];




$sql = "UPDATE user_info SET  	
			name='$name' ,
			surname='$last_name' , 
			id_card='$id_card' , 
			sex='$sex' , 
			email='$e_mail' , 
			phone='$tel' , 
			expire_date='$date'  
			WHERE info_id='$info_id' ";

$result = mysqli_query($conn,$sql);
 
	
if($result)
{//if1
	$_SESSION["sess_user"] = $user_name;
	$_SESSION["sess_name"] = $name;
	$_SESSION["sess_lastname"] = $last_name;
	$_SESSION["sess_card"] = $id_card;
	
		unset($s_id,$id,$user_name,$pass_word,$name,$last_name, $id_card,$sex,$e_mail,$tel,$date);
		echo "<script type='text/javascript'>";
		echo "alert('Update Succesfuly');";
		echo "window.location = '../page/admin.php'; ";
		echo "</script>";
}//if1
else
{//else1
	unset($s_id,$id,$user_name,$pass_word,$name,$last_name, $id_card,$sex,$e_mail,$tel,$date);
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}//else1

?>

<?php
include '../page/footer.php';
?>