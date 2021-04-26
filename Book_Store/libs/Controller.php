<?php

class Controller
{
    protected $_view;
    protected $_model;
    protected $_arrParam;
 
    public function loadModel($moduleName, $modelName)
    {
        $modelName = ucfirst($modelName) . 'Model';
        $path = APPLICATION_PATH . $moduleName . DS . 'models' . DS . $modelName . '.php';
        // echo '<br />';
        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $modelName();
        }
    }

    public function setView($moduleName)
    {
        $this->_view = new View($moduleName);
    }

    public function setParams($arrParam){
        $this->_arrParam = $arrParam;
    }
}
