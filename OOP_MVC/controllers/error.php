<?php
    class Errors extends Controller{

        public function index(){
            $this->view->msg = '<p>this is an error</p>';
            $this->view->render('error/index');
        }
    }