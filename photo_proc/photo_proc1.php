<?php
function thumb($file, $filename) {
    /* 获取原图像的宽度和高度*/
    list($width_orig,$height_orig) = getimagesize($file);
    
    /*目标宽度和大小*/
    $width = 240; $height = 210; $height_tmp = 0; $width_tmp = 0;
    if(($width / $width_orig) >= ($height / $height_orig)) {
        $height_tmp = ($width/$width_orig)*$height_orig;  //缩放比例
        
        $image_p = imagecreatetruecolor($width, $height_tmp); //创建新的图像资源
        $image = imagecreatefromjpeg($file);              //获取原图的图像资源
        
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height_tmp, $width_orig, $height_orig); //缩放处理
       
        $cutimg = imagecreatetruecolor($width, $height);
        imagecopy ($cutimg, $image_p, 0, 0, 0, ($height_tmp - $height)/2, $width, $height_tmp);
        
    } else {
        $width_tmp = ($height/$height_orig)*$width_orig;  //缩放比例
        
        $image_p = imagecreatetruecolor($width_tmp, $height); //创建新的图像资源
        $image = imagecreatefromjpeg($file);              //获取原图的图像资源
        
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_tmp, $height, $width_orig, $height_orig); //缩放处理
        
        /* 裁剪 */
        $cutimg = imagecreatetruecolor($width, $height);
        //该函数不适合剪裁 剪裁后的图像与原图的宽高比例相同imagecopyresampled($cutimg, $image_p, 0, 0, ($width_tmp - $width)/2, 0 , $width, $height, $width_tmp, $height);
        imagecopy ($cutimg, $image_p, 0, 0, ($width_tmp - $width)/2, 0, $width_tmp, $height);
    }
    
    imagedestroy($image_p);
    imagedestroy($image);
    
    return $cutimg;
}
?>
