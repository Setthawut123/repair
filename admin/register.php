<?php
include('..\page\header.php');
include('..\page\status_1.php');
include 'script.php';
?>
<!--
<center>
<form name="form1" method="post" action="save_register.php"><br>
 <h2> สมัครสมาชิก </h2><br>
  <table >
    <tbody>
      <tr>
        <td width="125">ชื่อผู้ใช้</td>
        <td width="180">
          <input type="text" id="txtCustomerID" name="txtCustomerID" size="5">
	<span id="sCusID"></span>
        </td>
      </tr>
	  <tr>
    <td width="114">CustomerID <font color="red">*</font></td>
    <td width="309"><input type="text" id="txtCustomerID" name="txtCustomerID" size="5">
	<span id="sCusID"></span>
	</td>
  </tr>
      <tr>
        <td> รหัสผ่าน</td>
        <td><input name="u_pass" type="password" id="u_pass" required>
        </td>
      </tr>
      <tr>
        <td> ยืนยันรหัสผ่าน</td>
        <td><input name="c_pass" type="password" id="c_pass" required>
        </td>
      </tr>
      <tr>
        <td>ชื่อ</td>
        <td><input name="name" type="text" id="name" size="35" required></td>
      </tr>
	  <tr>
        <td>นามสกุล</td>
        <td><input name="surname" type="text" id="surname" size="35" required></td>
      </tr>
	  <tr>
        <td>เลขบัตรประจำตัว</td>
        <td><input name="id_card" type="text" id="id_card" size="35" ></td>
      </tr>
	  <tr>
    <td>Email <font color="red">*</font></td>
    <td><input type="text" id="txtEmail" name="txtEmail" size="25">
	<span id="sEmail"></span>
	</td>
  </tr>
	  <tr>
        <td> เพศ</td>
        <td>
		<input type="radio" name="sex" id="sex" value="f" />หญิง
		<input type="radio" name="sex" id="sex" value="m" />ชาย   
</td>
      </tr>
	  <tr>
        <td>E-mail</td>
        <td><input name="Email" type="email" id="Email" size="35" ></td>
      </tr>
	  <tr>
        <td>โทรศัพท์</td>
        <td><input name="phone" type="text" id="phone" size="35" required></td>
      </tr>
	  <tr>
        <td>วันเกิด</td>
        <td><input name="date" type="date" id="date" size="35"></td>
      </tr>
      <tr>
        <td>สถานะ</td>
        <td>
          <select name="status" id="status">
		<option >เลือกสถานะ</option>
            <option value="0">แอดมิน</option>
            <option value="1">เจ้าหน้าที่</option>
			<option value="2">ช่างซ่อม</option>
            <option value="3">ผู้ใช้</option>
          </select>
</td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="Save">
</form>
</center>
<br>
<br>
-->
<center>
<form name="form1" method="post" action="save_register.php"><br>
<h2> สมัครสมาชิก </h2>
<table >
	 <tr>
        <td>บัญชีผู้ใช้<font color="red">*</font></td>
        <td><span id="username"></span><br>
		<input type="text" id="txtusername" name="txtusername" required>
        </td>
      </tr>
      <tr>
        <td> รหัสผ่าน</td>
        <td><input name="u_pass" type="password"  id="u_pass" onblur="checkPasswordMatch();" required>
        </td>
      </tr>
      <tr>
        <td> ยืนยันรหัสผ่าน</td>
        <td><div class="registrationFormAlert" id="divCheckPasswordMatch"></div><br>
		<input name="c_pass" type="password" id="c_pass" onblur="checkPasswordMatch();" required>
        </td>
      </tr>
      <tr>
        <td>ชื่อ</td>
        <td><input name="name" type="text" id="name" required></td>
      </tr>
	  <tr>
        <td>นามสกุล</td>
        <td><input name="surname" type="text" id="surname"  required></td>
      </tr>
	   <tr>
        <td> เพศ</td>
        <td>
		<input type="radio" name="sex" id="sex" value="f" />หญิง
		<input type="radio" name="sex" id="sex" value="m" />ชาย   
</td>
      </tr>
	  <tr>
        <td>เลขบัตรประจำตัว<font color="red">*</font></td>
        <td><span id="id_card"></span><br>
		<input type="text" id="txtid_card" name="txtid_card" onblur="checkForm(this)"  required onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="13" >
	</td>
      </tr>
	  <tr>
  </tr>
	  <tr>
        <td>E-mail</td>
        <td><span id="email"></span><br>
		<input type='text' name="email" id='email' onblur='check_email(this)'>
		</td>
		
      </tr>
	  <tr>
        <td>โทรศัพท์</td>
        <td><input name="phone" type="text" id="phone"  required onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="10"></td>
      </tr>
	  <tr>
        <td>วันเกิด</td>
        <td><input name="date" type="date" id="date" ></td>
      </tr>
      <tr>
        <td>สถานะ</td>
        <td>
          <select name="status" id="status">
            <option value="0">แอดมิน</option>
            <option value="1">เจ้าหน้าที่</option>
			<option value="2">ช่างซ่อม</option>
            <option value="3" selected>ผู้ใช้</option>
          </select>
</td>
      </tr>	
</table>
<br>
<input type="submit" name="Submit" value="Save">
</form>
</center>


<?php
include '../page/footer.php';
?>