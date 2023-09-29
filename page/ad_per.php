<?php
	if(@$_SESSION['sess_status'] == "")
	{
	echo "<script>";  
	echo "alert( 'กรุณาเข้าสู่ระบบ' );"; 
	echo "window.location = '../index.php'; ";
	echo "</script>";
		exit();
	}
	/*
	if($_SESSION['sess_status'] != "0")
	{
		echo "This page for Admin only!";
		exit();
	}	*/
?>