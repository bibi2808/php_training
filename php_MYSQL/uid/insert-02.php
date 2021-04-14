<?php

$connect = mysqli_connect('localhost','root','');

if(!$connect) die('Failed');

// INSERT
mysqli_select_db($connect, 'manage_user');

$arrData = array(
    array('name' => 'Admin 1', 'status' => 0, 'ordering' => 9),
    array('name' => 'Admin 2'),
    array('name' => 'Admin 3', 'ordering' => 91),
    array('id' => 200, 'name' => 'Member 123', 'status' => 1, 'ordering' => 0)
);

function createInsertSQL($data){
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

foreach($arrData as $value){
    $newQuery = createInsertSQL($value);
    $query = "INSERT INTO `group`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";
    mysqli_query($connect, $query);
    echo $query . '<br />';
}


mysqli_close($connect);