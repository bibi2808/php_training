<?php

$connect = mysqli_connect('localhost','root', '');

if(!$connect) die('FAILED');

// DELETE
mysqli_select_db($connect,'manage_user');

// QUERRY
$query = "DELETE INTO `group`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";