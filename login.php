<html>
<head>
<title>login</title>
<style type='text/css'>

	input {font:50% "宋体"
	}
	body {
	background-image: url(./background/background.jpg);
	background-repeat: no-repeat;
	}
	.divbox {
	 width:400px; height:200px; background-color:#FFFFFF; color:#000000; border:10px solid #666666;
	 margin:0 auto;
	}

    .STYLE7 {
	font-size: xx-large;
	font-weight: bold;
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	}
    .STYLE8 {
	font-size: large;
	font-weight: bold;
	}
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
	.back{
	color:#FFFFFF;
	font-size: xx-large;
	font-weight: bold;
	position:fixed;
	font-family: Arial, Helvetica, sans-serif;
	top:40px;
	right:10px;
	text-decoration:none;
	}
    .STYLE16 {font-family: "宋体"; color: #333333; }
</style>
</head>
<body>
<div>
    <br />
	<h2 align="center" class="STYLE7">WELCOME TO VISIT！</h2> 
	<a class="back" href="index.php">BACK</a>
</div>
	    <br/>
	    <br/>
	    <br/>
	    <br/>
	    <br/>
	    <br/>
	  <!--此处为将输入框调整到中间位置而输出的空行 -->
	<div class="divbox"> 
	  <form action="login_proc.php" method="post"><!--采用 POST 方法，浏览器将与 action 属性中指定的表单处理服务器建立联系 -->
            <br/><br/>	 	                 
	        <div align="center" class="STYLE8">
	            <table>
	               <tr>
	                  <td><span  class="STYLE8">用户名：</span></td>
	                  <td><input name="username" type="text" size="20" maxlength="20" /></td>
	               </tr>
	               <tr></tr>                        <!-- 空行为了行间距 -->
	               <tr></tr>
	               <tr></tr>
	               <tr>
	                  <td><span  class="STYLE8">密码：</span></td>
	                  <td><input name="passwd" type="password" size="20" maxlength="20"></td>
	               </tr>
	            </table>
		    </div>
        
            <div class="divbox2" align="center">
              <br/><br/>
              <input name="submit" type="submit" class="button" value="登陆" />
              <input type="reset" value="取消" class="button"/>
              <input type="button" name="Submit4" value="我要注册" class="button" onclick="location.href='register.php'"/>
            </div>

	  </form>
  </div>
</body>
</html>
