<?php
@$link = mysql_connect("localhost", "root", "123456");
if (! $link) {
    die("���ݿ�����ʧ��" . mysql_error());
}
mysql_select_db("pictureshare");
?>
