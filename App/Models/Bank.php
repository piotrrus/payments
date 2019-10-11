<?php

namespace App\Models;

class Bank extends Model
{

    public function all()
    {
        $query = "SELECT id, name"
                . " FROM banks"
                . " ORDER BY name";
        return $this->getData($query);
    }

    public function allWithCurrency()
    {
        $query = "SELECT b.id, b.name, c.name as currency"
                . " FROM banks as b"
                . " LEFT JOIN currency c ON b.currency_id = c.id"
                . " ORDER BY name";
        return $this->getData($query);
    }

    public function allWithFilesTypes()
    {
        $query = "SELECT b.id as bank_id, b.name as bank, "
                . "f.name as file_type, bft.id as bank_file_type_id"
                . " FROM bank_files_types as bft"
                . " LEFT JOIN banks b ON bft.bank_id = b.id"
                . " LEFT JOIN files_types f ON bft.file_type_id = f.id"
                . " ORDER BY bank";
        return $this->getData($query);
    }

    public function search(int $id)
    {
        $query = "SELECT id, name"
                . " FROM banks"
                . " WHERE id =" . $id
                . " ORDER BY name";
        return $this->getDataSingle($query);
    }

    public function getBankDataByFileTypeId(int $fileTypeId)
    {
//        $query = "SELECT b.id as bank_id, b.name as bank, f.name as file_type,"
//                . " bft.id as bank_file_type_id, c.name as currency"
//                . " FROM bank_files_types as bft"
//                . " LEFT JOIN banks b ON bft.bank_id = b.id"
//                . " LEFT JOIN currency c ON b.currency_id = c.id"
//                . " LEFT JOIN files_types f ON bft.file_type_id = f.id";
        $query =  $this->getBankDataByFileTypeQuery();        
        $query  .= " WHERE bft.id=" . $fileTypeId;
        return $this->getDataSingle($query);
    }

    public function checkIfDataExist($data)
    {

//        $query = "SELECT b.id as bank_id, b.name as bank, f.name as file_type,"
//                . " bft.id as bank_file_type_id, c.name as currency"
//                . " FROM bank_files_types as bft"
//                . " LEFT JOIN banks b ON bft.bank_id = b.id"
//                . " LEFT JOIN currency c ON b.currency_id = c.id"
//                . " LEFT JOIN files_types f ON bft.file_type_id = f.id";
        $query =  $this->getBankDataByFileTypeQuery();
        $query  .= " WHERE date = '" . $data['date'] . "'"
                . " AND client = '" . $data['client'] . "'"
                . " AND value = " . $data['value']
                . " AND account = '" . $data['account'] . "'";
        var_dump($query); exit();
        return $this->getDataSingle($query);
    }
    public function getBankDataByFileTypeQuery(){ 
            $query = "SELECT b.id as bank_id, b.name as bank, f.name as file_type,"
                . " bft.id as bank_file_type_id, c.name as currency"
                . " FROM bank_files_types as bft"
                . " LEFT JOIN banks b ON bft.bank_id = b.id"
                . " LEFT JOIN currency c ON b.currency_id = c.id"
                . " LEFT JOIN files_types f ON bft.file_type_id = f.id";
            return $query;        
    }

}
