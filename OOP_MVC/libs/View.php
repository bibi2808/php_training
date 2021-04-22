<?php
    class View{
        // public function __construct()
        // {
        //     echo __METHOD__. '<br/>';
        // }

        public function render($name){
            // echo './views/' . $name . '.php';
            include VIEW_PATH . 'header.php';
            require_once VIEW_PATH . $name . '.php';
            include VIEW_PATH . 'footer.php';
        }
    }