<?php session_start(); 
include ('ad_per.php');
date_default_timezone_set("Asia/Bangkok"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ระบบแจ้งซ่อมคอมพิวเตอร์</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
  box-sizing: border-box;
  font-family : Georgia, serif;
}

body {
  margin: 0;
  padding: 0;
  font-family: 'Open Sans', sans-serif;
  line-height: 32px;
 
}

/* CSS Document */


#container {
	margin: 0 auto;
	max-width: 890px;
}

.toggle,
[id^=drop] {
	display: none;
}

/* Giving a background-color to the nav container. */
nav { 
	margin:0;
	padding: 0;
	background-color: #254441;
}

#logo {
	display: block;
	padding: 0 30px;
	float: left;
	font-size:20px;
	color:#FFF;

}

/* Since we'll have the "ul li" "float:left"
 * we need to add a clear after the container. */

nav:after {
	content:"";
	display:table;
	clear:both;
}

/* Removing padding, margin and "list-style" from the "ul",
 * and adding "position:reltive" */
nav ul {
	float: right;
	padding:0;
	margin:0;
	list-style: none;
	position: relative;
	}
	
/* Positioning the navigation items inline */
nav ul li {
	margin: 0px;
	display:inline-block;
	float: left;
	background-color: #254441;
	}

/* Styling the links */
nav a {
	display:block;
	padding:14px 20px;	
	color:#FFF;
	font-size:17px;
	text-decoration:none;
}


nav ul li ul li:hover { background: #000000; }

/* Background color change on Hover */
nav a:hover { 
	background-color: #000000; 
}

/* Hide Dropdowns by Default
 * and giving it a position of absolute */
nav ul ul {
	display: none;
	position: absolute; 
	/* has to be the same number as the "line-height" of "nav a" */
	top: 60px; 
}
	
/* Display Dropdowns on Hover */
nav ul li:hover > ul {
	display:inherit;
}
	
/* Fisrt Tier Dropdown */
nav ul ul li {
	float:none;
	display:list-item;
	position: relative;
}

/* Second, Third and more Tiers	
 * We move the 2nd and 3rd etc tier dropdowns to the left
 * by the amount of the width of the first tier.
*/
nav ul ul ul li {
	position: relative;
	top:-60px;
	/* has to be the same number as the "width" of "nav ul ul li" */ 
	left:170px; 
}

	
/* Change ' +' in order to change the Dropdown symbol */
li > a:after { content:  ' +'; }
li > a:only-child:after { content: ''; }


/* Media Queries
--------------------------------------------- */

@media all and (max-width : 768px) {

	#logo {
		display: block;
		padding: 0;
		width: 100%;
		text-align: center;
		float: none;
	}

	nav {
		margin: 0;
	}

	/* Hide the navigation menu by default */
	/* Also hide the  */
	.toggle + a,
	.menu {
		display: none;
	}

	/* Stylinf the toggle lable */
	.toggle {
		display: block;
		background-color: #254441;
		padding:14px 20px;	
		color:#FFF;
		font-size:17px;
		text-decoration:none;
		border:none;
	}

	.toggle:hover {
		background-color: #000000;
	}

	/* Display Dropdown when clicked on Parent Lable */
	[id^=drop]:checked + ul {
		display: block;
	}

	/* Change menu item's width to 100% */
	nav ul li {
		display: block;
		width: 100%;
		}

	nav ul ul .toggle,
	nav ul ul a {
		padding: 0 40px;
	}

	nav ul ul ul a {
		padding: 0 80px;
	}

	nav a:hover,
 	nav ul ul ul a {
		background-color: #000000;
	}
  
	nav ul li ul li .toggle,
	nav ul ul a,
  nav ul ul ul a{
		padding:14px 20px;	
		color:#FFF;
		font-size:17px; 
	}
  
  
	nav ul li ul li .toggle,
	nav ul ul a {
		background-color: #212121; 
	}

	/* Hide Dropdowns by Default */
	nav ul ul {
		float: none;
		position:static;
		color: #ffffff;
		/* has to be the same number as the "line-height" of "nav a" */
	}
		
	/* Hide menus on hover */
	nav ul ul li:hover > ul,
	nav ul li:hover > ul {
		display: none;
	}
		
	/* Fisrt Tier Dropdown */
	nav ul ul li {
		display: block;
		width: 100%;
	}

	nav ul ul ul li {
		position: static;
		/* has to be the same number as the "width" of "nav ul ul li" */ 

	}

}

