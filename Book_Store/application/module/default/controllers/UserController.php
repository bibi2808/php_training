<?php
class UserController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('default/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }


    // ACTION: LIST USER
    public function registerAction()
    {
        $this->_view->_title = 'User Manager: User';
        $this->_view->render('user/register');
    }

    
}
