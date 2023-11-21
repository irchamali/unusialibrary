<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new MenuModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyle(base_url('public/plugins/select2/dist/css/') . 'select2.min.css');
        $this->addStyle(base_url('public/plugins/jquery-nestable/') . 'jquery.nestable.min.css');
        $this->addStyle(base_url('public/plugins/wdi/') . 'wdi-modal.css');
        $this->addStyle(base_url('public/plugins/wdi/') . 'wdi-fapicker.css');
        $this->addStyle(base_url('public/plugins/wdi/') . 'wdi-loader.css');
        $this->addStyle(base_url('public/plugins/dragula/') . 'dragula.min.css');
        $this->addStyle(base_url('public/dist/css/pages/') . 'Menu.css');

        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/plugins/select2/dist/js/') . 'select2.full.min.js');
        $this->addScript(base_url('public/plugins/wdi/') . 'wdi-fapicker.js');
        $this->addScript(base_url('public/plugins/jquery-nestable/') . 'jquery.nestable.js');
        $this->addScript(base_url('public/plugins/jquery-nestable/') . 'jquery.wdi-menueditor.js');
        $this->addScript(base_url('public/plugins/js-yaml/') . 'js-yaml.min.js');
        $this->addScript(base_url('public/plugins/dragula/') . 'dragula.min.js');
        $this->addScript(base_url('public/dist/js/pages/') . 'menu-kategori.js');
        $this->addScript(base_url('public/dist/js/pages/') . 'menu.js');
    }

    private function getValidate($form)
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        if ($form == 'menu_kategori') {
            $this->validate([
                'nama_kategori' => [
                    'label' => 'Menu Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ],
                ],
            ]);

            if ($validation->hasError('nama_kategori')) {
                $data['error_input'][] = 'nama_kategori';
                $data['error_string'][] = $validation->getError('nama_kategori');
                $data['status'] = false;
            }
        } else {
            $this->validate([
                'nama_menu' => [
                    'label' => 'Nama Menu',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ],
                ],
                'url' => [
                    'label' => 'URL',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ],
                ],
                // 'role_id' => [
                //     'label' => 'Role',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} harus diisi.'
                //     ],
                // ],
            ]);

            if ($validation->hasError('nama_menu')) {
                $data['error_input'][] = 'nama_menu';
                $data['error_string'][] = $validation->getError('nama_menu');
                $data['status'] = false;
            }

            if ($validation->hasError('url')) {
                $data['error_input'][] = 'url';
                $data['error_string'][] = $validation->getError('url');
                $data['status'] = false;
            }

            // if ($validation->hasError('role_id')) {
            //     $data['error_input'][] = 'role_id[]';
            //     $data['error_string'][] = $validation->getError('role_id');
            //     $data['status'] = false;
            // }
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        // echo "<pre>";
        // print_r($this->data['setting_aplikasi']);
        // echo "</pre>";
        // die;
        $data = $this->data;

        $data['menu_kategori'] = $this->model->getMenuKategori();
        $result = [];
        $list_menu = [];
        if ($data['menu_kategori']) {
            $menu_kategori_id = $data['menu_kategori'][0]['menu_kategori_id'];
        } else {
            $menu_kategori_id = null;
        }
        $result = $this->model->getMenuByMenuKategori($menu_kategori_id);
        $list_menu = list_menu($result);
        $data['list_menu'] = $result ? $this->buildMenuList($list_menu) : '';

        $this->view('backend', 'menu/backend/index', $data);
    }

    public function ajaxGetFormMenuKategori()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['menu_kategori'] = $this->model->getMenuKategoriById($_GET['id']);
                if (!$this->data['menu_kategori']) {
                    echo '<div class="alert alert-danger">Data menu kategori tidak ditemukan</div>';
                    exit;
                }
            }
        }
        echo view('menu/backend/form-menu-kategori', $this->data);
    }

    public function ajaxSaveMenuKategori()
    {
        $this->getValidate('menu_kategori');

        $response = $this->model->saveMenuKategori();
        echo json_encode($response);
    }

    public function ajaxDeleteMenuKategori()
    {
        $response = $this->model->deleteMenuKategori($this->request->getPost('id'));
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }

    public function ajaxUpdateUrutanMenuKategori()
    {
        $response = $this->model->updateUrutanMenuKategori(json_decode($_POST['id'], true));
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Urutan berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal merubah urutan']);
        }
    }

    public function ajaxGetMenuByMenuKategori()
    {
        $result = $this->model->getMenuByMenuKategori($_GET['menu_kategori_id']);
        if ($result) {
            $list_menu = list_menu($result);
            echo $this->buildMenuList($list_menu);
        } else {
            echo '';
        }
    }

    public function ajaxGetFormMenu()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['menu'] = $this->model->getMenuById($_GET['id']);
                if (!$this->data['menu']) {
                    echo '<div class="alert alert-danger">Data menu tidak ditemukan</div>';
                    exit;
                }
            }
        }
        $this->data['menu_kategori'] = $this->model->getMenuKategori();
        $this->data['module_menu'] = $this->model->getModuleByMenu('Backend');
        $this->data['role_menu'] = $this->model->getRoleByMenu();

        echo view('menu/backend/form-menu', $this->data);
    }

    public function ajaxSaveMenu()
    {
        $this->getValidate('menu');

        $response = $this->model->saveMenu();
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxUpdateUrutanMenu()
    {
        $response = $this->model->updateUrutanMenu();
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Urutan berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal merubah urutan']);
        }
    }

    public function ajaxDeleteMenu()
    {
        $response = $this->model->deleteMenu();
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }

    private function buildMenuList($arr)
    {
        $menu = "\n" . '<ol class="dd-list">' . "\r\n";

        foreach ($arr as $key => $val) {
            // Check new
            $new = @$val['new'] == 1 ? '<span class="menu-baru">NEW</span>' : '';
            $icon = '';
            if ($val['icon']) {
                $icon = '<i class="' . $val['icon'] . '"></i>';
            }

            $menu .= '<li class="dd-item" data-id="' . $val['menu_id'] . '" data-menu="' . $val['nama_menu'] . '"><div class="dd-handle">' . $icon . '<span class="menu-title">' . $val['nama_menu'] . '</span></div>';

            if (key_exists('children', $val)) {
                $menu .= $this->buildMenuList($val['children'], ' class="submenu"');
            }
            $menu .= "</li>\n";
        }
        $menu .= "</ol>\n";
        return $menu;
    }
}
