<?php
class IndexController extends Controller{

    public function indexAction(){
    }

    public function addAction(){
        echo __METHOD__;
        $this->_view->render('index/index');
    }
}