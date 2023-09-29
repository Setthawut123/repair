<?php
     include '../page/header.php';
	 require '../connect_db.inc.php';
?>
<script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>
<?php
	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table >
    <tr>
<br>
      <th>หมายเลขผลิตภัณฑ์/ชื่อเครื่อง/แผนก/
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>" placeholder="กรอกข้อมูล">
      <input type="submit" value="ค้นหา"></th>
    </tr>
  </table>
</form>

<form method="GET" action="search_inven.php">
ระบุจำนวน
<input type="text" name="per_page" size="3" value="10">
<input type="hidden" name="check" value="123">
<input type="submit" value="เปลี่ยน" >
</form>
<?php
$check = $_GET['check']; 

if($check != null)
{
$Per_Page = $_GET['per_page'];   // Per Page
}
else
{
	$Per_Page = 10;
}
  echo "แสดง".$Per_Page."รายการต่อหน้า";
  ?>
<?php
	
   $strSQL = "SELECT * FROM inventory 
   INNER JOIN type ON  inventory.department=type.id
   INNER JOIN kind ON  inventory.type_id=kind.id
   WHERE  serial LIKE '%".$strKeyword."%'  OR c_name LIKE '%".$strKeyword."%'  OR name LIKE '%".$strKeyword."%' OR k_name LIKE '%".$strKeyword."%'";

  $objQuery = mysqli_query($conn,$strSQL) or die ("m");
$Num_Rows = mysqli_num_rows($objQuery);


$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by serial ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysqli_query($conn,$strSQL);

?><br>

<table width="90%"  >
  <tr>
    <th width="20%">หมายเลขผลิตภัณฑ์</th>
	 <th width="20%" >ชื่ออุปกรณ์</th>
	 <th  width="10%"> ประเภท</th>
   <th width="15%">  แผนก</th>
   <?php
if($_SESSION['sess_status'] == "0" OR $_SESSION['sess_status'] == "1") 
{
?>
	<th width="15%"> ดูข้อมูล</th>
	<th width="10%"> ลบ</th>
<?php
}
?>
  </tr>
<?php
/*if ($strKeyword == null)
{
}
else
{*/
while($result = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
{
	/*
	$type = $result["type_id"];
	$array_status = array('คอมพิวเตอร์','เครื่องพิมพ์','อุปกรณ์อื่นๆ');
	
	switch ($type)
{
	case "1":
	$status = $array_status[0];
	break;
	case "2":
	$status = $array_status[1];
	break;
	case "3":
	$status = $array_status[2];
	break;
}
*/
if($result["w_id"] != 1)
{
?>
  <tr>
    <td width="20%"><font color="red"><?php echo $result["serial"];?></font></td>
    <td width="30%"><font color="red"><?php echo $result["c_name"];?></font></td>
    <td width="10%"><font color="red"><?php echo $result["k_name"];?></font></td>
	<td width="20%"><font color="red"><?php echo $result["name"];?></font></td>
<?php
if($_SESSION['sess_status'] == "0" OR $_SESSION['sess_status'] == "1") 
{
?>
<td />ไม่มีอุปกรณ์
<td />
<?php
/*
	<td width="10%">[<a href="javascript:popup('../inventory/detail_inven.php?txt_id=<?php echo $result["serial"];?>','',800,600)">รายละเอียด</a>]</td>
	<td width="5%"/>[<a href='../inventory/del_inven.php?txt_id=<?php echo $result["serial"]; ?>' onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">ลบ</a>]
	*/
	?>
	<?php
}
?>
  </tr>
<?php
		}
		else
		{
?>		
<tr>
    <td width="20%"><?php echo $result["serial"];?></td>
    <td width="30%"><?php echo $result["c_name"];?></td>
    <td width="10%"><?php echo $result["k_name"];?></td>
	<td width="20%"><?php echo $result["name"];?></td>
<?php
if($_SESSION['sess_status'] == "0" OR $_SESSION['sess_status'] == "1") 
{
?>
	<td width="10%">[<a href="javascript:popup('../inventory/detail_inven.php?txt_id=<?php echo $result["serial"];?>','',800,600)">รายละเอียด</a>]</td>
	<td width="5%"/>[<a href='../inventory/del_inven.php?txt_id=<?php echo $result["serial"]; ?>' onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">ลบ</a>]
	<?php
}
?>
  </tr>
<?php	
		}
		
	}//while
//}//else
?>
</table>
<br><br>
<br>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
?>

<?php
include '../page/footer.php';
?>