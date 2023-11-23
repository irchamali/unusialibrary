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

        $user['role'] = [];
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
                $user['role'][$val['role_id']] = $val;
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
        $method = $this->request->getPost('method');
        $fields = ['username', 'nama', 'email', 'is_active'];

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        if ($this->request->getPost('password')) {
            $data_db['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->db->transStart();

        if (!empty($this->request->getPost('id'))) {
            $user_id = $this->request->getPost('id');
            $this->db->table('user')->update($data_db, ['user_id' => $user_id]);
        } else {
            $this->db->table('user')->insert($data_db);
            $user_id = $this->db->insertID();
        }

        $data_db = [];
        foreach ($_POST['role_id'] as $role_id) {
            $data_db[] = ['user_id' => $user_id, 'role_id' => $role_id];
        }

        $this->db->table('user_role')->delete(['user_id' => $user_id]);
        $this->db->table('user_role')->insertBatch($data_db);

        $this->db->transComplete();
        $result = $this->db->transStatus();
        if ($result) {

            $file = $this->request->getFile('image');
            $path = ROOTPATH . 'public/images/users/';

            $img_db = $this->db->query('SELECT image FROM user WHERE user_id = ?', $user_id)->getRowArray();
            $new_name = $img_db['image'];

            if (!empty($_POST['image_remove'])) {
                if ($img_db['image'] != NULL) {
                    $del = delete_file($path . $img_db['image']);
                    $new_name = NULL;
                    if (!$del) {
                        $response = ['status' => false, 'message' => 'Gagal menghapus gambar lama'];
                    }
                }
            }

            if ($file && $file->getName()) {
                //old file
                if ($img_db['image']) {
                    if (file_exists($path . $img_db['image'])) {
                        $unlink = delete_file($path . $img_db['image']);
                        if (!$unlink) {
                            $response = ['status' => false, 'message' => 'Gagal menghapus gambar lama'];
                        }
                    }
                }

                $new_name =  get_filename($file->getName(), $path);
                $file->move($path, $new_name);

                if (!$file->hasMoved()) {
                    $response = ['status' => false, 'message' => 'Error saat memperoses gambar'];
                    return $response;
                }
            }

            // Update image
            $data_db = [];
            $data_db['image'] = $new_name;
            $save = $this->db->table('user')->update($data_db, ['user_id' => $user_id]);
        }

        if ($save) {
            $response = ['status' => true, 'message' => 'Data berhasil di' . $method, 'user_id' => $user_id];

            if ($this->session->get('user')['user_id'] == $user_id) {
                $this->session->set('user', $this->getUserById($this->session->get('user')['user_id']));
            }
        } else {
            $response = ['status' => false, 'message' => 'Data gagal disimpan'];
        }

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
            if ($user['image'] != NULL) {
                delete_file(ROOTPATH . 'public/images/users/' . $user['image']);
            }
        } else {
            return false;
        }

        return true;
    }
}
