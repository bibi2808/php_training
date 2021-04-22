<?php
    // ============================= PATHS ==================================== 
    define("DS"             , DIRECTORY_SEPARATOR);
    define('ROOT_PATH'      , dirname(__FILE__)); // định nghĩa path to thư mục gốc
    define('LIBRARY_PATH'   , ROOT_PATH . DS . 'libs' . DS); // định nghĩa đường dẫn đến thư mực libs
    define('CONTROLLER_PATH', ROOT_PATH . DS . 'controllers' . DS); // định nghĩa đường dẫn đến thư mực controllers
    define('MODEL_PATH'     , ROOT_PATH . DS . 'models' . DS); // định nghĩa đường dẫn đến thư mực models
    define('VIEW_PATH'      , ROOT_PATH . DS . 'views' . DS); // định nghĩa đường dẫn đến thư mực views
    define('PUBLIC_PATH'    , ROOT_PATH . DS . 'public' . DS); // định nghĩa đường dẫn đến thư mực public

    define('ROOT_URL'       , 'OOP_MVC');
    define('PUBLIC_URL', ROOT_URL . DS . 'public' .DS);
    // ============================= DATABASE ====================================
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'manage_user');
    