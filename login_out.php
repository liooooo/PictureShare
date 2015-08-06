<?php 
session_start();
if(isset($_SESSION['login_name'])) {
    if($_SESSION['login_name'] == "admin") {
      unset($_SESSION["login_name"]);
      echo "<script>location.href='login.php'</script>"; // 管理员退出后回到登陆页面
    } else {
        unset($_SESSION["login_name"]);      
      echo "<script>history.back();</script>"; // 跳转到首页
    }
}   
echo "<script>history.back();</script>"; // 跳转到首页

?>