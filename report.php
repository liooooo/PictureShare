<?php
include_once 'cnn/cnn.php';

    $pic = $_GET["pic"];
    $db = "report";         
    $query = "INSERT INTO $db(image_name) VALUES('$pic')";
    mysql_query($query);

?>
