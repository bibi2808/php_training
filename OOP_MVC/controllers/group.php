<?php
    class Group extends Controller{
        
        public function index(){
            $this->view->render('group/index');
            require_once 'models/group_model.php';
            $model = new Group_Model();
        }
    } 