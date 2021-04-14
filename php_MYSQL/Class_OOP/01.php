<?php

require_once 'database.class.php';

$params = array(
    'server' =>  'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'manage_user',
    'table' => 'group'
);

$database = new Database($params);

$arrData = array(
    array('name' => 'Admin 1', 'status' => 0, 'ordering' => 9),
    array('name' => 'Admin 2'),
    array('name' => 'Admin 3', 'ordering' => 91),
    array('id' => 200, 'name' => 'Member 123', 'status' => 1, 'ordering' => 0)
);


echo $lastID = $database->insert($arrData, 'multi');
