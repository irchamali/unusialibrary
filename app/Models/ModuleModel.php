<?php

namespace App\Models;

class ModuleModel extends \App\Models\MyModel
{
    public function getModuleById($id)
    {
        $query = $this->db->query('SELECT * FROM module WHERE module_id = ?', [$id]);
        $module = $query->getRowArray();

        if (!$module) {
            return;
        }

        $module['role'] = [];
        $query = $this->db->query(
            'SELECT * FROM module_role 
            LEFT JOIN role USING(role_id) 
            WHERE module_role.module_id = ? 
            ORDER BY nama_role',
            [$id]
        );

        $result = $query->getResultArray();
        if ($result) {
            foreach ($result as $val) {
                $module['role'][$val['role_id']] = $val;
            }
        }

        return $module;
    }

    public function getRoleByModule()
    {
        return $this->db->query('SELECT * FROM role')->getResultArray();
    }

    public function saveDataModule()
    {
        $fields = ['module', 'module_url', 'module_type', 'is_login', 'module_status_id'];
        $data_db['nama_module'] = $this->request->getPost('module_url');

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        $this->db->transStart();

        if (!empty($this->request->getPost('id'))) {
            $module_id = $this->request->getPost('id');
            $this->db->table('module')->update($data_db, ['module_id' => $module_id]);
            $response = ['status' => true, 'message' => 'Data berhasil diubah'];
        } else {
            $this->db->table('module')->insert($data_db);
            $module_id = $this->db->insertID();
            $response = ['status' => true, 'message' => 'Data berhasil disimpan'];
        }

        if (!empty(@$_POST['role_id'])) {
            $data_db = [];
            foreach ($_POST['role_id'] as $role_id) {
                $data_db[] = ['module_id' => $module_id, 'role_id' => $role_id];
            }

            $this->db->table('module_role')->delete(['module_id' => $module_id]);
            $this->db->table('module_role')->insertBatch($data_db);

            $this->db->transComplete();
            $result = $this->db->transStatus();
            if ($result) {
                $response = $response;
            }
        } else {
            $response = ['status' => 'required', 'message' => 'Role harus diisi.'];
        }

        return $response;
    }
}
