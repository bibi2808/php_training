<?php
class Bootstrap
{
    private $_params;
    private $_controllerObject;

    public function init()
    {
        $this->setParam();
        $controllerName = isset($this->_params['controller']) ? $this->_params['controller'] : '';
        $moduleName = isset($this->_params['module']) ? $this->_params['module'] : '';

        $controllerName = ucfirst($controllerName) . 'Controller';
        $filePath = MODULE_PATH . $moduleName . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($filePath)) {
            $this->loadExisController($filePath, $controllerName);
            $this->callMethod();
        } else {
            URL::redirect('default', 'index', 'notice', array('type' => 'not-url'));
        }
    }

    // SET PARAMS
    public function setParam()
    {
        $this->_params     = array_merge($_GET, $_POST);
        $this->_params['module']         = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
        $this->_params['controller']     = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
        $this->_params['action']         = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
    }

    // CALL METHOD
    private function callMethod()
    {
        $actionName = $this->_params['action'] . 'Action';

        if (method_exists($this->_controllerObject, $actionName)) {
            $module = $this->_params['module'];
            $controller = $this->_params['controller'];
            $action = $this->_params['action'];
            $requestURL = "$module-$controller-$action";

            $userInfo = Session::get('user');
            $logged = (isset($userInfo['login']) && $userInfo['time'] + TIME_LOGIN >= time());
            if ($module == 'admin') {

                if ($logged == true) {
                    if ($userInfo['group_acp'] == 1) {
                        // phân quyền
                        // if(in_array($requestURL, $userInfo['info']['privilege_id']) == true){
                            $this->_controllerObject->$actionName();
                        // }else{
                        //     URL::redirect('default', 'index', 'notice', array('type' => 'not-permission'));
                        // }
                    } else {
                        URL::redirect('default', 'index', 'notice', array('type' => 'not-permission'));
                    }
                } else {
                    $this->callLoginAction($module);
                }
            } else if ($module == 'default') {
                // DEFAULT
                if ($controller == 'user') {
                    if ($logged == true) {
                        $this->_controllerObject->$actionName();
                    } else {
                        $this->callLoginAction($module);
                    }
                } else {
                    $this->_controllerObject->$actionName();
                }
            }
        } else {
            URL::redirect('default', 'index', 'notice', array('type' => 'not-url'));
        }
    }

    // LOAD EXISTING CONTROLLER
    private function loadExisController($filePath, $controllerName)
    {
        require_once $filePath;
        $this->_controllerObject = new $controllerName($this->_params);
    }

    // ERROR CONTROLLER
    public function _error()
    {
        require_once MODULE_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
        $this->_controllerObject = new ErrorController();
        $this->_controllerObject->setView('default');
        $this->_controllerObject->indexAction();
    }

    // CALL ACTION LOGIN
    public function callLoginAction($module = 'default')
    {
        Session::delete('user');
        require_once(MODULE_PATH . $module . DS . 'controllers' . DS . 'IndexController.php');
        $indexController = new IndexController($this->_params);
        $indexController->loginAction();
    }
}
