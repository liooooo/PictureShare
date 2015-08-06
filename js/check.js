	  function checkname(){ 
        var name1 = form1.text1.value; 
        if (name1 == "") {
		  alert("姓名不能为空"); 
          return false; 
        } 
        if (name1.length < 4 || name1.length > 16) { 
          alert("姓名输入的长度需要在4-16个字符之间");  
          return false; 
        } 
		var charname1 = name1.toLowerCase(); 
        for (var i = 0; i < name1.length; i++) { 
          var charname = charname1.charAt(i); 
          if (!(charname >= 0 && charname <= 9) && (!(charname >= 'a' && charname <= 'z')) && (charname != '_')) { 
            alert("姓名包含非法字母，只能包含字母，数字，和下划线");  
            return false; 
          } 
       }
	   $.ajax({
		   url:"register_check.php", 
		   type:"POST",
		   data:"text1="+ name1,
	       success:function(msg){
			 var data = msg;
		     if (data == 0) {
		       alert("用户名可用!");
	         } 
			 if (data == 1){
		       alert("用户名已被注册!");
			   return false;
		     }
		   }
	  });
      return true;	   
     }

     function checkpassword(){ 
	var password = form1.text2.value; 
	if (password == "") { 
	  alert("密码不能为空！"); 
	  form1.text2.focus(); 
	  return false; 
	} 
	if (password.length < 4 || password.length > 16) { 
	 alert("密码长度需要4-16位！"); 
	  form1.text2.select(); 
	  return false; 
	} 
	return true; 
      }

      function checkrepassword(){ 
	var password = form1.text2.value; 
	var repass = form1.text3.value; 
	if (repass == "") { 
	  alert("输入确认密码不能为空！"); 
	  form1.text3.focus(); 
	  return false; 
	} 
	if (password != repass) { 
	 alert("输入密码和确认密码不一致！"); 
	  form1.text3.select(); 
	  return false; 
	} 
	return true; 
      }

      function checkEmail(){ 
	var email = form1.text4.value; 
	var sw = email.indexOf("@", 0); 
	var sw1 = email.indexOf(".", 0); 
	var tt = sw1 - sw; 
	if (email.length == 0) { 
	 alert("电子邮件不能为空！"); 
	  form1.text4.focus(); 
	  return false; 
	} 
	if (email.indexOf("@", 0) == -1) { 
	  alert("电子邮件格式不正确，必须包含@符号！"); 
	  form1.text4.select(); 
	  return false; 
	} 
	if (email.indexOf(".", 0) == -1) { 
	  alert("电子邮件格式不正确，必须包含.符号!"); 
	  form1.text4.select(); 
	  return false; 
	} 
	if (tt == 1) { 
	  alert("邮件格式不对。@和.不可以挨着！"); 
	  form1.text4.select(); 
	  return false; 
	} 
	if (sw > sw1) { 
	  alert("电子邮件格式不正确，@符号必须在.之前"); 
	  form1.text4.select(); 
	  return false; 
	} 
	else { 
	  return true; 
	}
	
	return true; 
      }

      function check(){ 
		if (checkname() && checkpassword() && checkrepassword() && checkEmail()) { 
			return true; 
		} 
		else { 
			return false; 
		} 
      }
  // JavaScript Document// JavaScript Document