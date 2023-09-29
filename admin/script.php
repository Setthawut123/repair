<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#txtusername,#txtid_card").change(function(){

			$("#username").empty();
			$("#id_card").empty();

			$.ajax({ 
				url: "return1.php" ,
				type: "POST",
				data: 'username=' +$("#txtusername").val()+'&id_card='+$("#txtid_card").val()
			})
			.success(function(result) { 

					var obj = jQuery.parseJSON(result);

					if(obj != '')
					{
						  $.each(obj, function(key, inval) {

								   if($("#txtusername").val() == inval["username"])
								  {
									   $("#username").html(" <font color='red'>ชื่อบัญชีนี้มีผู้ใช้แล้ว</font>");
								  }
									if($("#txtid_card").val() == inval["id_card"])
								  {
									   $("#id_card").html(" <font color='red'>เลขบัตรนี้มีผู้ใช้แล้ว</font>");
								  }
						  });
					}

			});

		});
	});
</script>
<script type='text/javascript'>
function check_email(elm){
    var regex_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
    if(!elm.value.match(regex_email)){
      $("#email").empty();
         $("#email").html(" <font color='red'>รูปแบบอีเมล์ไม่ถูกต้อง</font>");
	}
	else{
		$("#email").html(" <font color='green'>สามารถใช้อีเมล์นี้ได้</font>");
	}
}
</script>

<script language="javascript">
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); 
if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm(elm){ 	 
if(elm.value.length !=13 )
	$("#id_card").html(" <font color='red'>กรุณากรอกเลขบัตรให้ครบ</font>");
else if(elm.value.length ==13 && !checkID(elm.value))
	$("#id_card").html(" <font color='red'>เลขบัตรประชาชนไม่ถูกต้อง</font>");
else if(elm.value.length ==13 && checkID(elm.value))
	$("#id_card").html(" <font color='green'>สามารถใช้เลขบัตรประชาชนนี้ได้</font>");
}
</script>


<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#u_pass").val();
    var confirmPassword = $("#c_pass").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html(" <font color='red'>รหัสผ่านไม่ตรงกัน</font>");
	else
		$("#divCheckPasswordMatch").empty();
}
</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
