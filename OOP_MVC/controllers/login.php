<?php
    class Login extends Controller{
        public function index(){
            $this->view->render('login/index');
            echo '<pre>';
            print_r($_POST);
            echo '<pre />';
            
            // if(isset($_POST['submit'])){
            //     echo 'run';
            // }
        }
    }