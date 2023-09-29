<?php
if($_SESSION['sess_status'] == "2" OR $_SESSION['sess_status'] == "3")
	{
		echo "<script>";  
	echo "alert( 'บัญชีผู้ใช้ของคุณไม่มีสิทธ์ใช้งานหน้านี้ กรุณาตรวจสอบแล้วลองใหม่อีกครั้ง' );"; 
	echo "window.location = '../index.php'; ";
	echo "</script>";
		exit();
	}
?>