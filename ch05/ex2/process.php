<?php
require_once 'upload.class.php';
$upload = new Upload('file-upload');

$upload->setFileExtension(array('7z','png','jpg'));
$upload->setFileSize(102400,5242880);
$upload->setUploadDir('./images/');

if($upload->isValid() == false){
    $upload->upload(true);
} else{
    $upload->showError();
}