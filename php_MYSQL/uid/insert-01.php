<?php

$connect = mysqli_connect('localhost','root','');

if(!$connect) die('Failed');

// INSERT
mysqli_select_db($connect, 'manage_user');

$arrData = array('name' => 'Member 123', 'status' => 1, 'ordering' => 9);

function createInsertSQL($data){
    // print_r($data);
    $newQuery = array();
    $cols = '';
    $vals = '';
    if(!empty($data)){
        foreach($data as $key=> $value){
            $cols .= ", `$key`";
            $vals .= ", '$value'";
        }
    }
    $newQuery['cols'] = substr($cols,2);
    $newQuery['vals'] = substr($vals,2);
    return $newQuery;
}

$newQuery = createInsertSQL($arrData);

$query = "INSERT INTO `group`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";

$result = mysqli_query($connect, $query);

if($result){
    echo $total = mysqli_affected_rows($connect);
} else{
    echo mysqli_error($connect);
}

mysqli_close($connect);