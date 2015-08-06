<?php
session_start();

include_once 'cnn/cnn.php';

if(isset($_SESSION["login_name"]) && $_SESSION["login_name"] == "admin") {
    $username = $_SESSION["login_name"];

} else {
    echo "<script>alert('非管理员无法访问');location.href='login.php';</script>";
}
?>

<html>
<head>
<title>admin</title>
<style type='text/css'>

	input {font:50% "瀹嬩綋"
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
	text-align:center;
	}
    .STYLE8 {
	font-family: Arial;
  	font-size: 15px;
	color: #5B5B5B;
	padding-right:150px;
	text-align:right;
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
    .STYLE16 {
	font-family: Arial;
  	font-size: 15px;
	color: #5B5B5B;
	 }
</style>
</head>
<body>
	<div>
	<br/>
	<h2 class="STYLE7">Administrator</h2> 
	<a class="Back" href="login_out.php">logout</a>
	</div>
	<br/><br/><br/>
    <div align="center" class="divbox2">
		<table>
    			<td><input type="submit" name="Submit" class="button" value="UserManage" onClick="location.href='UserManage.php'"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				
    		<td ><input type="button" name="Submit4" class="button" value="PictureManage" onClick="location.href='PictureManage.php'"/></td>
		</table>
    </div>
	<br/><br/><br/><br/><br/>
	<div  class="divbox">
		<h2 align = "center" class = "STYLE16">About</h2>
		<h2 class = "STYLE8">PageViews:28</h2>
		<h2 class = "STYLE8">Cumulative PageViews:69</h2>
		<h2 class = "STYLE8">PhotoNum:6</h2>
		<h2 class = "STYLE8">Cumulative PhotoNum:26</h2>
		<h2 align = "center" class = "STYLE16">Any questions please contact zhu peixian</h2>
	</div>
</body>
</html>