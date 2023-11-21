<?php

namespace App\Models;

class LayananModel extends \App\Models\MyModel
{
    public function getLayananById($id)
    {
        return $this->db->query('SELECT * FROM layanan WHERE id = ?', $id)->getRowArray();
    }
}
