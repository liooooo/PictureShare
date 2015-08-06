<?php
session_start();

include_once 'cnn/cnn.php';

if(!isset($_SESSION["login_name"]) ) {
    echo "<script>alert('无法访问');location.href='login.php';</script>";
}

$db = "db".$_SESSION['login_name'];
$image_name = $_GET['image_name'];
$query_delete = "delete  from $db where image_name = '$image_name'";
$result = mysql_query($query_delete);

if($result) {
    echo "<script>alert('删除成功 ！');location.href='Picturelist.php';</script>";
} else {
    echo "<script>alert('删除失败 ！');location.href='Picturelist.php';</script>";
}
?>