<?php

namespace App\Models;

class JurnalModel extends \App\Models\MyModel
{
    public function getJurnal()
    {
        return $this->db->query('SELECT * FROM jurnal')->getResultArray();
    }

    public function getJurnalById($id)
    {
        return $this->db->query('SELECT * FROM jurnal WHERE jurnal_id = ?', $id)->getRowArray();
    }
}
