<?php
class GroupModel extends Model
{
    private $_columns = array('id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
	private $_userInfo;
    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_GROUP);
    }

    public function listItem($arrParam, $option = null)
    {
        $query[] = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering` ";
        $query[] = "FROM `$this->table`";
        $query[] = "WHERE `id` > 0 ";

        // FILTER : KEYWORD
        if (!empty($arrParam['filter_search'])) {
            $keywork = '"%' . $arrParam['filter_search'] . '%"';
            $query[] = "AND `name` LIKE $keywork ";
        }

        // FILTER : STATUS
        if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
            $query[]    = "AND `status` = '" . $arrParam['filter_state'] . "'";
        }

        // FILTER : GROUP_ACP
        if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
            $query[]    = "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
        }

        // SORT
        if (!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])) {
            $column        = $arrParam['filter_column'];
            $columnDir    = $arrParam['filter_column_dir'];
            $query[]    = "ORDER BY `$column` $columnDir";
        } else {
            $query[]    = "ORDER BY `id` ASC";
        }

        // PAGINATION
        $pagination            = $arrParam['pagination'];
        $totalItemsPerPage    = $pagination['totalItemsPerPage'];
        if ($totalItemsPerPage > 0) {
            $position    = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
            $query[]    = "LIMIT $position, $totalItemsPerPage";
        }

        $query = implode(" ", $query);
        $result = $this->fetchAll($query);
        return $result;
    }

    // COUNT ITEMS
    public function countItem($arrParam, $option = null)
    {
        // echo '<h3>' . __METHOD__ . '</h3>';
        $query[] = "SELECT COUNT(`id`) AS `total`";
        $query[] = "FROM `$this->table`";
        $query[] = "WHERE `id` > 0 ";

        // FILTER : KEYWORD
        if (!empty($arrParam['filter_search'])) {
            $keywork = '"%' . $arrParam['filter_search'] . '%"';
            $query[] = "AND `name` LIKE $keywork ";
        }

        // FILTER : STATUS
        if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
            $query[]    = "AND `status` = '" . $arrParam['filter_state'] . "'";
        }

        // FILTER : GROUP_ACP
        if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
            $query[]    = "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
        }


        $query = implode(" ", $query);
        $result = $this->fetchRow($query);
        return $result['total'];
    }

    public function changeStatus($arrParam, $option = null)
    {
        if ($option['task'] == 'change-ajax-status') {
            $status         = ($arrParam['status'] == 0) ? 1 : 0;
            // $modified_by	= $this->_userInfo['username'];
            // $modified		= date('Y-m-d', time());
            $id        = $arrParam['id'];
            $query    = "UPDATE `$this->table` SET `status` = $status WHERE `id` = '" . $id . "'";
            $this->query($query);

            $result = array(
                'id'        => $id,
                'status'    => $status,
                'link'        => URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status))
            );
            return $result;
        }

        if ($option['task'] == 'change-ajax-group-acp') {
            $group_acp     = ($arrParam['group_acp'] == 0) ? 1 : 0;
            $id            = $arrParam['id'];
            $query        = "UPDATE `$this->table` SET `group_acp` = $group_acp  WHERE `id` = '" . $id . "'";
            $this->query($query);

            $result = array(
                'id'        => $id,
                'group_acp'    => $group_acp,
                'link'        => URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $group_acp))
            );
            return $result;
        }

        if ($option['task'] == 'change-status') {
            $status         = $arrParam['type'];
            $modified_by    = $this->_userInfo['username'];
            $modified        = date('Y-m-d', time());
            if (!empty($arrParam['cid'])) {
                $ids        = $this->createWhereDeleteSQL($arrParam['cid']);
                $query        = "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` IN ($ids)";
                $this->query($query);
                Session::set('message', array('class' => 'success', 'content' => 'Has ' . $this->affectedRows() . ' items changed status'));
            } else {
                Session::set('message', array('class' => 'error', 'content' => 'Please check the item want to change status!'));
            }
        }
    }

    public function deleteItem($arrParam, $option = null)
    {
        if ($option == null) {
            if (!empty($arrParam['cid'])) {
                $ids        = $this->createWhereDeleteSQL($arrParam['cid']);
                $query        = "DELETE FROM `$this->table` WHERE `id` IN ($ids)";
                $this->query($query);
                Session::set('message', array('class' => 'success', 'content' => 'Has ' . $this->affectedRows() . ' items deleted complete'));
            } else {
                Session::set('message', array('class' => 'error', 'content' => 'Please check item to delete!'));
            }
        }
    }

    public function ordering($arrParam, $option = null)
    {
        if ($option == null) {
            if (!empty($arrParam['order'])) {
                $i = 0;
                $modified_by    = $this->_userInfo['username'];
                $modified        = date('Y-m-d', time());
                foreach ($arrParam['order'] as $id => $ordering) {
                    $i++;
                    $query    = "UPDATE `$this->table` SET `ordering` = $ordering, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` = '" . $id . "'";
                    $this->query($query);
                }
                Session::set('message', array('class' => 'success', 'content' => 'C?? ' . $i . ' ph???n t??? ???????c thay ?????i  ordering!'));
            }
        }
    }

    public function saveItem($arrParam, $option = null)
    {
        $userObj = Session::get('user');
        $userInfo = $userObj['info'];

        if($option['task'] == 'add'){
			$arrParam['form']['created']	= date('Y-m-d', time());
			$arrParam['form']['created_by']	= $userInfo['username'];
            $data	= array_intersect_key($arrParam['form'], array_flip($this->_columns));            
			$this->insert($data);
			Session::set('message', array('class' => 'success', 'content' => 'Success!'));
			return $this->lastID();
		}
		if($option['task'] == 'edit'){
            $arrParam['form']['modified']	= date('Y-m-d', time());
            $arrParam['form']['modified_by']= $userInfo['username'];
			// $arrParam['form']['modified_by']= $this->_userInfo['username'];
			$data	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$this->update($data, array(array('id', $arrParam['form']['id'])));
			Session::set('message', array('class' => 'success', 'content' => 'Success!'));
			return $arrParam['form']['id'];
		}
    }

    public function inforItem($arrParam, $option = null){
        if($option == null){
			$query[]	= "SELECT `id`, `name`, `group_acp`, `status`, `ordering`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `id` = '" . $arrParam['id'] . "'";
			$query		= implode(" ", $query);
			$result		= $this->fetchRow($query);
			return $result;
		}
    }
}
