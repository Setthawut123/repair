<?php
  //tool สำหรับ import ข้อมูล
  //ข้อมูลอยู่ในรูปไฟล์ Text นามสกุล .CSV(excel) สมารถ export จาก MySQL ออกมาได้
  //software นี้ยังไม่รองรับข้อมูลชนิด BLOB
  //รูปแบบของข้อมูลประกอบด้วย
  //ข้อมูลแบ่งออกเป็นแถว แถวละ 1 ข้อมูล
  //ใน 1 แถวจะประกอบด้วยข้อมูล field ต่างๆ คั่นแต่ละ field ด้วย comma
  //ข้อมูลบรรทัดแรกสุด จะต้องเป็น ข้อมูลที่บอกชื่อฟิลด์
  //บรรทัดอื่นๆจะประกอบด้วยข้อมูลต่างๆ โดยต้องมีจำนวนฟิลด์ถูกต้องตรงกัน กับในบรรทัดแรก
  //ตัวอย่าง
  //บรรทัดแรก field1,field2,field3 ( หมายถึงขึ้นบรรทัดใหม่)
  //บรรทัดถัดมาทั้งหมด data1,data2,data3 
  //ไปเรื่อยๆจนจบ
  $charset = ( isset( $_POST[charset] ) ) ? $_POST[charset] : 0;
  $fileupload = $_FILES[fileupload];
  $host = ( isset( $_POST[host] ) ) ? $_POST[host] : "localhost";
  $username = ( isset( $_POST[username] ) ) ? $_POST[username] : "root";
  $password = ( isset( $_POST[password] ) ) ? $_POST[password] : "1234";
  $dbname = ( isset( $_POST[dbname] ) ) ? $_POST[dbname] : "test";
  $tablename = ( isset( $_POST[tablename] ) ) ? $_POST[tablename] : "test";
?>
<html>
<head>
<title>MySQL data Importer (.CSV)</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=($charset == 2)?'UTF-8':'TIS-620';?>" />
<style type="text/css">
* {
  margin:0;
  padding:0;
  font-family:Tahoma,"MS Sans Serif";
  font-size:100%;
}
body {
  font-size:10pt;
}
table {
  margin:0 auto;
  float:none;
  margin-top:50px;
}
form {
  border:1px solid #cc6633;
  background-color:#fffbf0;
  width:500px;
  display:table;
}
p {
  margin-bottom:5px;
}
p.head {
  text-align:center;
  font-weight:bold;
  background-color:#ffcc99;
  border-bottom:1px solid #cc6633;
  padding:3px;
}
p.submit {
  background-color:#f1f1f1;
  padding:3px 0;
  margin:0;
  border-top:1px solid #cc6633;
}
input,select {
  margin-left:5px;
}
option {
  padding:1px 2px;
}
label {
width:110px;
  text-align:right;
  float:left;
}
input#submit {
  margin-left:115px;
}
.error {
  color: red;
}
.success {
  color: green;
}
</style>
</head>
<body>
<?php
  if ( $fileupload[tmp_name] != '' )
  {
    //เชื่อมต่อกับ database
    $dbconnection = mysql_connect( $host , $username , $password );
    if ( $dbconnection )
    {
      if ( $charset == 1 )
      {
        mysql_query( "SET NAMES 'tis620';" );
      };
      $db = mysql_select_db( $dbname );
    };
    if ( !$dbconnection || !$db ) //ไม่สามารถเชื่อมต่อได้
    {
      echo '<br /><br /><p class="error">ข้อผิดพลาดของฐานข้อมูล! : <font style="font-weight:bold">'.mysql_error()."</font></p> ";
    };
    $datas = file( $fileupload[tmp_name] );
    $count = count( $datas );
    //ชื่อฟิลด์
    $fields = explode( ',' , trim( $datas[0] ) );
    $sql1 = "INSERT INTO `$_POST[tablename]` (`";
    $sql1 .= implode ( '`,`' , $fields );
    $sql1 .= "`)";
    //ข้อมูล
    for ( $i = 1 ; $i < $count ; $i++ )
    {
      $data = trim( $datas[$i] );
      if ( $data != "" )
      {
        $fields = explode( ',' , $data );
        $sql2 = "VALUES ('";
        $sql2 .= implode ( "','" , $fields );
        $sql2 .= "');";
        echo $sql1.$sql2."<br />";
        mysql_query( $sql1.$sql2 ); //Insert
      };
    };
    if ( mysql_error() ) //มี error
    {
      echo '<br /><br /><p>Import Error! : <font class="error" style="font-weight:bold">'.mysql_error()."</font></p> ";
    }
    else
    {
      echo "<br /><br /><p class=\"success\">Import success.</font></p> ";
    };
    mysql_close();
  };
?>
<table align="center" cellpadding="0" cellspacing="0"><tr><td>
<form action="import.php" method="post" enctype="multipart/form-data">
<p class="head">Import File</p>
<p><label for="charset">Charset :</label>
<select name="charset">
<option value="0">TIS-620</option>
<option value="1">TIS-620(PHP5)</option>
<option value="2">UTF-8</option>
</select>
</p>
<p><label for="host">Host name :</label><input type="text" name="host" id="host" size="45" value="<?php echo $host?>" /></p>
<p><label for="username">User name :</label><input type="text" name="username" id="username" size="45" value="<?php echo $username?>" /></p>
<p><label for="password">Password :</label><input type="text" name="password" id="password" size="45" value="<?php echo $password?>" /></p>
<p><label for="dbname">Database name :</label><input type="text" name="dbname" id="dbname" size="45" value="<?php echo $dbname?>" /></p>
<p><label for="tablename">Table name :</label><input type="text" name="tablename" id="tablename" size="45" value="<?php echo $tablename?>" /></p>
<p><label for="fileupload">Browser :</label><input type="file" name="fileupload" id="fileupload" size="45" /></p>
<p class="submit"><input type="submit" name="submit" id="submit" class="button" value="Go." /></p>
</form>
</td></tr></table>
</body>
</html>
