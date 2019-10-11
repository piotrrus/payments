<?php

namespace App\Models;

class FileType extends Model
{

    public function allWithFilesTypes()
    {
        $query = "SELECT b.id, b.name as bank, f.name as file_type"
                . " FROM bank_files_types as bft"
                . " LEFT JOIN banks b ON bft.bank_id = b.id"
                . " LEFT JOIN files_types f ON bft.file_type_id = f.id"
                . " ORDER BY bank";
        return $this->getData($query);
    }

    public function searchById(int $id)
    {
        $query = "SELECT id, name"
                . " FROM banks"
                . " WHERE id =" . $id
                . " ORDER BY name";
        return $this->getDataSingle($query);
    }

}
