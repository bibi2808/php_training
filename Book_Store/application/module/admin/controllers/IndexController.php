<?php
class IndexController extends Controller
{

    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        // $this->_templateObj->setFolderTemplate('admin/main/');
        // $this->_templateObj->setFileTemplate('index.php');
        // $this->_templateObj->setFileConfig('template.ini');
        // $this->_templateObj->load();
    }

    public function loginAction()
    {
        $this->_templateObj->setFolderTemplate('admin/main/');
        $this->_templateObj->setFileTemplate('login.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
        
        if(isset($this->_arrParam['form']['token']) > 0){

            $validate = new Validate($this->_arrParam['form']);

            $username = $this->_arrParam['form']['username'];
            $password = md5($this->_arrParam['form']['password']);

            $query = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";

            $validate->addRule('username','existRecord', array('database' => $this->_model, 'query' => $query));

            $validate->run();

            if($validate->isValid()){
                $infoUser = $this->_model->infoItem($this->_arrParam);
                $arrSession = array(
                                    'login' => true,
                                    'info' => $infoUser,
                                    'time' => time(),
                                    'group_acp' => $infoUser['group_acp']
                );
                
                Session::set('user', $arrSession);
                URL::redirect('admin', 'index', 'index');
            } else{
                $this->_view->errors = $validate->showErrors();
            }
        }
        
        $this->_view->_title = "Login";
        $this->_view->render('index/login');
    }

    public function indexAction()
    {
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '<pre />';
        $this->_templateObj->setFolderTemplate('admin/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
        
        $this->_view->_title = "Index";
        $this->_view->render('index/index');
    }

    public function logoutAction(){
        Session::delete('user');
        URL::redirect('admin', 'index', 'login');
    }
}
