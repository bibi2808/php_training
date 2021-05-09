<?php
class UserController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('admin/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }


    // ACTION: LIST USER
    public function indexAction()
    {
        $this->_view->_title = 'User Manager: User';
        $totalItems = $this->_model->countItem($this->_arrParam, null);

        $configPagination = array('totalItemsPerPage'	=> 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $this->_view->pagination = new Pagination($totalItems, $this->_pagination);

        $this->_view->slbGroup = $this->_model->itemInSelectbox($this->_arrParam, null);
        $this->_view->Items = $this->_model->listItem($this->_arrParam, null);
        $this->_view->render('user/index');
    }

    // ACTION: AJAX STATUS (*)
    public function ajaxStatusAction()
    {
        $result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
        echo json_encode($result);
    }
    
    // ACTION: STATUS (*)
    public function statusAction()
    {
        $this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
        URL::redirect('admin', 'user', 'index');
    }

    // ACTION: TRASH (*)
	public function trashAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', 'user', 'index');
	}
    
    public function orderingAction()
    {
        $this->_model->ordering($this->_arrParam);
        URL::redirect('admin', 'user', 'index');
    }

    public function formAction(){
        $this->_view->_title = 'ADD FORM';
        $this->_view->slbGroup = $this->_model->itemInSelectbox($this->_arrParam, null);
        if(isset($this->_arrParam['id'])){
            
            $this->_view->_title = 'EDIT FORM';
            $this->_arrParam['form'] = $this->_model->inforItem($this->_arrParam);
            if(empty($this->_arrParam['form'])) URL::redirect('admin', 'user', 'index');
        }

        // check after click save
        if((isset($this->_arrParam['form']['token']) ? $this->_arrParam['form']['token'] : '') > 0){
            $task	= 'add';
            $requiredPass = true;
            $queryUsername = "SELECT `id` FROM `user` WHERE `username` = '".$this->_arrParam['form']['username']."'"; 
            $queryEmail = "SELECT `id` FROM `user` WHERE `email` = '".$this->_arrParam['form']['email']."'"; 
            if(isset($this->_arrParam['form']['id'])){
                $task = 'edit';
                $queryUsername .= " AND `id` <> '" . $this->_arrParam['form']['id']."'";
                $queryEmail .= " AND `id` <> '" . $this->_arrParam['form']['id']."'";
                $requiredPass = false;
            }
            
            $validate = new Validate($this->_arrParam['form']);
            $validate   ->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUsername, 'min' => 1, 'max' => 100))
                        ->addRule('email', 'email-notExistRecord',array('database' => $this->_model, 'query' => $queryEmail))
                        ->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
                        ->addRule('password', 'password', array('action' => $task), )
                        ->addRule('status','status', array('deny' => array('default')))
                        ->addRule('group_id', 'status', array('deny' => array('default')));

            $validate->run();
            $this->_arrParam['form'] = $validate->getResult();

            if($validate->isValid() == false){
                $this->_view->errors = $validate->showErrors();
            } else{
                // save data
                
                $id	= $this->_model->saveItem($this->_arrParam, array('task' => $task));
                
				if($this->_arrParam['type'] == 'save-close') 	URL::redirect('admin', 'user', 'index');
				if($this->_arrParam['type'] == 'save-new') 		URL::redirect('admin', 'user', 'form');
				if($this->_arrParam['type'] == 'save') 			URL::redirect('admin', 'user', 'form', array('id' => $id));
            }
        }
        
        $this->_view->arrParam = $this->_arrParam;
        $this->_view->render('user/form');
    }
}
