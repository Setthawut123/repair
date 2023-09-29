
<body style="background-image: url('wall.jpg');">

<?php

$host = "localhost"; // 127.0.0.1
$user = "root";
$passwd = "";
$db = "repair";

$conn= new mysqli ($host,$user,$passwd,$db)or die ("ไม่สามารถเชื่อมต่อ Database Server ได้") ; 
mysqli_set_charset($conn,'utf8');
//mysql_connect($host, $user, $passwd) or die ("ไม่สามารถเชื่อมต่อ Database Server ได้");
//mysql_query("SET NAMES utf8");
 //echo "เชื่อมต่อ Database Server ได้";
?>
</body>