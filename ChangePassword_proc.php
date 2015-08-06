<?php
session_start();

include_once 'cnn/cnn.php';

if(!isset($_SESSION["login_name"]) ) {
    echo "<script>alert('无法访问');location.href='login.php';</script>";
}


$username =$_SESSION["login_name"];
$passwd = $_POST['OldPassword'];
$email = $_POST['E-mail'];
$newpasswd = $_POST['NewPassword'];
$newpasswd_ = $_POST['NewPassword_'];

if ($newpasswd != $newpasswd_) 
    echo "<script>alter('密码不一致');history.back();</script>";
    
$query_ = "select * from usermanage where username = '".$username."' and passwd = '".$passwd."'";
$result_ = mysql_query($query_);
$rs_=mysql_fetch_array($result_);
if (! $rs_) {
    echo "<script>alert('旧密码不正确！');history.back();</script>";
    exit();
} else {                                                // 用户名和密码都正确
    $query_ = "UPDATE usermanage SET passwd = '$newpasswd' WHERE username = '$username'";
    $result_ = mysql_query($query_);
    echo "<script>alert('修改成功！');location.href='index.php';</script>";// 跳转到首页
}

?>