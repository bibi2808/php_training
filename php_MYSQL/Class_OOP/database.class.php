<?php

class Database {
    protected $connect;
    protected $database;
    protected $table;

    public function __construct($params)
    {
        $link = mysqli_connect($params['server'], $params['username'], $params['password']);
        if(!$link){
            die('Failed');
        } else{
            $this->connect = $link;
            $this->database = $params['database'];
            $this->table = $params['table'];
            $this->setDatabase();
        }

    }

    public function setConnect($connect){
        $this->connect = $connect;
    }

    public function setDatabase($database = null){
        if($database != null){
            $this->database = $database;
        }
        mysqli_select_db($this->connect,$this->database);
    }

    public function setTable($table){
        $this->table = $table;
    }

    public function __destruct(){
        mysqli_close($this->connect);
    }

    // INSERT
    public function insert($data, $type = 'single'){
        // INSERT 1 ROW
        if($type == 'single'){
            $newQuery = $this->createInsertSQL($data);
            $query = "INSERT INTO `$this->table`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";
            $this->query($query);
        } else {
            // INSERT MANY ROWS
            foreach($data as $value){
                $newQuery = $this->createInsertSQL($value);
                $query = "INSERT INTO `$this->table`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";
                $this->query($query);
            }
        }

        // Trả về id của data vừa mới add vào table
        return $this->lastID();
    }

    // create INSERT ONE ROW
    private function createInsertSQL($data){
        $newQuery = array();
        $cols = '';
        $vals = '';
        if(!empty($data)){
            foreach($data as $key=> $value){
                $cols .= ", `$key`";
                $vals .= ", '$value'";
            }
        }
        $newQuery['cols'] = substr($cols,2);
        $newQuery['vals'] = substr($vals,2);
        return $newQuery;
    }

    // LAST ID
    private function lastID(){
        return mysqli_insert_id($this->connect);
    }

    // QUERY
    private function query($query){
        mysqli_query($this->connect,$query);
    }
}