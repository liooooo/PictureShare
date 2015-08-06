<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <?php session_start();?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>个人照片面板</title>
<style type="text/css">
body {
    margin:0px;
	background:#CCCCCC;
}
.header {
	padding: 16px 0px;
	background:#666666;
	width:100%;
	height:73px;
	z-index: 2;
}
.logo {
    float:left;
}
.logo img{
    height:100px;
}
.welcome {
    float:left;
	font-size: 23px;
	font-weight: 500;
	color: #993333;
	padding: 30px;
}
.back {
	 float:right;
	font-size: 23px;
	font-weight: 500;
	color: #993333;
	padding: 30px;
}
.navg {
    float:right;
}
.navg ul li {
	display: inline-block;
	margin:10px 10px 0px 0px;
}
.navg ul li a {
	text-decoration: none;
	font-size: 27px;
	font-weight: 500;
	color: #993333;
	padding: 13px;
}
.navg ul li a:hover,.navg ul li a.active{
	text-decoration: none;
	color:#CCCC00;
	transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition:  0.5s all;
    -o-transition:  0.5s all;
}
.footer {
	height: 30px;
	clear: left;
}
h2 { text-align: center;}
.container { 
    width:100%; 
	height:50%;
	margin:0px auto;
	padding-top:100px;
	text-align:center;
}

.container img {  
    top:50px; left:0px;
    border:0px solid #ddd;
    transition:0.5s; 
    -webkit-filter: blur(1px); 
       -moz-filter: blur(1px);
        -ms-filter: blur(1px);    
            filter: blur(1px); 
}

.img1 {  transform:rotate(30deg); z-index: 1;}
.img2 {  transform:rotate(-30deg); z-index: 1;}
.img3 { transform:rotate(30deg); z-index: 1;}
.img4 { transform:rotate(30deg); z-index: 1;}
.img5 {  transform:rotate(-40deg); z-index: 1;}
.img6 { transform:rotate(-40deg); z-index: 1;}
.img7 {  transform:rotate(-40deg); z-index: 1;}
.img8 {  transform:rotate(-100deg); z-index: 1;}
.img9 {  transform:rotate(90deg); z-index: 1;}
.img10 {  transform:rotate(-30deg); z-index: 1;}
.img11 { transform:rotate(30deg); z-index: 1;}
.img12 { transform:rotate(60deg); z-index: 1;}
.img13 {  transform:rotate(-40deg); z-index: 1;}
.container img:hover { 
    transform:rotate(0deg); 
	transform:scale(1.5); 
	z-index: 2;    
	-webkit-filter: blur(0px); 
       -moz-filter: blur(0px);
        -ms-filter: blur(0px);    
            filter: blur(0px);
	box-shadow:0px 0px 20px #f00;
}
.page {
    text-align:center;
	padding-top:50px;
}
.font1 {
	text-decoration: none;
	font-size: 27px;
	font-weight: 500;
	color: #0099CC;
	padding: 13px;
}
.font1:hover,.font1:active{
	text-decoration: none;
	color:#CCCC00;
	transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition:  0.5s all;
    -o-transition:  0.5s all;
}
</style>

</head>

