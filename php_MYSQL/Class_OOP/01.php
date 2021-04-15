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

// INSERT 1 ROW
// $arrData = array('name' => 'Member 1234', 'status' => 0, 'ordering' => 9);
// echo $lastID = $database->insert($arrData);


// INSERT MANY ROWS
// $arrData = array(
//     array('name'=>'Admin 1', 'status' => 0, 'ordering' => 9),
//     array('name'=>'Admin 2'),
//     array('name'=>'Admin 3', 'ordering' => 9),
//     array('id' => 200, 'name'=>'Admin 4', 'ordering' => 99, 'status' => 0)
// );
// echo $lastID = $database->insert($arrData, 'multy');


// UPDATE
// $data     = array('status' => 1, 'ordering' => 995, 'name' => 'BIBIBBI');
// $where = array(
//     array('status', 0, 'and'),
//     array('ordering', 0),
// );
// echo $database->update($data, $where);

// DELETE
// $ids = array(200,215);
// echo $database->delete($ids);

// $query ="SELECT * FROM `group` ORDER BY `ordering` ASC";

// 1
// $query[] = "SELECT * ";
// $query[] = "FROM `group`";
// $query[] = "ORDER BY `ordering` DESC";

// 2
$query[]     = "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
$query[]     = "FROM `user` AS `u` RIGHT JOIN  `group` AS `g` ON `g`.`id` = `u`.`group_id`";
// $query[] 	= "WHERE `g`.`id` > 300";
$query[]     = "GROUP BY `g`.`id`";
$query = implode(" ", $query);
$database->query($query);
$list = $database->listRecords();
echo '<pre>';
print_r($list);
echo '<pre />';
