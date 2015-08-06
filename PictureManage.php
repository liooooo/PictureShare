<?php
session_start();
include_once 'cnn/cnn.php';
?>

<html>
<head>
<title>PictureManage</title>
<style type='text/css'>

	input {font:50% "宋体"
	}
	body {
	background-image: url(./background/background.jpg);
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
    .box {
	background: #D9D9D9;
	width: 240px;
	height: 210px;
	margin: 15px 30px;
	float: left;
	position:relative;
}
</style>
</head>
<body>
<?php 

//获取数据库中y的条数，即图片的数量
$query_sum = "select count(*) from report";
$result = mysql_query($query_sum);
$row_sum = mysql_result($result,0);

//
$i = 0;
for($i; $i < $row_sum; $i++) {
    $query =  "select image_name from report limit $i, 1";
    $img_arr[$i] = mysql_query($query);
    $display_img[$i]  = mysql_fetch_row($img_arr[$i]);
    
    //查找图片的上传者
    $pic = implode($display_img[$i]);
    $query_ = "select uploader from image where image_name = '$pic'";
    $upload_arr[$i] = mysql_query($query_);
    $display_uploader[$i]  = mysql_fetch_array($upload_arr[$i]);
}
?>
	<div>
			<br/><br/>
		    <h2 align="left" class="STYLE7">Administrator</h2> 
			<a class="Back" href="admin_index.php">Back</a>
	</div>
	<div class="content">
<?php
    $path_p = "./img_p/";
for($i=0;$i< $row_sum;$i++){ ?>

	<div class="box">
	<a href="delete_picture_proc.php?image_name=<?php echo implode($display_img[$i]);?>" class="now" id="collect0">删除</a>
	<p>上传者：<?php echo implode($display_uploader[$i]);?>
	<img src="<?php echo $path_p.implode($display_img[$i]);?>"/>
	</div>
	
<?php } ?>
  </div>
</body>
</html>
