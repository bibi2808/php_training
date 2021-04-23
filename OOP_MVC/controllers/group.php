<?php
    class Group extends Controller{

        public function __construct()
        {
            parent::__construct();
            Auth::checkLogin();
        }
        
        public function index(){
            $this->view->items = $this->db->listItems();
            $this->view->js = array('group/js/index.js');
            $this->view->css = array('group/css/style.css');
            $this->view->render('group/index');
            

           
        }

        public function delete(){
            if(isset($_POST['id'])){
                $this->db->deleteItem($_POST['id']);
            }
        }
    } 