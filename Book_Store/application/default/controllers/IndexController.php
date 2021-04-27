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
        echo '<h3>' . __METHOD__ . '</h3>';
        // $this->setModel('admin','index');
        // $this->_model->listItems();
        // $this->_view->data = 'PHP';
        // $this->_view->render('user/index');
    }

    // public function addAction(){
    //     echo __METHOD__;
    // }

    // public function loginAction()
    // {
    //     // echo '<h3>' . __METHOD__ . '</h3>';
    //     $this->_view->setTitle('Login');
    //     $this->_view->render('user/login', true);
    // }
}