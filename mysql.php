<?php
@$link = mysql_connect("localhost", "root", "root-wamp");
if (! $link) {
    die("数据库连接失败" . mysql_error());
}
$creat_db = "create database photoshare";
$re = mysql_query($creat_db);
if(!$re) echo "失败1";

$re2 = mysql_select_db("photoshare");
if(!$re2) echo "失败2";

$creat_table1 = "create table image(id int(8),image_name varchar(50))";
$re3 = mysql_query($creat_table1);
if(!$re3) echo "失败3";

$creat_table2 = "create table usermanage(username varchar(20), passwd varchar(20), mail varchar(30))";
mysql_query($creat_table2);

mysql_close($link);

?>