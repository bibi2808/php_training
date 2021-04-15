<?php
    require_once 'class/database.class.php';
    $params = array(
        'server' =>  'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'manage_user',
        'table' => 'online'
    );
    
    $database = new Database($params);
//     echo '<pre>';
// print_r($_SERVER);
// echo '<pre />';
    

    $ip = $_SERVER['REMOTE_ADDR'];
    $url = $_SERVER['PHP_SELF'];
    //  Tìm kiếm user trong online

    $query[] = "SELECT id ";
    $query[] = "FROM `online`";
    $query[] = "WHERE `ip` = '" .$ip . "'";
    $query[] = "AND `url` = '" .$url . "'";
    $query = implode(" ", $query);

    $flagExist = $database->isExist($query);

    // // INSERT AND UPDATE
    $arrData = array('ip' => $ip, 'url' => $url, 'time' => time());
    // if($flagExist){
    //     // update
    //     $where = array(
    //                     array('ip', $ip, 'AND'),
    //                     array('url', $url)
    //             );
    //     $database->update($arrData, $where);
    // } else {
    //     // insert
    //     $database->insert($arrData);
    // }

    // DELETE: timeDB + 10*60 < timeNow;
    // $time = time();
    // $checkQuery = "DELETE FROM `online` WHERE `time` + 1*60 < $time";
    // echo $database->query($checkQuery);

    // SELECT
    $selectQuery = "SELECT * FROM `online` WHERE `url` = '" . $url . "'";
    $list = $database->listRecords($selectQuery);
    echo '<pre>';
    print_r($list);
    echo '<pre />';
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>User online</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">User online</div>
        <div id="form">
        <?php

        ?>

        </div>
    </div>
</body>
</html>