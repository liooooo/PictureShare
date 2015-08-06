 <?php 
 session_start();
 ?>
<html>
<head>
	<title>picture share</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<script type="text/javascript" src="./js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="./js/jquery.fancybox.js"></script>	
	<link rel="stylesheet" type="text/css" href="./js/jquery.fancybox.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});
		});
	</script>

<style type="text/css">


body {
	background: #D9D9D9;
}

.header {
	margin: 0 auto;
	width: 956px;
	height: 100px;
	background:#666666;
}

.content {
	margin: 0 auto;
	width: 956px;
	position：absolute;
}

.footer {
	height: 30px;
	clear: left;
}

.left {
	width: 65%;
	height: 2060px;
	background-color: white;
	float: left;
}

.right {
	width: 35%;
	height: 2060px;
	float: right;
}

.box1 {
	width: 240px;
	height: 210px;
	margin: 15px 30px;
	background: red;
	float: left;
	position:relative;
}

.box2 {
	width: 240px;
	height: 210px;
	margin: 15px 30px;
	background: blue;
	float: right;
	position:relative;
}

.font1 {
	color: #FF69B4;
}

.page {
	float: left;
}

.box1 a.now,.box1 a.report,.box1 div.wrap{
    display:none;
	text-decoration:none;
	text-align:center;
}
.box1:hover {
    cursor:pointer;
}
.box1:hover a.now{
    cursor:pointer; 
	position:absolute; 
	top:180px; 
	left:0; 	
    width:204px; 
	height:36px; 
    z-index:100; 
	display:block;
}
.box1:hover div.wrap{
    z-index:10; 
	display:block;
	position:absolute; 
	bottom:0px;
	left:0px;
	color:#FFF;
	width:240px; 
	height:36px; 
	line-height:36px; 
	background:#000;
	filter:alpha(opacity=60);
	opacity: 0.5;
}

.box1:hover a.report{
    cursor:pointer; 
	position:absolute; 
	top:180px; 
	left:204; 	
    width:36px; 
	height:36px; 
    z-index:100; 
	display:block;
}


.box2 a.now,.box2 a.report,.box2 div.wrap{
    display:none;
	text-decoration:none;
	text-align:center;
}
.box2:hover {
    cursor:pointer;
}
.box2:hover a.now{
    cursor:pointer; 
	position:absolute; 
	top:180px;
    left:0; 	
	width:204px; 
	height:36px; 
    z-index:100;
	display:block;
}
.box2:hover div.wrap{
    z-index:10; 
	display:block;
	position:absolute; 
	bottom:0px;
	left:0px;
	color:#FFF;
	width:240px; 
	height:36px; 
	line-height:36px; 
	background:#000;
	filter:alpha(opacity=60);
	opacity: 0.5;
}

.box2:hover a.report{
    cursor:pointer; 
	position:absolute; 
	top:180px; 
	left:204; 	
    width:36px; 
	height:36px; 
    z-index:100; 
	display:block;
}


input,button
{
	font-family:"Arial","Tahoma","微软雅黑","雅黑";
	border:0px;
	vertical-align:middle;
	margin:8px;
	line-height:18px;	
	font-size:18px;
}
.btn1
{
	background:url("./background/ok.gif") no-repeat 8px center;
	background-color:#f9f9f9;
}
.btn2
{
	background:url("./background/delete.gif") no-repeat 8px center;
	background-color:#f9f9f9;
}
.btn3
{
	background:url("./background/reset.gif") no-repeat 8px center;
	background-color:#f9f9f9;
}
.btn6
{
	width:143px;
	height:35px;
	line-height:14px;
	font-size:14px;
	background:url("./background/bg3.jpg") no-repeat left top;
	color:#959595;
	padding:0px 0px 2px 14px;	
}
.pbtn2
{
	width:145px;
	height:37px;
	background:url("./background/bg7.jpg") no-repeat left top;
	text-indent:0px;
	padding-bottom:4px;
}
.pbtn1
{	
	border:solid 2px #dcdcdc;
	padding:4px 14px 4px 34px;
	color:#959595;
}




