<?php

namespace App\Models;

class LoginModel extends \App\Models\MyModel
{
    public function checkUser($username)
    {
        $query = $this->db->query('SELECT * FROM user WHERE username = ?', [$username]);
        $user = $query->getRowArray();

        if (!$user)
            return;

        $user = $this->getUserById($user['user_id']);
        return $user;
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

        return $user;
    }
}
