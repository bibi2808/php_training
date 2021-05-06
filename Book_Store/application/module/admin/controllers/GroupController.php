<?php
class GroupController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('admin/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    // ACTION: LIST GROUP
    public function indexAction()
    {
        $this->_view->_title = 'User Manager: User Groups';
        $totalItems = $this->_model->countItem($this->_arrParam, null);
        $configPagination = array('totalItemsPerPage'	=> 3, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $this->_view->pagination = new Pagination($totalItems, $this->_pagination);
        $this->_view->Items = $this->_model->listItem($this->_arrParam, null);
        
        $this->_view->render('group/index');
    }

    // ACTION: AJAX STATUS (*)
    public function ajaxStatusAction()
    {
        $result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
        echo json_encode($result);
    }

    // ACTION: AJAX GROUP ACP (*)
    public function ajaxACPAction()
    {
        $result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-group-acp'));
        echo json_encode($result);
    }
    
    // ACTION: STATUS (*)
    public function statusAction()
    {
        $this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
        URL::redirect('admin', 'group', 'index');
    }

    // ACTION: TRASH (*)
	public function trashAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', 'group', 'index');
	}
    
    public function orderingAction()
    {
        
        $this->_model->ordering($this->_arrParam);
        URL::redirect('admin', 'group', 'index');
    }
}