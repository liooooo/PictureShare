<?php
session_start();

include_once 'cnn/cnn.php';

if(isset($_SESSION["login_name"])) {
    $username = $_SESSION["login_name"];
    $pic = $_GET["pic"];
    $db = "db".$username;          //���ڱ����û��ղ�ͼƬ��Ϣ�����ݱ�
    $query = "INSERT INTO $db(image_name) VALUES('$pic')";
    mysql_query($query);
    echo "<script>history.back();</script>";
} else {
    echo "<script>alert('ע�������ղ�Ŷ');history.back();</script>";
}

?>