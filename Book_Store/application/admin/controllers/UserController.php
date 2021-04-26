<?php
class UserController extends Controller{
    public function loginAction(){
        // echo __METHOD__;
        $this->_view->render('user/login');
    }
}