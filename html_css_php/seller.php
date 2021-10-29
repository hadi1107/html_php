<?php

if(!empty($_FILES['myfile']['name'])){

$fileinfo = $_FILES['myfile'];

if($fileinfo['size'] < 1000000 && $fileinfo['size'] > 0){

   move_uploaded_file($fileinfo['tmp_name'],$fileinfo['name']);

   echo '上传成功';

}else{

   echo '文件太大或未知';

}
}
?>