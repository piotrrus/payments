<?php

namespace App\Models;

class Payments extends Model
{

    public function all()
    {
        $query = "SELECT name, surname, account, amount, payment_purpose, payment_date "
                . " FROM payment_operations2 as op";
        return $this->getData($query);
    }

    public function search($params)
    {
        
    }

    /**
     * save data from choosen file
     * validate data using Rules Class
     * @param type $post
     */
    public function save($post = [])
    {
        for ($z = 0; $z < count($post['checked']); $z++) {
            $index = $post['checked'][$z];
            $values[$z]['payment_date'] = $post['payment_date'][$index - 1];
            $values[$z]['name'] = $post['name'][$index - 1];
            $values[$z]['surname'] = $post['surname'][$index - 1];
            $values[$z]['amount'] = $post['amount'][$index - 1];
            $values[$z]['account'] = $post['account'][$index - 1];
            $values[$z]['payment_purpose'] = $post['payment_purpose'][$index - 1];
        }
        unset($post['checked']);
        $keys = array_keys($post);
        $this->prepareSql($keys, $values);
        return;
    }

    private function prepareSql($columns, $data)
    {
        $query = 'INSERT INTO payment_operations2 (';
        $query .= implode(', ', $columns);
        $query .= ') VALUES ("';

        foreach ($data as $key => $val) {
            $values = implode('", "', $val);
            $newQuery = rtrim($values, ",");
            $newQuery = $query . $newQuery . '")';
            $this->insert($newQuery);
        }
        return;
    }

    private function insert($query)
    {
        $resp = $this->executeSql($query);
        return $resp;
    }

    public function checkIfDataExist($data)
    {
        $query = "SELECT count(id) as amount
            FROM payment_operations2 as op";

        $query .= " WHERE payment_date = '" . $data['date'] . "'"
                . " AND name = '" . $data['name'] . "'"
                . " AND surname = '" . $data['surname'] . "'"
                . " AND amount = '" . $data['amount'] . "'"
                . " AND account = '" . $data['account'] . "'";
        return $this->getDataSingle($query);
    }

}