<body>

 <?php 
       include_once 'cnn/cnn.php';
       
       if(!isset($_SESSION["login_name"])) {
           echo "<script>alert('请先登陆！');location.href='login.php';</script>"; // 未登录时跳转到登陆界面
       } else {
           $username = $_SESSION["login_name"];
           
       }
       
       
       $db = "db".$username;              // 以用户名获取完整的数据库表名
       
       if (!isset($_GET['page_'])) {
           $page_ = 1;
           
           //获取数据库中记录的条数，即图片的数量
           $query_sum = "select count(*) from $db";
           $result = mysql_query($query_sum);
           $row_sum_ = mysql_result($result,0);
            
           $pages_num = (int)($row_sum_ / 13);         //一页13张，查看有多少页
           
           for($i = 0; $i < 13; $i++) {
               $row = $row_sum_ - $i - 1;
               $query =  "select image_name from $db limit $row, 1";
               $img_arr[$i] = mysql_query($query);
           }
           
       }  
       
        else {
            $type_ = $_GET['type_'];
            $page_ = $_GET['page_'];
            $row_sum_ = $_GET['row_sum_'];
            $row = 0;

            switch ($type_){
                case 0:                                              // 返回第一页
                    $page = 1;
                     
                    //获取数据库中记录的条数，即图片的数量
                    $query_sum = "select count(*) from $db";
                    $result = mysql_query($query_sum);
                    $row_sum_ = mysql_result($result,0);
                    
                    $i = 0;
                    for($i; $i < 13; $i++) {
                        $row = $row_sum_ - $i - 1;
                        $query =  "select image_name from $db limit $row, 1";
                        $img_arr[$i] = mysql_query($query);
                    }
                    break;
                    
                case 1:                                                // 上一页
                    $page_ = $page_ - 1;
                    if($page_ > 0) {                                   //不是第一页是可以选择上一页
                        $row = $row_sum_ - ($page_ - 1) * 13 - 1; 
                    } else {
                         $row = $row_sum_ - 1;                              //已经是第一页时维持不变                       
                         $page_ = $page_ + 1;
                    }
                       $i = 0; $row++;
                       for($i; $i < 13; $i++) {
                          $row = $row - 1;
                          $query =  "select image_name from $db limit $row, 1";
                          $img_arr[$i] = mysql_query($query);
                       }
                    break;
                 
                case 2:                                              // 下一页
                    $page_ = $page_ + 1;
                    $pages_num = (int)($row_sum_/13);         //一页16张，查看有多少页
                    if($page_ <= $pages_num) {
                        $row = $row_sum_ - ($page_ - 1) * 13 - 1;      //不是最后一页是可以选择下一页
                    } else {                                 
                        $row = $row_sum_ - ($pages_num - 1) * 13 - 1;  //已经是最后一页是维持不变
                        $page_ = $page_ - 1;
                    }
                   
                    $i = 0; $row++;
                    for($i; $i < 13; $i++) {
                        $row = $row - 1;
                        $query =  "select image_name from $db limit $row, 1";
                        $img_arr[$i] = mysql_query($query);
                    }
         
                    break;
               
            }
         }
         
         $path = "./img/";
         
         for($i = 0; $i < 13; $i++) {
             $display_row[$i]  = mysql_fetch_row($img_arr[$i]);
         }
       
     ?>

<!--head start-->
<div class="header">
 <div class="welcome">
     我的收藏
 </div>
 <div class="back">
    <a href="index.php">回到首页</a>
    <a href="Picturelist.php">列表模式</a>
 </div>
</div>

    <div class="container">
      <img class="img1" src="<?php  echo $path.implode($display_row[0]);?>"    height="150" width="150" />
      <img class="img2" src="<?php  echo $path.implode($display_row[1]);?>"   height="300" width="300" />
      <img class="img3" src="<?php  echo $path.implode($display_row[2]);?>"    height="170" width="200" />
      <img class="img4" src="<?php  echo $path.implode($display_row[3]);?>"    height="240" width="200" />
      <img class="img5" src="<?php  echo $path.implode($display_row[4]);?>"    height="300" width="300" />
      <img class="img6" src="<?php  echo $path.implode($display_row[5]);?>"    height="240" width="200" />
	  <img class="img7" src="<?php  echo $path.implode($display_row[6]);?>"   height="300" width="300" />
	  <img class="img8" src="<?php  echo $path.implode($display_row[7]);?>"   height="170" width="200" />
	  <img class="img9" src="<?php  echo $path.implode($display_row[8]);?>"   height="300" width="300" />
	  <img class="img10" src="<?php echo $path.implode($display_row[9]);?>"  height="160" width="200" />
	  <img class="img11" src="<?php echo $path.implode($display_row[10]);?>"  height="170" width="200" />
	  <img class="img12" src="<?php echo $path.implode($display_row[11]);?>"  height="160" width="200" />
	  <img class="img13" src="<?php echo $path.implode($display_row[12]);?>"  height="240" width="200" />
    
	</div>
	
			<div  class="page">
			 <br /> <br />
			 <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			 <a href="mycollect.php?type_=0&&page_=1&&row_sum_=<?php echo $row_sum_ ?>" class="font1">第一页</a><span>&nbsp;&nbsp;&nbsp;</span>
             <a href="mycollect.php?type_=1&&page_=<?php echo $page_?>&&row_sum_=<?php echo $row_sum_ ?>" class="font1">上一页</a><span>&nbsp;&nbsp;&nbsp;</span>
             <a href="mycollect.php?type_=2&&page_=<?php echo $page_?>&&row_sum_=<?php echo $row_sum_ ?>" class="font1">下一页</a>
			</div>

     
	<div class="footer">
	
	
	</div>
</body>
</html>