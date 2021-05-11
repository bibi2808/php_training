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

    // ACTION: REGISTER
    public function registerAction()
    {

        $userInfo = Session::get('user');
        if (isset($userInfo['login']) && $userInfo['time'] + TIME_LOGIN >= time()) {
            // logged
            URL::redirect('default', 'user', 'index');
        }     

        
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
        }
        $this->_view->arrParam = $this->_arrParam;
        $this->_view->render('index/register');
    }

    public function loginAction()
    {
        $userInfo = Session::get('user');
        if (isset($userInfo['login']) && $userInfo['time'] + TIME_LOGIN >= time()) {
            // logged
            URL::redirect('default', 'user', 'index');
        }      
        
        if (isset($this->_arrParam['form']['token']) > 0) {
            $validate = new Validate($this->_arrParam['form']);

            $email = $this->_arrParam['form']['email'];
            $password = md5($this->_arrParam['form']['password']);

            $query = "SELECT `id` FROM `user` WHERE `email` = '$email' AND `password` = '$password'";

            $validate->addRule('email', 'existRecord', array('database' => $this->_model, 'query' => $query));

            $validate->run();

            if ($validate->isValid()) {
                $infoUser = $this->_model->infoItem($this->_arrParam);
                $arrSession = array(
                                    'login' => true,
                                    'info' => $infoUser,
                                    'time' => time(),
                                    'group_acp' => $infoUser['group_acp']
                );
                
                Session::set('user', $arrSession);
                URL::redirect('default', 'user', 'index');
            } else {
                $this->_view->errors = $validate->showErrorsPublic();
            }
        }
        
        $this->_view->_title = "Login";
        $this->_view->render('index/login');
    }

    public function logoutAction()
    {
        // echo '<h3>' . __METHOD__ . '</h3>';
        // $this->_view->_title('Logout');
        Session::delete('user');
        URL::redirect('default', 'index', 'index');
    }
}