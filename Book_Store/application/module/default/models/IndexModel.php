<?php
class IndexModel extends Model
{
    private $_columns = array(
                                'id',
                                'username',
                                'email',
                                'password', 
                                'fullname', 
                                'created', 
                                'created_by', 
                                'modified', 
                                'modified_by', 
                                'register_date',
                                'register_ip', 
                                'status', 
                                'ordering',
                                'group_id');
    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_USER);
    }

    public function saveItem($arrParam, $option = null)
    {
        if ($option['task'] == 'user-register') {
            $arrParam['form']['password']    = md5($arrParam['form']['password']);
            $arrParam['form']['register_date']    = date('Y-m-d H:m:s', time());
            $arrParam['form']['register_ip']    = $_SERVER['REMOTE_ADDR'];

            // Sau khi đăng ký thì admin sẽ active or active bằng email
            $arrParam['form']['status']    = 0;

            $data    = array_intersect_key($arrParam['form'], array_flip($this->_columns));
            $this->insert($data);
            // Session::set('message', array('class' => 'success', 'content' => 'Success!'));
            return $this->lastID();
        }
        
    }

    public function infoItem($arrParam, $option = null){
        if($option == null){
            $email = $arrParam['form']['email'];
            $password = md5($arrParam['form']['password']);
            $query[] = "SELECT `u`.`id`, `u`.`fullname`, `u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`  ";
            $query[] = "FROM `user` AS `u` LEFT JOIN `group` AS `g` ON `u`.`group_id` = `g`.`id` ";
            $query[] = "WHERE `email` = '$email' AND `password` = '$password'";

            $query = implode(" ", $query);
            $result = $this->fetchRow($query);
            return $result;
        }
    }
}
