<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu_frontend extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new MenuModel;
        $this->addStyleBackend(base_url('public/backend/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/select2/dist/css/') . 'select2.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/jquery-nestable/') . 'jquery.nestable.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/wdi/') . 'wdi-modal.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/wdi/') . 'wdi-fapicker.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/wdi/') . 'wdi-loader.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/dragula/') . 'dragula.min.css');
        $this->addStyleBackend(base_url('public/backend/dist/css/pages/') . 'Menu.css');

        $this->addScriptBackend(base_url('public/backend/bower_components/bootbox/') . 'bootbox.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/select2/dist/js/') . 'select2.full.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/wdi/') . 'wdi-fapicker.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/jquery-nestable/') . 'jquery.nestable.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/jquery-nestable/') . 'jquery.wdi-menueditor.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/js-yaml/') . 'js-yaml.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/dragula/') . 'dragula.min.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

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

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $data = $this->data;
        $result = $this->model->getMenuFrontendByMenu();
        $list_menu = list_menu($result);
        $data['list_menu'] = $result ? $this->buildMenuList($list_menu) : '';

        $this->view('backend', 'Menu/Frontend/index', $data);
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
        $this->data['module_menu'] = $this->model->getModuleByMenu('Frontend');

        echo view('Menu/Frontend/form-menu', $this->data);
    }

    public function ajaxSaveMenu()
    {
        $this->getValidate();

        $response = $this->model->saveMenuFrontend();
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxUpdateUrutanMenu()
    {
        $response = $this->model->updateUrutanMenuFrontend();
        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Urutan berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal merubah urutan']);
        }
    }

    public function ajaxDeleteMenu()
    {
        if ($this->model->deleteData('menu', 'menu_id', $this->request->getPost('id'))) {
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
