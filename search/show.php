<?php
/*** By Weerachai Nukitram ***/
/***  http://www.ThaiCreate.Com ***/

echo "Load Time : ".date("Y-m-d H:i:s");

$strSort = $_POST["mySort"];

$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("mydatabase");
$strSQL = "SELECT * FROM customer ORDER BY $strSort ASC ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center"><a href="JavaScript:doCallAjax('CustomerID')">CustomerID</a></div></th>
    <th width="98"> <div align="center"><a href="JavaScript:doCallAjax('Name')">Name</a> </div></th>
    <th width="198"> <div align="center"><a href="JavaScript:doCallAjax('Email')">Email</a> </div></th>
    <th width="97"> <div align="center"><a href="JavaScript:doCallAjax('CountryCode')">CountryCode</a> </div></th>
    <th width="59"> <div align="center"><a href="JavaScript:doCallAjax('Budget')">Budget</a> </div></th>
    <th width="71"> <div align="center"><a href="JavaScript:doCallAjax('Used')">Used</a> </div></th>
  </tr>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
  </tr>
<?
}
?>
</table>
<?
mysql_close($objConnect);
?>