<?php

namespace App\Models;


class MyModel extends \CodeIgniter\Model
{
    protected $request;
    protected $session;
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();

        $user = $this->session->get('user');
        if ($user)
            $this->user = $this->getUserById($user['user_id']);
    }

    public function insertData($table, $data, $batch = false)
    {
        if ($batch === false) {
            $insert = $this->db->table($table)->insert($data);
        } else {
            $insert = $this->db->table($table)->insertBatch($data);
        }
        return $insert;
    }

    public function updateData($table, $data, $pk, $id = null, $batch = false)
    {
        if ($batch === false) {
            $update = $this->db->table($table)->update($data, [$pk => $id]);
        } else {
            $update = $this->db->table($table)->updateBatch($data, [$pk => $id]);
        }
        return $update;
    }

    public function deleteData($table, $pk, $data)
    {
        $this->db->table($table)->delete([$pk => $data]);
        return $this->db->affectedRows();
    }

    public function getModule($nama_module)
    {
        $result = $this->db->query('SELECT * FROM module LEFT JOIN module_status USING(module_status_id) WHERE nama_module = ?', [$nama_module])->getRowArray();
        return $result;
    }

    public function getMenu($current_module = '')
    {
        $where_role = $_SESSION['user']['role'] ? join(',', array_keys($_SESSION['user']['role'])) : 'null';
        $sql = 'SELECT * FROM menu 
        			LEFT JOIN menu_role USING (menu_id) 
        			LEFT JOIN module USING (module_id)
        			LEFT JOIN menu_kategori USING(menu_kategori_id)
        		WHERE menu_kategori.is_active = "1" AND role_id IN ( ' . $where_role . ')
        		ORDER BY menu_kategori.urutan, menu.urutan';

        $query_result = $this->db->query($sql)->getResultArray();

        $current_id = '';
        $menu = [];
        foreach ($query_result as $val) {
            $menu[$val['menu_id']] = $val;
            $menu[$val['menu_id']]['highlight'] = 0;
            $menu[$val['menu_id']]['depth'] = 0;

            if ($current_module == $val['nama_module']) {

                $current_id = $val['menu_id'];
                $menu[$val['menu_id']]['highlight'] = 1;
            }
        }

        if ($current_id) {
            $this->menuCurrent($menu, $current_id);
        }

        $menu_kategori = [];
        foreach ($menu as $menu_id => $val) {
            if (!$menu_id)
                continue;

            $menu_kategori[$val['menu_kategori_id']][$val['menu_id']] = $val;
        }

        // Kategori
        $sql = 'SELECT * FROM menu_kategori WHERE is_active = "1" ORDER BY urutan';
        $query_result = $this->db->query($sql)->getResultArray();
        $result = [];
        foreach ($query_result as $val) {
            if (key_exists($val['menu_kategori_id'], $menu_kategori)) {
                $result[$val['menu_kategori_id']] = ['kategori' => $val, 'menu' => $menu_kategori[$val['menu_kategori_id']]];
            }
        }
        // echo '<pre>'; print_r($result); die;
        return $result;
    }

    public function getMenuWebsite($current_module = '')
    {
        $sql = 'SELECT * FROM menu 
        			LEFT JOIN module USING (module_id)
        		WHERE 1=1 AND is_active = 1 AND type = "Frontend"
        		ORDER BY menu.urutan';

        $query_result = $this->db->query($sql)->getResultArray();

        $current_id = '';
        $menu = [];
        foreach ($query_result as $val) {
            $menu[$val['menu_id']] = $val;
            $menu[$val['menu_id']]['highlight'] = 0;
            $menu[$val['menu_id']]['depth'] = 0;

            if ($current_module == $val['nama_module']) {
                $current_id = $val['menu_id'];
                $menu[$val['menu_id']]['highlight'] = 1;
            }
        }

        if ($current_id) {
            $this->menuCurrent($menu, $current_id);
        }
        // echo '<pre>'; print_r($result); die;
        return $menu;
    }

    public function getLinkTerkait()
    {
        return $this->db->query('SELECT * FROM link_terkait')->getResultArray();
    }

    // Highlight child and parent
    private function menuCurrent(&$result, $current_id)
    {
        $parent_id = $result[$current_id]['parent_id'];

        $result[$parent_id]['highlight'] = 1; // Highlight menu parent_id
        if (@$result[$parent_id]['parent_id']) {
            $this->menuCurrent($result, $parent_id);
        }
    }

    public function getSettingAppLayoutUser()
    {
        $setting_user = $this->db->query('SELECT * FROM setting_user WHERE user_id = ? AND type="backend-layout"', [$this->session->get('user')['user_id']])->getRow();
        if (!$setting_user) {
            $query = $this->db->query('SELECT * FROM setting WHERE type="backend-layout"')->getResultArray();

            foreach ($query as $val) {
                $data[$val['param']] = $val['value'];
            }

            $setting_user = new \StdClass;
            $setting_user->param = json_encode($data);
        }
        return $setting_user;
    }

    public function getSettingAppLayoutDefault()
    {
        $result = $this->db->query('SELECT * FROM setting WHERE type="backend-layout"')->getResultArray();
        return $result;
    }

    public function getSettingAppLayout()
    {
        $sql = 'SELECT * FROM setting WHERE type LIKE "%backend%" OR type LIKE "%frontend%" ';
        $query = $this->db->query($sql)->getResultArray();

        foreach ($query as $val) {
            $settingAppLayout[$val['param']] = $val['value'];
        }
        return $settingAppLayout;
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

    public function recordLogin()
    {
        $username = $this->request->getPost('username');
        $user = $this->db->query(
            'SELECT user_id 
            FROM user
            WHERE username = ?',
            [$username]
        )->getRowArray();

        $data = array(
            'user_id' => $user['user_id'], 'time' => date('Y-m-d H:i:s')
        );

        $this->db->table('user_login_activity')->insert($data);
    }

    public function getRoleModuleUser()
    {
        $where_role = $_SESSION['user']['role'] ? join(',', array_keys($_SESSION['user']['role'])) : 'null';
        $query = $this->db->query(
            'SELECT * 
			FROM role 
			LEFT JOIN module USING(module_id)
			WHERE role_id IN (' . $where_role . ')'
        )->getRowArray();
        return $query;
    }


    public function getSetting()
    {
        return $this->db->query('SELECT * FROM setting WHERE 1=1 AND id = 1')->getRowArray();
    }

    public function getSettingApp()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="app"')->getRowArray();
    }

    public function getSettingLayout()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="layout"')->getRowArray();
    }

    public function getSettingProfile()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="profile"')->getRowArray();
    }

    public function getSettingMediaSosial()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="media_sosial"')->getRowArray();
    }

    public function getSettingLibrary()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="library"')->getRowArray();
    }

    public function getLayanan()
    {
        return $this->db->query('SELECT * FROM layanan')->getResultArray();
    }

    public function getModuleRole($module_id)
    {
        return $this->db->query('SELECT * FROM module_role WHERE module_id = ?', [$module_id])->getResultArray();
    }
}