</style>
</head>
<body>
        <?php 
       include_once 'cnn/cnn.php';
       
       if (!isset($_GET['page'])) {
           $page = 1;
           
           //获取数据库中记录的条数，即图片的数量
           $query_sum = "select count(*) from image";
           $result = mysql_query($query_sum);
           $row_sum = mysql_result($result,0);
            
           $pages_num = (int)($row_sum / 16);         //一页16张，查看有多少页
           
           for($i = 0; $i < 16; $i++) {
               $row = $row_sum - $i - 1;
               $query =  "select image_name from image limit $row, 1";
               $img_arr[$i] = mysql_query($query);
           }
           
       }  
       
        else {
            $type = $_GET['type'];
            $page = $_GET['page'];
            $row_sum = $_GET['row_sum'];
            $row = 0;

            switch ($type) {
                case 0:                                              // 返回第一页
                    $page = 1;
                     
                    //获取数据库中记录的条数，即图片的数量
                    $query_sum = "select count(*) from image";
                    $result = mysql_query($query_sum);
                    $row_sum = mysql_result($result,0);
                    
                    $i = 0;
                    for($i; $i < 16; $i++) {
                        $row = $row_sum - $i - 1;
                        $query =  "select image_name from image limit $row, 1";
                        $img_arr[$i] = mysql_query($query);
                    }
                    break;
                    
                case 1:                                                // 上一页
                    $page = $page - 1;
                    if($page > 0) {                                   //不是第一页是可以选择上一页
                        $row = $row_sum - ($page - 1) * 16 - 1; 
                    } else {
                         $row = $row_sum - 1;                              //已经是第一页时维持不变                       
                         $page = $page + 1;
                    }
                       $i = 0; $row++;
                       for($i; $i < 16; $i++) {
                          $row = $row - 1;
                          $query =  "select image_name from image limit $row, 1";
                          $img_arr[$i] = mysql_query($query);
                       }
                    break;
                 
                case 2:                                              // 下一页
                    $page = $page + 1;
                    $pages_num = (int)($row_sum/16);         //一页16张，查看有多少页
                    if($page <= $pages_num) {
                        $row = $row_sum - ($page - 1) * 16 - 1;      //不是最后一页是可以选择下一页
                    } else {                                 
                        $row = $row_sum - ($pages_num - 1) * 16 - 1;  //已经是最后一页是维持不变
                        $page = $page - 1;
                    }
                   
                    $i = 0; $row++;
                    for($i; $i < 16; $i++) {
                        $row = $row - 1;
                        $query =  "select image_name from image limit $row, 1";
                        $img_arr[$i] = mysql_query($query);
                    }
         
                    break;
                     
              }
         }
       
         for($i = 0; $i < 16; $i++) {
             $display_row[$i]  = mysql_fetch_row($img_arr[$i]);
         }
          
         $path_p = "./img_p/";
         $path = "./img/";
     ?>
	<div class="header">
		 <img src="./background/head.jpg" width="955" height="100">
	</div>
	<div class="content">

		<div class="left">
			<p>最新分享照片</p> 
			<div class="box1">
				<a id="a0" class="fancybox" href="<?php echo $path.implode($display_row[0]);?>" data-fancybox-group="gallery" title="图片1">
				<img src= "<?php echo $path_p.implode($display_row[0]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect0">收藏</a>
				<a href="javascript:void(0);" class="report" id="report0">
			    <img alt="举报" src="./background/report.png">
			    </a>				

	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect0").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[0]);?>");
		           request.send();
	             }

	             document.getElementById("report0").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[0]);?>");
	               request.send();
		         }	             
	           </script>			    				
				
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[1]);?>" data-fancybox-group="gallery" title="图片2">
				<img src="<?php echo $path_p.implode($display_row[1]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect1">收藏</a>
				<a href="javascript:void(0);" class="report" id="report1">
			    <img alt="举报" src="./background/report.png">
			    </a>

	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect1").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[1]);?>");
		           request.send();
	             }

	             document.getElementById("report1").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[1]);?>");
	               request.send();
		         }	             
	           </script>			    
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[2]);?>" data-fancybox-group="gallery" title="图片3">
				<img src="<?php echo $path_p.implode($display_row[2]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect2">收藏</a>
				<a href="javascript:void(0);" class="report" id="report2">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect2").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[2]);?>");
		           request.send();
	             }

	             document.getElementById("report2").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[2]);?>");
	               request.send();
		         }	             
	           </script>			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[3]);?>" data-fancybox-group="gallery" title="图片4">
				<img src="<?php echo $path_p.implode($display_row[3]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect3">收藏</a>
				<a href="javascript:void(0);" class="report" id="report3">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect3").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[3]);?>");
		           request.send();
	             }

	             document.getElementById("report3").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[3]);?>");
	               request.send();
		         }	             
	           </script>			    			 
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[4]);?>" data-fancybox-group="gallery" title="图片5">
				<img src="<?php echo $path_p.implode($display_row[4]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect4">收藏</a>
				<a href="javascript:void(0);" class="report" id="report4">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect4").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[4]);?>");
		           request.send();
	             }

	             document.getElementById("report4").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[4]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[5]);?>" data-fancybox-group="gallery" title="图片6">
				<img src="<?php echo $path_p.implode($display_row[5]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect5">收藏</a>
				<a href="javascript:void(0);" class="report" id="report5">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect5").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[5]);?>");
		           request.send();
	             }

	             document.getElementById("report5").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[5]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[6]);?>" data-fancybox-group="gallery" title="图片7">
				<img src="<?php echo $path_p.implode($display_row[6]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect6">收藏</a>
				<a href="javascript:void(0);" class="report" id="report6">
			    <img alt="举报" src="./background/report.png">
			    </a>
			   
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect6").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[6]);?>");
		           request.send();
	             }

	             document.getElementById("report6").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[6]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[7]);?>" data-fancybox-group="gallery" title="图片8">
				<img src="<?php echo $path_p.implode($display_row[7]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect7">收藏</a>
				<a href="javascript:void(0);" class="report" id="report7">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect7").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[7]);?>");
		           request.send();
	             }

	             document.getElementById("report7").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[7]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[8]);?>" data-fancybox-group="gallery" title="图片9">
				<img src="<?php echo $path_p.implode($display_row[8]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect8">收藏</a>
				<a href="javascript:void(0);" class="report" id="report8">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect8").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[8]);?>");
		           request.send();
	             }

	             document.getElementById("report8").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[8]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[9]);?>" data-fancybox-group="gallery" title="图片10">
				<img src="<?php echo $path_p.implode($display_row[9]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect9">收藏</a>
				<a href="javascript:void(0);" class="report" id="report9">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect9").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[9]);?>");
		           request.send();
	             }

	             document.getElementById("report9").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[9]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[10]);?>" data-fancybox-group="gallery" title="图片11">
				<img src="<?php echo $path_p.implode($display_row[10]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect10">收藏</a>
				<a href="javascript:void(0);" class="report" id="report10">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect10").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[10]);?>");
		           request.send();
	             }

	             document.getElementById("report10").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[10]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[11]);?>" data-fancybox-group="gallery" title="图片12">
				<img src="<?php echo $path_p.implode($display_row[11]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect11">收藏</a>
				<a href="javascript:void(0);" class="report" id="report11">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect11").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[11]);?>");
		           request.send();
	             }

	             document.getElementById("report11").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[11]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[12]);?>" data-fancybox-group="gallery" title="图片13">
				<img src="<?php echo $path_p.implode($display_row[12]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect12">收藏</a>
				<a href="javascript:void(0);" class="report" id="report12">
			    <img alt="举报" src="./background/report.png">
			    </a>
		
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect12").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[12]);?>");
		           request.send();
	             }

	             document.getElementById("report12").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[12]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[13]);?>" data-fancybox-group="gallery" title="图片14">
				<img src="<?php echo $path_p.implode($display_row[13]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect13">收藏</a>
				<a href="javascript:void(0);" class="report" id="report13">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect13").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[13]);?>");
		           request.send();
	             }

	             document.getElementById("report13").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[13]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box1">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[14]);?>" data-fancybox-group="gallery" title="图片15">
				<img src="<?php echo $path_p.implode($display_row[14]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect14">收藏</a>
				<a href="javascript:void(0);" class="report" id="report14">
			    <img alt="举报" src="./background/report.png">
			    </a>
			
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect14").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[14]);?>");
		           request.send();
	             }

	             document.getElementById("report14").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[14]);?>");
	               request.send();
		         }	             
	           </script>			    			    
			</div>
			
			<div class="box2">
			    <a class="fancybox" href="<?php echo $path.implode($display_row[15]);?>" data-fancybox-group="gallery" title="图片16">
				<img src="<?php echo $path_p.implode($display_row[15]);?>"></a>
				<div class = "wrap"></div>
				<a href="javascript:void(0);" class="now" id="collect15">收藏</a>
				<a href="javascript:void(0);" class="report" id="report15">
			    <img alt="举报" src="./background/report.png">
			    </a>
			    
	           <script>                                                          // AJAX 监听收藏和举报
	             document.getElementById("collect15").onclick=function(){
		           var request = new XMLHttpRequest();
		           request.open("GET","collect.php?pic=<?php echo implode($display_row[15]);?>");
		           request.send();
	             }

	             document.getElementById("report15").onclick=function(){
			       var request = new XMLHttpRequest();
			       request.open("GET","report.php?pic=<?php echo implode($display_row[15]);?>");
	               request.send();
		         }	             
	           </script>			    			 
			</div>
			
			<div  class="page">
			 <br /> <br />
			 <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			 <a href="index.php?type=0&&page=1&&row_sum=<?php echo $row_sum ?>" class="font1">第一页</a><span>&nbsp;&nbsp;&nbsp;</span>
             <a href="index.php?type=1&&page=<?php echo $page?>&&row_sum=<?php echo $row_sum ?>" class="font1">上一页</a><span>&nbsp;&nbsp;&nbsp;</span>
             <a href="index.php?type=2&&page=<?php echo $page?>&&row_sum=<?php echo $row_sum ?>" class="font1">下一页</a>
			</div>
			
		</div>

		<div class="right">
		    <?php if( isset($_SESSION["login_name"]) ) { 
		        if($_SESSION["login_name"] == "admin") {
		            echo "<script>location.href='admin_index.php';</script>";
		        }
		    ?>
		         <!-- 登入后的用户状态信息 -->
		          <br />
			      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			      <p>&nbsp;&nbsp;&nbsp;欢迎您  <?php echo $_SESSION["login_name"];?>&nbsp;&nbsp;&nbsp
			      <button type="button" class="pbtn2 btn8"><img src="./background/favorite.gif" alt="favorite" onClick="location.href='mycollect.php'"/></button>
			      <input type="button" value="loginout" onMouseOver="this.style.borderColor='#f76b00'" onMouseOut="this.style.borderColor='#dcdcdc'"  class="btn2 pbtn1" onClick="location.href='login_out.php'"/><br />
			      <input type="button" value="Change" onMouseOver="this.style.borderColor='#86c6f7'" onMouseOut="this.style.borderColor='#dcdcdc'" class="btn3 pbtn1" onClick="location.href='ChangePassword.php'"/><br />
			      </p>
			      
			      <!-- 上传文件功能 -->
			      <form action='upload_proc.php?<?php echo $_SESSION['login_name']?>' method='post' enctype='multipart/form-data'>
			      <input type="file" value="Add picture" name="myfile" /><br />
			      <input type="submit" value="Upload" onMouseOver="this.style.borderColor='#75cd02'" onMouseOut="this.style.borderColor='#dcdcdc'" class="btn1 pbtn1" />
			      
			      </form>
		    <?php } else {?>
		          <!-- 用户未登录时 -->
			      <br /> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		          <a href="login.php" class="font1">登陆</a> <span>&nbsp;&nbsp;&nbsp;</span>
		          <a href="register.php" class="font1">注册</a>
		    <?php } ?>

		</div>
	</div>
     
	<div class="footer">
	
	</div>
</body>
</html>
