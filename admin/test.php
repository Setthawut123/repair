<script type="text/javascript"> 
function Numbers(e){
	var keynum;
	var keychar;
	var numcheck;
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	if(keynum == 13 || keynum == 8 || typeof(keynum) == "undefined"){
			return true;
	}
	keychar= String.fromCharCode(keynum);
	numcheck = /^[0-9]$/;
	return numcheck.test(keychar);
}

function checkID(id){
	if(id.length != 13) 
		
	for(i=0, sum=0; i < 12; i++)
		sum += parseFloat(id.charAt(i))*(13-i); 
	if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; 
	return true;
	
}
</script>
<form id="form1" name="form1" method="post">

รหัสประจำตัวประชาชน : 
<input type="text" name="txtID1" id="txtID1"  maxlength=13 onkeyup="checkID()" onkeypress="return Numbers(event)" />

</form> 