<?php
class IndexController extends Controller{

    public function indexAction(){
        echo '<h3>' . __METHOD__ . '</h3>';
    }

    public function addAction(){
        echo __METHOD__;
        $this->_view->render('index/index');
    }
}