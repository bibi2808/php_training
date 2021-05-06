<?php

class Controller
{
    // VIEW object
    protected $_view;

    // MODEL object
    protected $_model;

    // Template object
    protected $_arrParam;

    // Params ( GET - POST)
    protected $_templateObj;

    public function __construct($arrParams)
    {
        // echo __METHOD__;
        $this->setModel($arrParams['module'], $arrParams['controller']);
        $this->setTemplate($this);
        $this->setView($arrParams['module']);
        $this->setParams($arrParams);
        $this->_view->arrParams = $arrParams;
    }
 
    // SET MODEL
    public function setModel($moduleName, $modelName)
    {
        $modelName = ucfirst($modelName) . 'Model';
        $path = MODULE_PATH . $moduleName . DS . 'models' . DS . $modelName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $modelName();
        }
    }

    // GET MODEL
    public function getModel()
    {
        return $this->_model;
    }

    // SET VIEW
    public function setView($moduleName)
    {
        $this->_view = new View($moduleName);
    }

    // GET VIEW
    public function getView()
    {
        return $this->_view;
    }

    // SET　TEMPLATE
    public function setTemplate()
    {
        $this->_templateObj = new Template($this);
    }

    // GET　TEMPLATE
    public function getTemplate()
    {
        return $this->_templateObj;
    }

    // SET PARAMS
    public function setParams($arrParam)
    {
        $this->_arrParam = $arrParam;
    }

    // GET PARAMS
    public function getParams()
    {
        return $this->_arrParam;
    }
}