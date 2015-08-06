<?php
@$link = mysql_connect("localhost", "root", "123456");
if (! $link) {
    die("数据库连接失败" . mysql_error());
}
mysql_select_db("pictureshare");
?>
