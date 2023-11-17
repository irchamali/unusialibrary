<?php

namespace App\Models;

class RoleModel extends \App\Models\MyModel
{
    public function getRole()
    {
        return $this->db->query('SELECT * FROM role')->getResultArray();
    }

    public function getRoleById($id)
    {
        return $this->db->query('SELECT * FROM role WHERE role_id = ?', $id)->getRowArray();
    }
}
