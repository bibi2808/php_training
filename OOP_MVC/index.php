<?php
    require_once 'define.php';

    spl_autoload_register(function ($class_name) {
        $path = LIBRARY_PATH;
        require_once $path . "{$class_name}.php";
    });
    $boostrap = new Bootstrap();