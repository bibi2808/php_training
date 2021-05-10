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


    // ACTION: REGISTER
    public function registerAction()
    {
        if (isset($this->_arrParam['form']['submit'])) {
            
            URL::checkRefresh($this->_arrParam['form']['token'], 'default', 'user', 'register');

            $queryUsername = "SELECT `id` FROM `user` WHERE `username` = '" . $this->_arrParam['form']['username'] . "'";
            $queryEmail = "SELECT `id` FROM `user` WHERE `email` = '" . $this->_arrParam['form']['email'] . "'";
           

            $validate = new Validate($this->_arrParam['form']);
            $validate->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUsername, 'min' => 1, 'max' => 100))
                ->addRule('email', 'email-notExistRecord', array('database' => $this->_model, 'query' => $queryEmail))
                ->addRule('password', 'password', array('action' => 'add'));

            $validate->run();
            
            // push to form kết quả validate
            $this->_arrParam['form'] = $validate->getResult();

            // kiểm tra nếu validate có errors -> views errors
            if ($validate->isValid() == false) {
                // nếu validate is false -> display errors
                $this->_view->errors = $validate->showErrorsPublic();
            } else {
                // validate thành công -> save data

                $this->_model->saveItem($this->_arrParam, array('task' => 'user-register'));
                URL::redirect('default', 'index', 'notice', array('type'=>'register-success'));
            }


            // echo '<pre>';
            // print_r($_SERVER);
            // echo '<pre />';
        }
        $this->_view->arrParam = $this->_arrParam;
        $this->_view->render('user/register');
    }

    // MY ACCOUNT
    public function myaccountAction(){
        $this->_view->render('user/myaccount');
    }

    // MY LOGIN
    public function loginAction(){
        $this->_view->render('user/login');
    }
}
