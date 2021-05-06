<?php
class GroupModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_GROUP);
    }

    public function listItem($arrParam, $option = null)
    {
//         echo '<pre>';
// print_r($arrParam);
// echo '<pre />';
        $query[] = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering` ";
        $query[] = "FROM `$this->table`";
        // SORT
		if(!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])){
			$column		= $arrParam['filter_column'];
			$columnDir	= $arrParam['filter_column_dir'];
			$query[]	= "ORDER BY `$column` $columnDir";
		}else{
			$query[]	= "ORDER BY `id` ASC";
		}  
        $query = implode(" ", $query);
        $result = $this->listRecord($query);
        return $result;
    }

    public function changeStatus($arrParam, $option = null)
    {
        if ($option['task'] == 'change-ajax-status') {
            $status 		= ($arrParam['status'] == 0) ? 1 : 0;
            $modified_by	= $this->_userInfo['username'];
            $modified		= date('Y-m-d', time());
            $id		= $arrParam['id'];
            $query	= "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` = '" . $id . "'";
            $this->query($query);
            
            $result = array(
                                'id'		=> $id,
                                'status'	=> $status,
                                'link'		=> URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status))
                        );
            return $result;
        }
        
        if ($option['task'] == 'change-ajax-group-acp') {
            $group_acp 	= ($arrParam['group_acp'] == 0) ? 1 : 0;
            $modified_by	= $this->_userInfo['username'];
            $modified		= date('Y-m-d', time());
            $id			= $arrParam['id'];
            $query		= "UPDATE `$this->table` SET `group_acp` = $group_acp, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` = '" . $id . "'";
            $this->query($query);
            
            $result = array(
                    'id'		=> $id,
                    'group_acp'	=> $group_acp,
                    'link'		=> URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $group_acp))
            );
            return $result;
        }
        
        if ($option['task'] == 'change-status') {
            $status 		= $arrParam['type'];
            $modified_by	= $this->_userInfo['username'];
            $modified		= date('Y-m-d', time());
            if (!empty($arrParam['cid'])) {
                $ids		= $this->createWhereDeleteSQL($arrParam['cid']);
                $query		= "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` IN ($ids)";
                $this->query($query);
                // Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows(). ' phần tử được thay đổi trạng thái!'));
            } else {
                // Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn thay đổi trạng thái!'));
            }
        }
    }

    public function deleteItem($arrParam, $option = null){
		if($option == null){
			if(!empty($arrParam['cid'])){
				$ids		= $this->createWhereDeleteSQL($arrParam['cid']);
				$query		= "DELETE FROM `$this->table` WHERE `id` IN ($ids)";
				$this->query($query);
				// Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows(). ' phần tử được xóa!'));
			}else{
				// Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn xóa!'));
			}
		}
	}
}