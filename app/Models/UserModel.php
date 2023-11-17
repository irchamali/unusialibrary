<?php

namespace App\Models;

class UserModel extends \App\Models\MyModel
{
    public function getUser()
    {
        return $this->db->query('SELECT * FROM user')->getResultArray();
    }

    public function getUserById($user_id = null, $array = false)
    {

        if (!$user_id) {
            if (!$this->user) {
                return false;
            }
            $user_id = $this->user['user_id'];
        }

        $query = $this->db->query('SELECT * FROM user WHERE user_id = ?', [$user_id]);
        $user = $query->getRowArray();

        if (!$user) {
            return;
        }

        $user['role_user'] = [];
        $query = $this->db->query(
            'SELECT * FROM user_role 
            LEFT JOIN role USING(role_id) 
            
            WHERE user_id = ? 
            ORDER BY  nama_role',
            [$user_id]
        );

        $result = $query->getResultArray();
        if ($result) {
            foreach ($result as $val) {
                $user['role_user'][$val['role_id']] = $val;
            }
        }

        // LEFT JOIN module USING(module_id) 
        // $query = $this->db->query('SELECT * FROM module WHERE module_id = ?', [$user['default_page_module_id']]);
        // $user['default_module'] = $query->getRowArray();

        return $user;
    }

    public function getRoleByUser()
    {
        return $this->db->query('SELECT * FROM role')->getResultArray();
    }

    public function saveDataUser()
    {
        $fields = ['nama', 'email', 'is_active'];
        // if (in_array('update_all', $user_permission)) {
        //     $add_field = ['username', 'status', 'verified', 'default_page_id_role', 'default_page_module_id', 'default_page_url'];
        //     $fields = array_merge($fields, $add_field);
        // }

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        if ($this->request->getPost('password')) {
            $data_db['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->db->transStart();

        if ($this->request->getPost('id')) {
            $user_id = $this->request->getPost('id');
            $this->db->table('user')->update($data_db, ['user_id' => $user_id]);
        } else {
            $this->db->table('user')->insert($data_db);
            $user_id = $this->db->insertID();
        }

        // if (in_array('update_all', $user_permission)) {
        $data_db = [];
        foreach ($_POST['role_id'] as $role_id) {
            $data_db[] = ['user_id' => $user_id, 'role_id' => $role_id];
        }

        $this->db->table('user_role')->delete(['user_id' => $user_id]);
        $this->db->table('user_role')->insertBatch($data_db);
        // }

        $this->db->transComplete();
        $response = $this->db->transStatus();
        return $response;
    }

    public function deleteDataUser()
    {
        $user = $this->db->query('SELECT * FROM user WHERE user_id = ?', $this->request->getPost('id'))->getRowArray();
        if (!$user) {
            return false;
        }

        $this->db->transStart();
        $this->db->table('user')->delete(['user_id' => $this->request->getPost('id')]);
        $this->db->table('user_role')->delete(['user_id' => $this->request->getPost('id')]);
        $this->db->affectedRows();
        $this->db->transComplete();
        $response = $this->db->transStatus();

        if ($response) {
            if (!empty($user['image'])) {
                delete_file(ROOTPATH . 'public/images/user/' . $user['image']);
            }
        } else {
            return false;
        }

        return true;
    }
}
