<?php
session_start();
include_once ('cnn/cnn.php');

$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username == "admin") {
    
    $query_ = "select * from usermanage where username = '".$username."' and passwd = '".$passwd."'";
    $result_ = mysql_query($query_);
    $rs_=mysql_fetch_array($result_);
    if (! $rs_) {
        echo "<script>alert('用户名或密码不正确！');history.back();</script>";
        exit();
    } else {                                                // 用户名和密码都正确
        $_SESSION["login_name"] = $username;
        echo "<script>location.href='admin_index.php';</script>"; // 跳转到首页
    }
}

$query = "select * from usermanage where username = '".$username."'";
$result = mysql_query($query);
$rs=mysql_fetch_array($result);
if (!$rs) {
    echo "<script>alert('用户名不存在！');history.back();</script>";
    exit();
}

$query_ = "select * from usermanage where username = '".$username."' and passwd = '".$passwd."'";
$result_ = mysql_query($query_);
$rs_=mysql_fetch_array($result_);
if (! $rs_) {
    echo "<script>alert('用户名或密码不正确！');history.back();</script>";
    exit();
} else {                                                // 用户名和密码都正确
    $_SESSION["login_name"] = $username;
    echo "<script>location.href='index.php';</script>"; // 跳转到首页
}



?>
