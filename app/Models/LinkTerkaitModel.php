<?php

namespace App\Models;

class LinkTerkaitModel extends \App\Models\MyModel
{
    public function getLinkTerkaitById($id)
    {
        return $this->db->query('SELECT * FROM link_terkait WHERE id = ?', $id)->getRowArray();
    }
}
