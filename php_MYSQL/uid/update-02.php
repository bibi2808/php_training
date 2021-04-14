<?php

$connect = mysqli_connect('localhost','root','');

if(!$connect) die('Failed');

// INSERT
mysqli_select_db($connect, 'manage_user');

$arrData = array('status' => 0, 'ordering' => 1222);


function createUpdateSQL($data){
    $newQuery = '';
    if(!empty($data)){
        foreach($data as $key => $value){
            $newQuery .= ", `$key` = '$value'";
        }
    }

    $newQuery = substr($newQuery, 2);
    return $newQuery;
    
}
$newQuery = createUpdateSQL($arrData);
$query = "UPDATE `group` SET " .$newQuery ." Where `id` = 206";

echo mysqli_query($connect, $query);

mysqli_close($connect);