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
    
    public function addAction()
    {
        // echo '<h3>' . __METHOD__ . '</h3>';
        $this->_view->_title = 'User Manager: User Groups : ADD';
        $this->_view->render('group/add', true);
    }
}