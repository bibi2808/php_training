<?php

require_once 'Lion.class.php';

$arrInfor = array('name' => 'Lion A', 'color' => 'green', 'age' => '2');

$lionA = new Lion($arrInfor);

$lionA->showInfor();