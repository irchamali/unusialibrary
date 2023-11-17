<?php

namespace App\Models;

class ModulePermissionModel extends \App\Models\MyModel
{
    public function getModulePermission()
    {
        return $this->db->query('SELECT * FROM module_permission')->getResultArray();
    }

    public function getModulePermissionById($id)
    {
        return $this->db->query('SELECT * FROM module_permission WHERE module_permission_id = ?', $id)->getRowArray();
    }

    public function getModuleByModulePermission()
    {
        return $this->db->query('SELECT * FROM module ORDER BY nama_module')->getResultArray();
    }

    public function getResultModulePermission()
    {
        $module =  $this->db->query('SELECT * FROM module ORDER BY nama_module')->getResultArray();
        foreach ($module as $val) {
            $result[$val['module_id']] = $val['module'];
        }
        return $result;
    }

    public function getModuleById($id)
    {
        return $this->db->query('SELECT * FROM module WHERE module_id = ?', $id)->getRowArray();
    }

    public function checkDuplicate()
    {
        $result = false;
        if (!empty($this->request->getPost('nama_permission_old'))) {
            if ($this->request->getPost('nama_permission') != $this->request->getPost('nama_permission_old')) {
                $result  = $this->db->query('SELECT * FROM module_permission WHERE nama_permission = ? AND module_id = ?', [$this->request->getPost('nama_permission'), $this->request->getPost('module_id')])->getRowArray();
            }
        }
        return $result;
    }

    public function saveDataModulePermission()
    {
        $this->db->transStart();

        if ($this->request->getPost('generate_permission')) {
            if ($this->request->getPost('generate_permission') == 'crud_all') {
                $this->saveCrudModulePermission();
            } else if ($this->request->getPost('generate_permission') == 'crud_own') {
                $this->saveCrudOwnModulePermission();
            } else {
                $this->saveCrudModulePermission();
                $this->saveCrudOwnModulePermission();
            }

            if (!empty($this->request->getPost('id_role'))) {
                $this->saveRoleModulePermission($this->request->getPost('id_role'), $this->request->getPost('module_id'));
            }
        }
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveRoleModulePermission($id_role, $module_id)
    {
        $module_permission = $this->db->query('SELECT * FROM module_permission WHERE module_id = ?', $module_id)->getResultArray();
        $data = [];
        foreach ($module_permission as $val) {
            $data[] = ['id_role' => $id_role,  'module_permission_id' => $val['module_permission_id']];
        }

        if ($data) {
            $result = $this->db->table('role_module_permission')->insertBatch($data);
        }

        return $result;
    }

    private function saveCrudModulePermission()
    {
        $keterangan = ['membuat', 'membaca', 'mengupdate', 'menghapus'];
        $list_permission = ["create", "read_all", "update_all", "delete_all"];
        $permission_exists = $this->checkPermissionExists($list_permission);

        foreach ($list_permission as $key => $nama_permission) {
            if (in_array($nama_permission, $permission_exists))
                continue;

            $data = [];
            $data['module_id'] = (int) $this->request->getPost('module_id');
            $data['nama_permission'] = $nama_permission;
            $data['judul_permission'] = ucwords(str_replace('_', ' ', $nama_permission)) . ' Data';
            $ket_data = $nama_permission == 'create' ? ' data' : ' semua data';
            $data['keterangan'] = 'Hak akses untuk ' . $keterangan[$key] . $ket_data;
            $this->db->table('module_permission')->insert($data);
        }
    }

    private function saveCrudOwnModulePermission()
    {
        $keterangan = ['membuat', 'membaca', 'mengupdate', 'menghapus'];
        $list_permission = ["create", "read_own", "update_own", "delete_own"];
        $permission_exists = $this->checkPermissionExists($list_permission);

        // print_r($permission_exists); die;
        foreach ($list_permission as $key => $nama_permission) {
            if (in_array($nama_permission, $permission_exists))
                continue;

            $data = [];
            $data['module_id'] = (int) $this->request->getPost('module_id');
            $data['nama_permission'] = $nama_permission;
            $data['judul_permission'] = ucwords(str_replace('_', ' ', $nama_permission)) . ' Data';
            $ket_data = $nama_permission == 'create' ? ' data' : ' data miliknya sendiri';
            $data['keterangan'] = 'Hak akses untuk ' . $keterangan[$key] . $ket_data;
            $this->db->table('module_permission')->insert($data);
        }
    }

    private function checkPermissionExists($permission)
    {
        $sql = 'SELECT * FROM module_permission WHERE module_id = ? AND nama_permission IN ("' . join('","', $permission) . '")';
        $query = $this->db->query($sql, (int) $this->request->getPost('module_id'))->getResultArray();
        $permission_exists = [];
        foreach ($query as $val) {
            $permission_exists[$val['nama_permission']] = $val['nama_permission'];
        }
        return $permission_exists;
    }
}
