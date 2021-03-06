<?php
    // ============================= PATHS ====================================
    define("DS", '/');
    define('ROOT_PATH', dirname(__FILE__)); // root path
    define('LIBRARY_PATH', ROOT_PATH . DS . 'libs' . DS); //  libs
    define('LIBRARY_EXT_PATH', LIBRARY_PATH . 'extends' . DS); //  libs/extends
    define('PUBLIC_PATH', ROOT_PATH . DS . 'public' . DS); //  public
    define('UPLOAD_PATH', PUBLIC_PATH . 'files' . DS); //  upload
    define('SCRIPT_PATH', PUBLIC_PATH . 'scripts' . DS); //  scripts
    define('APPLICATION_PATH', ROOT_PATH . DS . 'application' . DS); //  application
    define('MODULE_PATH', APPLICATION_PATH . 'module' . DS);	 //  module
    define('BLOCK_PATH', APPLICATION_PATH . 'block' . DS);	 //  block
    define('TEMPLATE_PATH', PUBLIC_PATH . 'template' . DS); //  template


    define('ROOT_URL', DS . 'Book_Store' . DS);
    define('APPLICATION_URL', ROOT_URL . 'application' . DS);
    define('PUBLIC_URL', ROOT_URL . DS . 'public' .DS);
    define('TEMPLATE_URL', PUBLIC_URL . 'template' .DS);

    define('DEFAULT_MODULE', 'default');
    define('DEFAULT_CONTROLLER', 'index');
    define('DEFAULT_ACTION', 'index');
    
    // ============================= DATABASE ====================================
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'bookstore');
    define('DB_TABLE', 'group');
    // ============================= DATABASE TABLE NAME====================================
    define('TBL_GROUP', 'group');
    define('TBL_USER', 'user');
    define('TBL_PRIVILEGE', 'privilege');
    define('TBL_CATEGORY', 'category');
    // ============================= CONFIG====================================
    define('TIME_LOGIN', 3600);