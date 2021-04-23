<?php
    class Auth {
        public static function checkLogin(){
            Session::init();
            if(!Session::get('loggedIn')){
                Session::destroy();
                header('location: index.php?controller=user&action=login');
                exit();
            }
        }
    }