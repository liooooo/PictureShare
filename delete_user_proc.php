<?php
session_start();

include_once 'cnn/cnn.php';

if(isset($_SESSION["login_name"]) && $_SESSION["login_name"] == "admin") {
    $username = $_SESSION["login_name"];

} else {
    echo "<script>alert('非管理员无法访问');location.href='login.php';</script>";
}

$username_to_delete = $_GET['username_to_delete'];

$query_delete = "delete  from usermanage where username = '$username_to_delete'";
$result = mysql_query($query_delete);

if($result) {
    echo "<script>alert('删除成功 ！');location.href='Usermanage.php';</script>";
} else {
    echo "<script>alert('删除失败 ！');location.href='Usermanage.php';</script>";
}
?>