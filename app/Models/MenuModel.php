<?php

namespace App\Models;

class MenuModel extends \App\Models\MyModel
{
    public function getMenuById($id)
    {
        $sql = 'SELECT menu.*, GROUP_CONCAT(role_id) AS role_id
				FROM menu 
				LEFT JOIN menu_role USING(menu_id) 
				WHERE menu_id = ? GROUP BY menu_id';
        $result = $this->db->query($sql, $id)->getRowArray();
        return $result;
    }

    public function getMenuKategori()
    {
        return $this->db->query('SELECT * FROM menu_kategori ORDER BY urutan')->getResultArray();
    }

    public function getMenuKategoriById($id)
    {
        return $this->db->query('SELECT * FROM menu_kategori WHERE menu_kategori_id = ?', $id)->getRowArray();
    }

    public function getMenuByMenuKategori($menu_kategori_id)
    {

        $result = [];
        if ($menu_kategori_id) {
            $where_menu_kategori_id = 'menu_kategori_id = ' . $menu_kategori_id;
        } else {
            $where_menu_kategori_id = '( menu_kategori_id = 0 OR menu_kategori_id = "" OR menu_kategori_id IS NULL )';
        }

        $sql = 'SELECT * FROM menu 
					LEFT JOIN menu_role USING (menu_id)
					LEFT JOIN module USING (module_id)
				WHERE 1 = 1 AND type = "Backend"
				AND ' . $where_menu_kategori_id . '
				ORDER BY urutan';

        $query = $this->db->query($sql)->getResultArray();

        foreach ($query as $row) {
            $result[$row['menu_id']] = $row;
            $result[$row['menu_id']]['highlight'] = 0;
            $result[$row['menu_id']]['depth'] = 0;
        }

        return $result;
    }

    public function saveMenuKategori()
    {
        $fields = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
            'is_active' => $this->request->getPost('is_active'),
        ];

        if ($this->request->getPost('id')) {
            $result = $this->db->table('menu_kategori')->update($fields, ['menu_kategori_id' => $this->request->getPost('id')]);
        } else {
            $last_urutan = $this->db->query('SELECT MAX(urutan) AS urutan FROM menu_kategori')->getRowArray();
            $fields['urutan'] = $last_urutan['urutan'] + 1;
            $result = $this->db->table('menu_kategori')->insert($fields);
        }