@media all and (max-width : 330px) {

	nav ul li {
		display:block;
		width: 94%;
	}

}

/* Style the content */
.content {
 style="text-align: center; 
 margin-top:200px; 
 width:95%; 

 
}

/* Style the footer */
.footer {
line-height: 18px;
   text-align: center;
	height:60px;
	position:fixed;
	left:0px;
	bottom:0px;
	background-color: #254441;
	width:100%;
	z-index: 99;
	color:#FFFFFF;
}

/*table*/


th, td {
  border-bottom: 1px solid #ddd;
  padding: 15px;
  text-align: left;
}

</style>
</head>
<body style=" background-color:white; opacity:0.8; " ">

<body>
<nav>
<div id="logo"><a href="..\page\admin.php">ระบบแจ้งซ่อมคอมพิวเตอร์</a></div>
        <label for="drop" class="toggle">เมนู +</label>
        <input type="checkbox" id="drop" />
            <ul class="menu">        
<?php 
if($_SESSION['sess_status'] == "0" OR $_SESSION['sess_status'] == "1") 
{ 
?>
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">จัดการผู้ใช้ +</label>
                    <a href="#">จัดการผู้ใช้</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="..\admin\display_user_admin.php">แสดงชื่อผู้ใช้งาน</a></li>
                        <li><a href="..\admin\register.php">สมัครสมาชิก</a></li>
                    </ul> 
                </li>
				<li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-2" class="toggle">จัดการการแจ้งซ่อม +</label>
                    <a href="#">จัดการการแจ้งซ่อม</a>
                    <input type="checkbox" id="drop-2"/>
                    <ul>
                        <li><a href="..\repair\fix_send.php">แจ้งซ่อมคอมพิวเตอร์</a></li>
                        <li><a href="..\repair\show_fix.php">ดูรายการแจ้งซ่อม</a></li>
                        <li><a href="..\repair\history.php">ประวัติ</a></li>
                    </ul> 
                </li>
				<li><a href="..\inventory\add_inven.php">เพิ่มอุปกรณ์</a></li>
				<!--  <li>
   <a href="..\inventory\form.php">อัพโหลด</a>
  </li>-->
<?php
 } 
?>
<?php 
if($_SESSION['sess_status'] == "2" ) 
{ 
?>
				<li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle">จัดการการแจ้งซ่อม +</label>
                    <a href="#">จัดการการแจ้งซ่อม</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li><a href="..\repair\fix_send.php">แจ้งซ่อมคอมพิวเตอร์</a></li>
                        <li><a href="..\repair\show_fix.php">ดูรายการแจ้งซ่อม</a></li>
                        <li><a href="..\repair\history.php">ประวัติ</a></li>
                    </ul> 
                </li>
<?php } ?>				
<?php 
if($_SESSION['sess_status'] == "3" ) 
{ 
?>
				<li><a href="..\repair\fix_send.php">แจ้งซ่อมคอมพิวเตอร์</a></li>
				<li><a href="..\repair\show_fix.php">ดูรายการแจ้งซ่อม</a></li>
<?php 
}
$name = $_SESSION["sess_name"];
$sur = $_SESSION["sess_lastname"];
?>
<?php if($_SESSION['sess_status'] == "0" OR $_SESSION['sess_status'] == "1") 
{ 
?>
				<li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-3" class="toggle">ค้นหาข้อมูล +</label>
                    <a href="#">ค้นหาข้อมูล</a>
                    <input type="checkbox" id="drop-3"/>
                    <ul>
                        <li><a href="..\search\search_user.php">ค้นหาข้อมูลผู้ใช้</a></li>
                        <li><a href="..\search\search_repair.php">ค้นหาข้อมูลรายการซ่อม</a></li>
                        <li><a href="..\search\search_inven.php">ค้นหาข้อมูลอุปกรณ์</a></li>
                    </ul> 
                </li>
<?php
}
else
{
?>
<li><a href="..\search\search_inven.php">ค้นหาข้อมูลอุปกรณ์</a></li>
<?php 
} 
?>
				<li><a href="..\static\show_static.php">สถิติ</a></li>
                <li><a href="..\admin\edit_me.php"><?php echo $name." ".$sur; ?></a></li>
                <li><a href="..\logout.php" >ออกจากระบบ</a></li>
</ul>
</nav>

<center>
<div class="content">


