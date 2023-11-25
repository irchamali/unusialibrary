<?php

namespace App\Models;

class FakultasModel extends \App\Models\MyModel
{
    public function getFakultas()
    {
        return $this->db->query('SELECT * FROM fakultas')->getResultArray();
    }

    public function getFakultasById($id)
    {
        return $this->db->query('SELECT * FROM fakultas WHERE fakultas_id = ?', $id)->getRowArray();
    }
}
