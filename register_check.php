<?php
session_start();
include_once ('cnn/cnn.php');
$username = $_POST['text1'];

$query = "select * from usermanage where username = '$username'";
$result1 = mysql_query($query);
$rs = mysql_fetch_array($result1);
if($rs==NULL)
{
	$msg = 0;
} else {
	$msg = 1;
}
echo $msg;
?>