        if ($result) {
            $response['status'] = true;
            $response['message'] = 'Menu berhasil diupdate';
            $response['menu_kategori_id'] = $this->db->insertID();
        } else {
            $response['status'] = false;
            $response['message'] = 'Tidak ada menu yang diupdate';
        }
        return $response;
    }

    public function deleteMenuKategori($id)
    {
        $this->db->transStart();
        $this->db->table('menu_kategori')->delete(['menu_kategori_id' => $id]);
        $this->db->table('menu')->update(['menu_kategori_id' => null], ['menu_kategori_id' => $id]);
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function updateUrutanMenuKategori($menu_kategori)
    {
        $this->db->transStart();
        $urutan = 1;
        foreach ($menu_kategori as $menu_kategori_id) {
            $this->db->table('menu_kategori')->update(['urutan' => $urutan], ['menu_kategori_id' => $menu_kategori_id]);
            $urutan++;
        }
        $this->db->transComplete();
        return $this->db->transStatus();
    }


    public function getModuleByMenu($type)
    {
        return $this->db->query('SELECT * FROM module LEFT JOIN module_status USING(module_status_id) WHERE 1=1 AND module_type = ? ORDER BY module', $type)->getResultArray();
    }

    public function getRoleByMenu()
    {
        return $this->db->query('SELECT * FROM role')->getResultArray();
    }

    public function saveMenu($id = null)
    {
        $id = $this->request->getPost('id');
        $menu_kategori_id = $this->request->getPost('menu_kategori_id');
        $fields['nama_menu'] = $this->request->getPost('nama_menu');
        $fields['url'] = strtolower($_POST['url']);
        $use_icon = $this->request->getPost('use_icon');
        $icon_class = $this->request->getPost('icon_class');
        $is_active = $this->request->getPost('is_active');
        $module_id = $this->request->getPost('module_id') ?: NULL;
        $menu_tree = $this->request->getPost('menu_tree');

        if (trim($menu_kategori_id) == '') {
            $menu_kategori_id = NULL;
        } else {
            $menu_kategori_id = $menu_kategori_id;
        }
        $fields['menu_kategori_id'] = $menu_kategori_id;

        if ($use_icon) {
            $fields['icon'] = $icon_class;
        } else {
            $fields['icon'] = NULL;
        }

        if (empty($is_active)) {
            $fields['is_active'] = 0;
        } else {
            $fields['is_active'] = 1;
        }
        $fields['module_id'] = $module_id;

        if ($id) {
            $this->db->transStart();

            $query = $this->db->query('SELECT menu_kategori_id FROM menu WHERE menu_id = ?', $id)->getRowArray();
            if ($query['menu_kategori_id'] != $menu_kategori_id) {
                $fields['parent_id'] = NULL;
            }

            $this->db->table('menu')->update($fields, ['menu_id' => $id]);

            $json = json_decode(trim($menu_tree), true);
            $array = $this->buildChild($json);
            $all_child = $this->allChild($id, $array);
            foreach ($all_child as $val) {
                $this->db->table('menu')->update(['menu_kategori_id' => $menu_kategori_id], ['menu_id' => $val]);
            }

            if (!empty($_POST['role_id'])) {
                $fields = [];
                foreach ($_POST['role_id'] as $val) {
                    $fields[] = ['menu_id' => $id, 'role_id' => $val];
                }
                $this->db->table('menu_role')->delete(['menu_id' => $id]);
                $this->db->table('menu_role')->insertBatch($fields);

                $this->db->transComplete();
                $result = $this->db->transStatus();
                if ($result) {
                    $response = ['status' => true, 'message' => 'Data berhasil diubah'];
                }
            } else {
                $response = ['status' => 'required', 'message' => 'Role harus diisi.'];
            }
        } else {
            $last_urutan = $this->db->query('SELECT MAX(urutan) AS urutan FROM menu WHERE menu_kategori_id = ?', [$menu_kategori_id])->getRowArray();
            $fields['urutan'] = $last_urutan['urutan'] + 1;
            $this->db->table('menu')->insert($fields);
            $insertID = $this->db->insertID();
            if (!empty($_POST['role_id'])) {
                $fields = [];
                foreach ($_POST['role_id'] as $val) {
                    $fields[] = ['menu_id' => $insertID, 'role_id' => $val];
                }
                $this->db->table('menu_role')->insertBatch($fields);
                $response = ['status' => true, 'message' => 'Data berhasil disimpan'];
            } else {
                $response = ['status' => false, 'message' => 'Role harus diisi.'];
            }
        }

        return $response;
    }

    public function updateUrutanMenu()
    {

        $json = json_decode(trim($_POST['data']), true);
        $array = $this->buildChild($json);

        foreach ($array as $parent_id => $arr) {
            foreach ($arr as $key => $menu_id) {
                $list_menu[$menu_id] = ['parent_id' => $parent_id, 'urutan' => ($key + 1)];
            }
        }

        $menu_kategori_id = trim($_POST['menu_kategori_id']);
        if (empty($menu_kategori_id)) {
            $where_menu_kategori_id = ' menu_kategori_id = "" OR menu_kategori_id IS NULL';
        } else {
            $where_menu_kategori_id = ' menu_kategori_id = ' . $menu_kategori_id;
        }

        $result = $this->db->query('SELECT * FROM menu WHERE ' . $where_menu_kategori_id)->getResultArray();

        $this->db->transStart();
        $menu_updated = [];

        foreach ($result as $key => $row) {
            $data_db = [];
            if ($list_menu[$row['menu_id']]['parent_id'] != $row['parent_id']) {
                $parent_id =  $list_menu[$row['menu_id']]['parent_id'] == 0 ? NULL : $list_menu[$row['menu_id']]['parent_id'];
                $data_db['parent_id'] = $parent_id;
            }

            if ($list_menu[$row['menu_id']]['urutan'] != $row['urutan']) {
                $data_db['urutan'] = $list_menu[$row['menu_id']]['urutan'];
            }

            if ($data_db) {
                $result = $this->db->table('menu')->update($data_db, ['menu_id=' => $row['menu_id']]);
                if ($result) {
                    $menu_updated[$row['menu_id']] = $row['menu_id'];
                }
            }
        }

        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function deleteMenu()
    {
        $this->db->transStart();

        $json = json_decode(trim($_POST['menu_tree']), true);
        $array = $this->buildChild($json);
        $all_child = $this->allChild($_POST['id'], $array);
        if ($all_child) {
            foreach ($all_child as $menu_id) {
                $this->db->table('menu')->delete(['menu_id' => $menu_id]);
            }
        } else {
            $this->db->table('menu')->delete(['menu_id' => $_POST['id']]);
        }
        $this->db->transComplete();
        return $this->db->transStatus();
    }


    public function getMenuFrontendByMenu()
    {
        $result = [];
        $sql = 'SELECT * FROM menu 
					LEFT JOIN module USING (module_id)
				WHERE 1 = 1 AND type = "Frontend"
				ORDER BY urutan';

        $query = $this->db->query($sql)->getResultArray();

        foreach ($query as $row) {
            $result[$row['menu_id']] = $row;
            $result[$row['menu_id']]['highlight'] = 0;
            $result[$row['menu_id']]['depth'] = 0;
        }

        return $result;
    }

    public function saveMenuFrontend($id = null)
    {
        $id = $this->request->getPost('id');
        $menu_kategori_id = $this->request->getPost('menu_kategori_id');
        $fields['nama_menu'] = $this->request->getPost('nama_menu');
        $fields['url'] = strtolower($_POST['url']);
        $use_icon = $this->request->getPost('use_icon');
        $icon_class = $this->request->getPost('icon_class');
        $is_active = $this->request->getPost('is_active');
        $module_id = $this->request->getPost('module_id') ?: NULL;
        $menu_tree = $this->request->getPost('menu_tree');

        if (trim($menu_kategori_id) == '') {
            $menu_kategori_id = NULL;
        } else {
            $menu_kategori_id = $menu_kategori_id;
        }
        $fields['menu_kategori_id'] = $menu_kategori_id;

        if ($use_icon) {
            $fields['icon'] = $icon_class;
        } else {
            $fields['icon'] = NULL;
        }

        if (empty($is_active)) {
            $fields['is_active'] = 0;
        } else {
            $fields['is_active'] = 1;
        }
        $fields['module_id'] = $module_id;

        if ($id) {
            $this->db->transStart();

            $query = $this->db->query('SELECT menu_kategori_id FROM menu WHERE menu_id = ?', $id)->getRowArray();
            if ($query['menu_kategori_id'] != $menu_kategori_id) {
                $fields['parent_id'] = NULL;
            }

            $this->db->table('menu')->update($fields, ['menu_id' => $id]);

            // $json = json_decode(trim($menu_tree), true);
            // $array = $this->buildChild($json);
            // $all_child = $this->allChild($id, $array);
            // foreach ($all_child as $val) {
            //     $this->db->table('menu')->update(['menu_kategori_id' => $menu_kategori_id], ['menu_id' => $val]);
            // }

            $this->db->transComplete();
            return $this->db->transStatus();
        } else {
            $last_urutan = $this->db->query('SELECT MAX(urutan) AS urutan FROM menu WHERE type = "Frontend"')->getRowArray();
            $fields['urutan'] = $last_urutan['urutan'] + 1;
            $fields['type'] = 'Frontend';
            $this->db->table('menu')->insert($fields);
            $insertID = $this->db->insertID();
            if (!empty($_POST['role_id'])) {
                $fields = [];
                foreach ($_POST['role_id'] as $val) {
                    $fields[] = ['menu_id' => $insertID, 'role_id' => $val];
                }
                $this->db->table('menu_role')->insertBatch($fields);
            }
            return $insertID;
        }
    }

    public function updateUrutanMenuFrontend()
    {

        $json = json_decode(trim($_POST['data']), true);
        $array = $this->buildChild($json);

        foreach ($array as $parent_id => $arr) {
            foreach ($arr as $key => $menu_id) {
                $list_menu[$menu_id] = ['parent_id' => $parent_id, 'urutan' => ($key + 1)];
            }
        }

        $where_menu_kategori_id = ' menu_kategori_id = "" OR menu_kategori_id IS NULL';


        $result = $this->db->query('SELECT * FROM menu WHERE ' . $where_menu_kategori_id)->getResultArray();

        $this->db->transStart();
        $menu_updated = [];

        foreach ($result as $key => $row) {
            $data_db = [];
            if ($list_menu[$row['menu_id']]['parent_id'] != $row['parent_id']) {
                $parent_id =  $list_menu[$row['menu_id']]['parent_id'] == 0 ? NULL : $list_menu[$row['menu_id']]['parent_id'];
                $data_db['parent_id'] = $parent_id;
            }

            if ($list_menu[$row['menu_id']]['urutan'] != $row['urutan']) {
                $data_db['urutan'] = $list_menu[$row['menu_id']]['urutan'];
            }

            if ($data_db) {
                $result = $this->db->table('menu')->update($data_db, ['menu_id=' => $row['menu_id']]);
                if ($result) {
                    $menu_updated[$row['menu_id']] = $row['menu_id'];
                }
            }
        }

        $this->db->transComplete();
        return $this->db->transStatus();
    }

    private function buildChild($arr, $parent = 0, &$list = [])
    {
        foreach ($arr as $key => $val) {
            $list[$parent][] = $val['id'];
            if (key_exists('children', $val)) {
                $this->buildChild($val['children'], $val['id'], $list);
            }
        }
        return $list;
    }

    private function allChild($id, $list, &$result = [])
    {
        if (!key_exists($id, $list)) {
            return $result;
        }

        $result[$id] = $id;
        foreach ($list[$id] as $val) {
            $result[$val] = $val;
            if (key_exists($val, $list)) {
                $this->allChild($val, $list, $result);
            }
        }
        return $result;
    }
}
