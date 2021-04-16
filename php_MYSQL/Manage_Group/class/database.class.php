<?php

class Database
{
    protected $connect;
    protected $database;
    protected $table;
    protected $resultQuery;

    public function __construct($params)
    {
        $link = mysqli_connect($params['server'], $params['username'], $params['password']);
        if (!$link) {
            die('Failed');
        } else {
            $this->connect = $link;
            $this->database = $params['database'];
            $this->table = $params['table'];
            $this->setDatabase();
            $this->query("SET NAMES 'utf8'");
            $this->query("SET CHARACTER SET 'utf8'");
        }
    }

    public function setConnect($connect)
    {
        $this->connect = $connect;
    }

    public function setDatabase($database = null)
    {
        if ($database != null) {
            $this->database = $database;
        }
        mysqli_select_db($this->connect, $this->database);
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function __destruct()
    {
        mysqli_close($this->connect);
    }

    // INSERT
    public function insert($data, $type = 'single')
    {
        // INSERT 1 ROW
        if ($type == 'single') {
            $newQuery = $this->createInsertSQL($data);
            $query = "INSERT INTO `$this->table`(" . $newQuery['cols'] . ") VALUES (" . $newQuery['vals'] . ")";
            $this->query($query);
        } else {
            // INSERT MANY ROWS
            foreach ($data as $value) {
                $newQuery = $this->createInsertSQL($value);
                $query = "INSERT INTO `$this->table`(" . $newQuery['cols'] . ") VALUES (" . $newQuery['vals'] . ")";
                $this->query($query);
            }
        }

        // Trả về id của data vừa mới add vào table
        return $this->lastID();
    }

    // create INSERT ONE ROW
    public function createInsertSQL($data)
    {
        $newQuery = array();
        $cols = '';
        $vals = '';
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $cols .= ", `$key`";
                $vals .= ", '$value'";
            }
        }
        $newQuery['cols'] = substr($cols, 2);
        $newQuery['vals'] = substr($vals, 2);
        return $newQuery;
    }

    // LAST ID
    public function lastID()
    {
        return mysqli_insert_id($this->connect);
    }

    // QUERY
    public function query($query)
    {
        $this->resultQuery = mysqli_query($this->connect, $query);
        return $this->resultQuery;
    }

    public function update($data, $where)
    {
        $newSet     = $this->createUpdateSQL($data);
        $newWhere     = $this->createWhereUpdateSQL($where);
        $query = "UPDATE `$this->table` SET " . $newSet . " WHERE $newWhere";
        $this->query($query);
        return $this->affectedRows();
    }

    // CREATE UPDATE SQL
    public function createUpdateSQL($data)
    {
        $newQuery = "";
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $newQuery .= ", `$key` = '$value'";
            }
        }
        $newQuery = substr($newQuery, 2);
        return $newQuery;
    }

    // CREATE WHERE UPDATE SQL
    public function createWhereUpdateSQL($data)
    {
        $newWhere = array();
        if (!empty($data)) {
            foreach ($data as $value) {
                $newWhere[] = "`$value[0]` = '$value[1]'";
                if(isset($value[2]))
                    $newWhere[] = $value[2];
            }
            $newWhere = implode(" ", $newWhere);
        }
        return $newWhere;
    }

    public function affectedRows()
    {
        return mysqli_affected_rows($this->connect);
    }

    // DELETE
    public function delete($where)
    {
        $newWhere   = $this->createWhereDeleteSQL($where);
        $query      = "DELETE FROM `$this->table` WHERE `id` IN ($newWhere)";
        $this->query($query);
        return $this->affectedRows();
    }

    // CREATE WHERE DELETE SQL
    public function createWhereDeleteSQL($data)
    {
        $newWhere = '';
        if (!empty($data)) {
            foreach ($data as $id) {
                $newWhere .= "'" . $id . "', ";
            }
            $newWhere .= "'0'";
        }
        return $newWhere;
    }

    // LIST RECORDS
    public function listRecords($query)
    {
        $result = array();
        if (!empty($query)) {
            $resultQuery = $this->query($query);
            if (mysqli_num_rows($resultQuery) > 1) {
                while ($row = mysqli_fetch_assoc($this->resultQuery)) {
                    $result[] = $row;
                }
            }
        }
        //  giair phong bo nho
        mysqli_free_result($resultQuery);
        return $result;
    }

    // SINGLE RECORD
    public function singleRecord($query)
    {
        $result = array();
        if (!empty($query)) {
            $resultQuery = $this->query($query);
            if (mysqli_num_rows($resultQuery) > 0) {
                $result = mysqli_fetch_assoc($resultQuery);
            }
             //  giai phong bo nho
            mysqli_free_result($resultQuery);
        }
        return $result;
    }

    // EXITS
    public function isExist($query)
    {
        if ($query != null) {
            $this->resultQuery =$this->query($query);
        }
        if (mysqli_num_rows($this->resultQuery) > 0) return true;
        return false;
    }
}
