<?php
session_start();

include_once 'cnn/cnn.php';

if(isset($_SESSION["login_name"])) {
    $username = $_SESSION["login_name"];
    $pic = $_GET["pic"];
    $db = "db".$username;          //用于保存用户收藏图片信息的数据表
    $query = "INSERT INTO $db(image_name) VALUES('$pic')";
    mysql_query($query);
    echo "<script>history.back();</script>";
} else {
    echo "<script>alert('注册后才能收藏哦');history.back();</script>";
}

?>