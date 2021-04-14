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
$data = array('status' => 0, 'ordering' => 1222);

$where = array(
    array('id',200,'AND'),
    array('status',99)
);
$database->update($data, $where);