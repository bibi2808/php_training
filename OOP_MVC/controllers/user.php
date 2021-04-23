<?php
class User extends Controller
{
    public function __construct()
        {
            parent::__construct();
            Session::init();
        }

    public function login()
    {

        if(Session::get('loggedIn')){
            $this->redirect('group','index');
        }
        // After submit
        if (isset($_POST['submit'])) {
            $source = array('username' => $_POST['username']);
            // $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $validate = new Validate($source);

            $validate->addRule('username', 'existRecord', array('database' => $this->db, 'query' => "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'"));
            $validate->run();
            if ($validate->isValid() == true) {
                // LOGIN SUCCESS
                Session::set('loggedIn', true);
                $this->redirect('group','index');
            } else {
                $this->view->errors = $validate->showErrors();
                echo 'failed';
            }
        }
        $this->view->render('user/login');
    }

    public function logout(){
        $this->view->render('user/logout');
        Session::destroy();
    }
}
