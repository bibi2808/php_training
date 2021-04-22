<?php
class Bootstrap{
    public function __construct(){
        $controllerURL = (isset($_GET['controller'])) ? $_GET['controller'] : 'index';
        $actionURL = (isset($_GET['action'])) ? $_GET['action'] : 'index';

        $controllerName = ucfirst($controllerURL); // Login

        $file = CONTROLLER_PATH . $controllerURL . '.php';

        if(file_exists($file)){
            require_once $file;
            $controller = new $controllerName;

            if(method_exists($controller, $actionURL)){
                $controller->$actionURL();
                $controller->loadModel($controllerURL);
            }else{
                $this->error();
            }
        } else{
            $this->error();
           
        }
    }

    public function error(){
        require_once CONTROLLER_PATH . 'error.php';
        $error = new Errors();
        $error->index();
    }
}