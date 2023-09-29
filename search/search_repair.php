
<!---------------------------------------------------------------------------------------->
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
      <th>หมายเลขผลิตภัณ์ หรือ ชื่อ/สกุล/เบอร์/อีเมล์ ผู้แจ้งซ่อม 
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>" placeholder="กรอกข้อมูล">
      <input type="submit" value="ค้นหา"></th>
    </tr>
  </table>
</form>

<?php
	
   $strSQL = "SELECT * FROM ((repair
INNER JOIN user_info ON repair.r_id = user_info.id_card)
INNER JOIN inventory ON repair.serial = inventory.serial)
WHERE repair.serial LIKE '%".$strKeyword."%' OR user_info.name LIKE '%".$strKeyword."%'
OR user_info.surname LIKE '%".$strKeyword."%' OR user_info.phone LIKE '%".$strKeyword."%' 
OR user_info.email LIKE '%".$strKeyword."%' ";

  $objQuery = mysqli_query($conn,$strSQL) or die ("m");
$Num_Rows = mysqli_num_rows($objQuery);

$Per_Page = 10;   // Per Page

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

$strSQL .=" order  by r_date DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysqli_query($conn,$strSQL);

?><br>
<table width="90%"  >
<tr>
    <th width="15%" > วันที่แจ้งซ่อม</th>
	 <th width="20%">หมายเลขผลิตภัณ์</th>
	 <th width="20%">ชื่ออุปกรณ์</th>
    <th width="15%">ชื่อ-สกุลผู้แจ้งซ่อม</th>
	   <th width="10%">สถานะการซ่อม</th>	   
	    <th width="10%"> รายละเอียด</th>	   
  </tr>
<?php
/*if ($strKeyword == null)
{
}
else
{*/
while($result = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
{
?>
	<tr>
    <td><?php echo $result["r_date"];?></td>
    <td><?php echo $result["serial"];?></td>
    <td ><?php echo $result["c_name"];?></td>
    <td><?php echo " ".$result["name"]." ".$result["surname"]." ";?></td>
	<td><?php echo $result["r_status"];?></td>
<td ><a href="javascript:popup('../repair/detail_repair.php?txt_id=<?php echo $result["repair_id"]; ?>','',800,600)" >[ดูรายละเอียด]</a></td>
	</tr>
<?php
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