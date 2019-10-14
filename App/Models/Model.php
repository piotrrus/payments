<?php

namespace App\Models;

use App\Library\Database;

abstract class Model
{

    private $db;

    abstract public function all();

    abstract public function search(int $id);

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getData($query)
    {
        return $this->db->getData($query);
    }

    public function getDataSingle($query)
    {
        return $this->db->getDataSingle($query);
    }

    public function countRows($query)
    {
        $this->db->countRows($query);
    }

    public function updateArr($arr)
    {
        $this->db->insert_arr($arr);
    }

    public function executeSql($sql)
    {
        $this->db->query($sql);
        $this->db->execute();
    }

}
