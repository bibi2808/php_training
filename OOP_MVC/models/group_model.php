<?php
    class Group_Model extends Model{
        public function __construct()
        {
            parent::__construct();
            $this->setTable('group');
        }

        public function listItems($option = null){
            $query[]     = "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
            $query[]     = "FROM `user` AS `u` RIGHT JOIN  `group` AS `g` ON `g`.`id` = `u`.`group_id`";
            $query[]     = "GROUP BY `g`.`id`";
            $query = implode(" ", $query);

            $result = $this->listRecords($query);

            return $result;
        }

        public function deleteItem($id, $option = null){
            $id = array($id);
            $result = $this->delete($id);

            return $result;

            
        }
    }