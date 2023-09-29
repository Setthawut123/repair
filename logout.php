<meta charset="utf-8">
<style>
.footer {

   text-align: center;
	height:60px;
	position:fixed;
	left:0px;
	bottom:0px;
	background-color:#000000;
	width:100%;
	z-index: 99;
	color:#FFFFFF;
}
</style>
<body style="background-image: url('wall.jpg');">
<center>
<div style="text-align: center; margin-top:200px; border:1px solid black; width:400px; background-color:white; opacity:0.8; ">
<?php
session_start();
session_destroy();
echo "<h3 align='center'>ออกจากระบบสำเร็จกรุณารอสักครู่</h3>";
echo "<meta http-equiv='refresh'content='1;url=index.php'>";
?>
</div>
<?php 
include 'page/footer.php';
?>


