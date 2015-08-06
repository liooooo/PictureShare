<?php 
session_start();

if($_SESSION["login_name"] == null) {
    echo "<script>alert('您未登陆，请先登陆！');location.href='login.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="./js/check.js"></script>
<title>修改密码</title>
<style type="text/css">
.button {	 -webkit-border-radius: 9;
  	-moz-border-radius: 9;
 	 border-radius: 9px;
	font-family: Arial;
 	 color: #f7f7f7;
  	font-size: 17px;
 	 background: #5e6970;
  	padding: 4px 11px 3px 10px;
}
.divbox {	 width:400px; height:300px; background-color:#FFFFFF; color:#000000; border:10px solid #666666
}
</style>
<script type="text/javascript">
function check_oldpassword(){
	var name=form1.text1.value;
	if (name == "") {
		alert("旧密码不能为空");
		return false;
	}
	return true;
}

function check() {
	if(check_oldpassword() && checkEmail() && checkpassword() && checkrepassword()) {
		return true;
	}
	return false;
}
</script>
</head>

<body background="background/background.jpg">
<form name="form1" method="post" action="ChangePassword_proc.php" onSubmit="return check()">
<div align="center">
  <h1>&nbsp;</h1>
  <h1>修改密码</h1>
</div>
<div align="center">
  <table width="450px" align="center" class="divbox">
    <tr width="250px"  align="center">
      <td height="52"><font size="4" > 旧密码&nbsp;</font> 
          <input id="text1" type="password" style="background:none;" name="OldPassword" placeholder="******" />
      </td>
    </tr>
    <tr align="center">
      <td height="51"><font size="4" >注册邮箱</font>
        <input id="text4"  style="background:none;" name="E-mail" placeholder="******" /></td>
    </tr>
    <tr align="center">
      <td height="47"><font size="4"></font><font size="4" >新密码&nbsp;</font>
        <input id="text2" type="password" style="background:none;" name="NewPassword" placeholder="******" /></td>
    </tr>
    <tr align="center">
      <td height="51"><font size="4" >确认密码</font>
        <input id="text3" type="password" style="background:none;" name="NewPassword_" placeholder="******" /></td>
    </tr>
    <tr align="center">
      <td><input type="submit" class="button" value="提交" name="text5" /></td>
    </tr>
  </table>
</div>
<div align="center"></div>
</form>>
</body>
</html>