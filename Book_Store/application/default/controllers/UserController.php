<?php
class UserController extends Controller{
    public function indexAction(){
        $this->loadModel('admin','index');
        $this->_view->data = 'PHP';
        $this->_view->render('user/index');
    }

    public function addAction(){
        echo __METHOD__;
    }
}