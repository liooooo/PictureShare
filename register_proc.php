<?php
session_start();
include_once ('cnn/cnn.php');

$username = $_POST['text1'];
$passwd = $_POST['text2'];
$mail = $_POST['text4'];

$query = "select * from usermanage where username = '$username'";
$result1 = mysql_query($query);
$rs = mysql_fetch_array($result1);
if($rs==NULL)
{
    $insert = "INSERT INTO usermanage(username, passwd, mail) VALUES('$username', '$passwd', '$mail')";
    //数据库的插入操作 函数mysql_query返回true 或者  false
    $result2 = mysql_query($insert);
    if ($result2) {
    
        //创建个人数据库表，以用户名命名，只有两个字段 mycollect_image
        $db = "db".$username;      //防止用户只以数字组合作为用户名时无法创建个人数据表
        $creat_table = "CREATE TABLE $db(image_name varchar(50))";
        $re = mysql_query($creat_table);
        
        if(!$re) echo "<script>alter('个人数据库创建失败！');history.back();</script>";
        
        //在数据库中插入初始化的图片名
        $insert_img = "INSERT INTO $db(image_name) VALUES('add-picture_318-9233.jpg')";
        for($i = 0; $i < 12; $i++) {
          $re = mysql_query($insert_img);
          if(!$re) echo "插入失败！";
        }
        
        //建立触发器    让用户数据库和主数据库同步  (意思是告诉mysql语句的结尾换成以#结束)
        $query_trigger = " delimiter #                 
        create trigger tg1
        after delete on image
        for each row
        begin
        delete $db  where image_name = old.image_name;(注意这边的变化)
        end#
        ";
        mysql_query($insert_img);
        
        echo "<script>alert('注册成功 ！');location.href='login.php';</script>";
        
    } else {
        echo "<script>alert('注册失败 ！');history.back();</script>";
    }
 
} else {
   
       echo "<script>alert('用户名已存在！');history.back();</script>";
}

?>
