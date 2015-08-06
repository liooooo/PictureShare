<?php
session_start();

include_once 'cnn/cnn.php';

if(isset($_SESSION["login_name"]) && $_SESSION["login_name"] == "admin") {
    $username = $_SESSION["login_name"];

} else {
    echo "<script>alert('非管理员无法访问');location.href='login.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Manage</title>
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
    .STYLE16 {font-family: "瀹嬩綋"; color: #333333; }
	.divbox {
	 width:700px;
	 height: 100%;
	 background-color:#FFFFFF; 
	 color:#000000; 
	 border:10px solid #666666;
	 margin:0 auto;
	 font-weight:bold;
	}
	.divbox thead{
	background: #333333;
	color:#FFFFFF;
	text-align:center;
	}
	.divbox tbody{
	background: #DDDDDD;
	text-align:center;
	}
	.divbox td{
	width:170px;
	height:30px;
	}
</style>
</head>
<body>
<?php 
//获取数据库中y的条数，即图片的数量
$query_sum = "select count(*) from usermanage";
$result = mysql_query($query_sum);
$row_sum = mysql_result($result,0);

//
$i = 0;
for($i; $i < $row_sum; $i++) {
    $query =  "select username from usermanage limit $i, 1";
    $user_arr[$i] = mysql_query($query);
    $display_username[$i]  = mysql_fetch_row($user_arr[$i]);
}

$i = 0;
for($i; $i < $row_sum; $i++) {
    $query =  "select passwd from usermanage limit $i, 1";
    $passwd_arr[$i] = mysql_query($query);
    $display_passwd[$i]  = mysql_fetch_row($passwd_arr[$i]);
}

$i = 0;
for($i; $i < $row_sum; $i++) {
    $query =  "select username from usermanage limit $i, 1";
    $email_arr[$i] = mysql_query($query);
    $display_email[$i]  = mysql_fetch_row($email_arr[$i]);
}


?>
	<div>
    <br />
	<h2 align="left" class="STYLE7">Administrator</h2> 
	<a class="back" href="admin_index.php">Back</a>
	</div>
    <div class="divbox">
    <table class="users">
	  <thead>
	    <tr>
		  <td>username</td>
		  <td>password</td>
		  <td>mail</td>
		  <td>delete</td>
		</tr>
	  </thead>
	  <tbody>
	  <?php for($i=0;$i< $row_sum;$i++){ ?>
       <tr>
       <td><?php echo implode($display_username[$i]);?></td>
       <td><?php echo implode($display_passwd[$i]);?></td>
       <td><?php echo implode($display_email[$i]);?></td>
       <td><input type="button" name="delete" class="button" value="deletes"  onClick="location.href='delete_user_proc.php?username_to_delete=<?php echo implode($display_username[$i]);?>'"/></td>
       </tr>
      <?php  }?>
	  </tbody>
	</table>
	
	
    </div>
</body>
</html>
