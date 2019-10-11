<?php

namespace App\Models;

use App\Library\Database;

class Model
{
    private $db;

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

    public function countData($query)
    {
        $this->db->countData($query);
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
