<?php
    class Index extends Controller{
        public function index(){ 
            $this->view->render('index/index');
        }
    }