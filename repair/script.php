<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#txtCustomerID").change(function()
	{
		$("#sCusID").empty();
			$.ajax
			({ 
				url: "return2.php" ,
				type: "POST",
				data: 'sCusID=' +$("#txtCustomerID").val()
			})
			.success(function(result) 
			{ 
				var obj = jQuery.parseJSON(result);
					if(obj == '')
					{
						 $("#sCusID").html(" <font color='red'>ไม่มีหมายเลขนี้ในฐานข้อมูล</font>");
					}
					else
					{
						  $.each(obj, function(key, inval) 
						  {
							   $("#txtCustomerID").val(inval["serial"]);
							   $("#txt_cname").val(inval["c_name"]);
						  });
					}

			});

		});
	});
</script>

<script type="text/javascript"> 
function autoTab(obj){ 
/* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย 
หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น รูปแบบเลขที่บัตรประชาชน 
4-2215-54125-6-12 ก็สามารถกำหนดเป็น _-____-_____-_-__ 
รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____ 
หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__ 
ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบรหัสสินค้า
รหัสสินค้า 11-BRID-Y1207 
*/ 
var pattern=new String("____-___-_______-___"); // กำหนดรูปแบบในนี้ 
var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้ 
var returnText=new String(""); 
var obj_l=obj.value.length; 
var obj_l2=obj_l-1; 
for(i=0;i<pattern.length;i++){ 
if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){ 
returnText+=obj.value+pattern_ex; 
obj.value=returnText; 
} 
} 
if(obj_l>=pattern.length){ 
obj.value=obj.value.substr(0,pattern.length); 
} 
} 
</script> 
<script>
  
function getDataFromDb()
{
	$.ajax({ 
				url: "getData.php" ,
				type: "POST",
				data: ''
			})
			.success(function(result) { 
				var obj = jQuery.parseJSON(result);
					if(obj != '')
					{
						  //$("#myTable tbody tr:not(:first-child)").remove();
						  $("#myBody").empty();
						  $.each(obj, function(key, val) {
									var tr = "<tr>";
									tr = tr + "<td>" + val["CustomerID"] + "</td>";
									tr = tr + "<td>" + val["Name"] + "</td>";
									tr = tr + "<td>" + val["Email"] + "</td>";
									tr = tr + "<td>" + val["CountryCode"] + "</td>";
									tr = tr + "<td>" + val["Budget"] + "</td>";
									tr = tr + "<td>" + val["Used"] + "</td>";
									tr = tr + "</tr>";
									$('#myTable > tbody:last').append(tr);
						  });
					}

			});

}

setInterval(getDataFromDb, 10000);   // 1000 = 1 second
</script>



