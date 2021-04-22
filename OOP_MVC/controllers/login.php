<?php
    class Login extends Controller{
        public function index(){
            $this->view->render('login/index');
            
            if(isset($_POST['submit'])){
                echo 'run';
            }
        }
    }