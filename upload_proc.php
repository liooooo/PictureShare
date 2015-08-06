<?php
session_start();
include "photo_proc/photo_proc1.php";
include_once 'cnn/cnn.php';

$username = $_SESSION["login_name"];

$path="img/";               //图片处理前保存的路径
$path_p="img_p/";           //图片处理后保存的路径
/*判断文件是否成功上传，&_FILE['myfile']['error'] == 0 时表示成功*/

if($_FILES['myfile']['error'] > 0) {
    echo "上传错误: ";
    switch($_FILES['myfile']['error']) {
        case 1: die("上传文件大小超过了PHP配置文件中的约定值： upload_max_filesize");
        case 2: die("上传文件大小超过了表单中的约定值： MAX_FILE_SIZE");
        case 3: die("文件只被部分上传");
        case 4: die("没有上传任何文件");
        default: die("未知错误");
    }
}

//$_FILES文件上传后文件信息保存的变量数组
$filename=$_FILES['myfile']['name'];
$size=$_FILES['myfile']['size'];
$type=$_FILES['myfile']['type'];
$tmp_name=$_FILES['myfile']['tmp_name'];

//将路径图片名和图片序号保存到数据库的image表
$image_name = $filename;
$insert = "INSERT INTO image(image_name, uploader) VALUES ('$image_name', '$username')";
$result = mysql_query($insert);
if($result && mysql_affected_rows() > 0) {
    //echo "数据插入成功，最后一条记录的ID为：".mysql_insert_id()."<br/>";
} else {
    echo "数据插入失败，错误号： ".mysql_errno()."错误原因： ".mysql_error()."<br/>";
}


//图像处理
$cutimg = thumb($tmp_name, $filename);

move_uploaded_file($tmp_name, $path.$filename);              //保存原图
imagejpeg($cutimg, $path_p.$filename, 100);           //保存缩放和剪裁后图片

imagedestroy($cutimg);

echo "<script>alert('上传成功')</script>";
echo "<script>location.href='index.php';</script>"; // 跳转到首页

?>



        
    


    
  