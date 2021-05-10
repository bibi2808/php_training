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
        }
    }

    // SET PARAMS
    public function setParam()
    {
        $this->_params 	= array_merge($_GET, $_POST);
		$this->_params['module'] 		= isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
		$this->_params['controller'] 	= isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
		$this->_params['action'] 		= isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
        
    }

    // CALL METHOD
    private function callMethod()
    {
        $actionName = $this->_params['action'] . 'Action';

        if (method_exists($this->_controllerObject, $actionName)) {
            $this->_controllerObject->$actionName();

            
            $module = $this->_params['module'];
            $controller = $this->_params['controller'];
            $action = $this->_params['action'];

            $userInfo = Session::get('user');

            $logged = ($userInfo['login'] && $userInfo['time'] + TIME_LOGIN >= time());

            $pageLogin = ($controller == 'index') && ($action == 'login');

            if($module == 'admin'){
                // ADMIN
                if($logged == true){
                    echo '<pre>';
                    print_r($_SESSION['user']['group_acp']);
                    echo '<pre />';
                    // check quyền truy cập
                    if($_SESSION['user']['group_acp'] == 1){
                        
                        if($pageLogin ==  true) URL::redirect('admin', 'index', 'index');
                        if($pageLogin == false) $this->_controllerObject->$actionName();
                        
                    } else{
                        URL::redirect('default', 'index', 'notice', array('type' => 'not-permission'));
                    }
                } else{
                    Session::delete('user');
                    
                    // khi load to loginPage
                    if($pageLogin == true) $this->_controllerObject->$actionName();

                    // khi chưa login thì redirect to loginPage
                    if($pageLogin == false) URL::redirect('admin', 'index', 'login');
                }

            } else if($module == 'default'){
                // DEFAULT
                $this->_controllerObject->$actionName();
            }
        } else {
            $this->_error();
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
}
