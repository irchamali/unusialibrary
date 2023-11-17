<?php

namespace App\Models;

class ModuleModel extends \App\Models\MyModel
{
    public function getModuleById($id)
    {
        return $this->db->query('SELECT * FROM module WHERE module_id = ?', $id)->getRowArray();
    }
}
