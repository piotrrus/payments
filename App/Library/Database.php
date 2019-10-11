<?php

namespace App\Library;

use App\Library\DbBase;

class Database extends DbBase
{

    public function getData(string $sql)
    {
        parent::query($sql);
        return parent::resultset();
    }

    public function getDataSingle(string $sql)
    {
        parent::query($sql);
        return parent::single();
    }

    public function countRows(string $sql)
    {
        parent::query($sql);
        parent::execute();
        return parent::rowCount();
    }

}
