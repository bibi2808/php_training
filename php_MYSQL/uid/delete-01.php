<?php

$connect = mysqli_connect('localhost','root','');

if(!$connect) die('Failed');

// UPDATE
mysqli_select_db($connect, 'manage_user');

$query = "DELETE FROM `group` WHERE `id` = '206'";

$result = mysqli_query($connect, $query);

if($result){
    echo $total = mysqli_affected_rows($connect);
} else{
    echo mysqli_error($connect);
}

mysqli_close($connect);