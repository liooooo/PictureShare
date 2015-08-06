<?php
session_start();

include_once 'cnn/cnn.php';

if(isset($_SESSION["login_name"]) && $_SESSION["login_name"] == "admin") {
    $username = $_SESSION["login_name"];

} else {
    echo "<script>alert('非管理员无法访问');location.href='login.php';</script>";
}

$image_name = $_GET['image_name'];
$query_delete = "delete  from image where image_name = '$image_name'";
$result = mysql_query($query_delete);
$result2 = @unlink ("./img/".$image_name);
$result3 = @unlink ("./img_p/".$image_name); 

if($result) {
    echo "<script>alert('删除成功 ！');location.href='Picturemanage.php';</script>";
} else {
    echo "<script>alert('删除失败 ！');location.href='Picturemanage.php';</script>";
}

$query_delete = "delete  from report where image_name = '$image_name'";
$result = mysql_query($query_delete);
?>