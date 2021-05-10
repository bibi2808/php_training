<?php
class IndexController extends Controller{

    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('default/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function indexAction(){
        $this->_view->render('index/index');
    }

    public function noticeAction(){
        $this->_view->render('index/notice');
    }

    public function categoryAction(){
        $this->_view->render('index/category');
    }

    

    // public function loginAction()
    // {
    //     // echo '<h3>' . __METHOD__ . '</h3>';
    //     $this->_view->setTitle('Login');
    //     $this->_view->render('user/login', true);
    // }
}