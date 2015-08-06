<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
	<script type="text/javascript" src="./js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="./js/check.js"></script>
    <title>用户注册</title>  
<style type="text/css">
table{margin-left:35%; margin-right:35%;}

	.button {
	 -webkit-border-radius: 9;
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
  </head>
    <body background="background/background.jpg">
    <form name="form1" method="post" action="register_proc.php" onSubmit="return check()">
      <p align="center">&nbsp;</p>
	  <strong>
	  </strong><font size=9 font-family="宋体">
	  <p align="center"><strong> 注册界面</strong></p>
	</font>
	<table width="359" class="divbox">
      <tr width="250px"  align="center">
        <td width="333" height="55">
		  <font size=4 font-family="宋体">用户名：&nbsp;</font>
          <input id="text1" type="text" style="background:none;" name="text1" onBlur="checkname()" placeholder="zhangsan"> 
        </td>
      </tr>
      <tr align="center">
        <td height="38"> 
          <font size=4 font-family="宋体">密码：&nbsp;&nbsp;</font>
		  <input id="text2" type="password" style="background:none;" name="text2" placeholder="******">
        </td>
      </tr> 
      <tr align="center">  
        <td height="44"> 
		  <font size=4 font-family="宋体">确认密码：</font>
          <input id="text3" type="password" style="background:none;" name="text3" placeholder="******">
        </td> 
      </tr> 
      <tr align="center"> 
        <td height="37"> 
		  <font size=4 font-family="宋体">电子邮件：</font>
          <input id="text4" type="text" style="background:none;" name="text4" placeholder="1111111111@qq.com">
        </td>
      </tr>
      <tr align="center">
	  <td height="43">
      <input type="submit" class="button" value="提交" name="text6">
      &nbsp;&nbsp;&nbsp;
      <input type="reset" class="button" value="重置" name="text7"> 
	  </td>
    </tr>
	</table>
    </form>
  </body>
</html>


