<?php

namespace App\Controllers;

use App\Models\DataTableModel;
use App\Models\UserModel;

class User extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new UserModel;
        $this->addStyleBackend(base_url('public/backend/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/select2/dist/css/') . 'select2.min.css');
        $this->addScriptBackend(base_url('public/backend/bower_components/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/bootbox/') . 'bootbox.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/select2/dist/js/') . 'select2.full.min.js');
        $this->addScriptBackend(base_url('public/backend/dist/js/pages/') . 'User.js');
    }

    private function getValidate($method)
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        if ($method == 'simpan') {
            $rulesPassword = 'required';
        } else {
            $rulesPassword = 'trim';
        }


        $this->validate([
            'nama' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => $rulesPassword,
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'role_id' => [
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
        ]);

        if ($validation->hasError('nama')) {
            $data['error_input'][] = 'nama';
            $data['error_string'][] = $validation->getError('nama');
            $data['status'] = false;
        }

        if ($validation->hasError('email')) {
            $data['error_input'][] = 'email';
            $data['error_string'][] = $validation->getError('email');
            $data['status'] = false;
        }

        if ($validation->hasError('username')) {
            $data['error_input'][] = 'username';
            $data['error_string'][] = $validation->getError('username');
            $data['status'] = false;
        }

        if ($validation->hasError('password')) {
            $data['error_input'][] = 'password';
            $data['error_string'][] = $validation->getError('password');
            $data['status'] = false;
        }

        if ($validation->hasError('role_id')) {
            $data['error_input'][] = 'role_id[]';
            $data['error_string'][] = $validation->getError('role_id');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] = 'Daftar User';
        $this->view('backend', 'User/index', $this->data);
    }

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');
        $model = new DataTableModel;
        $user = $model->getServerSideUser(null);

        // helper('html');
        $image_path = ROOTPATH . 'public/images/user/';

        foreach ($user['data'] as $key => &$val) {
            if ($val['image']) {
                if (file_exists($image_path . $val['image'])) {
                    $image = base_url('public/images/') . $val['image'];
                } else {
                    $image = base_url('public/images/') . 'image_no.png';
                }
            } else {
                $image = base_url('public/images/') . 'image_no.png';
            }
            $val['ignore_image'] = '<img src="' . $image . '" class="btn-user-image" data-id="' . $val['user_id'] . '" data-image="' . $val['image'] . '" style="width:80px;height:80px;">';

            $role = '';
            if ($val['nama_role']) {
                $split = explode(',', $val['nama_role']);
                foreach ($split as $nama_role) {
                    $role .= '<div class="label label-default mr-1">' . $nama_role . '</div>';
                }
            }

            $val['nama_role'] = $role;
            $val['status'] = status_user($val['is_active'], $val['user_id']);
            $val['ignore_btn'] = '
                <button type="button" class="btn ' . $this->data['settingAppLayout']['button'] . ' btn-sm btn-edit" data-id="' . $val['user_id'] . '"><i class="fa fa-pen"></i> Ubah</button>
                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="' . $val['user_id'] . '" data-message-delete="Apakah anda yakin, Data user <b>' . $val['nama'] . '</b> akan dihapus?"><i class="fa fa-trash-alt"></i> Hapus</button>
            ';
        }

        $response = [
            'data' => $user['data'],
            'draw' => $user['draw'],
            'recordsFiltered' => $user['recordsFiltered'],
            'recordsTotal' => $user['recordsTotal'],
        ];
        echo json_encode($response);
        exit();
    }

    public function ajaxGetForm()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['user'] = $this->model->getUserById($_GET['id']);
                if (!$this->data['user']) {
                    echo '<div class="alert alert-danger">Data user tidak ditemukan</div>';
                    exit;
                }
            }
        }

        $this->data['role'] = $this->model->getRoleByUser();
        echo view('User/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate($this->request->getPost('method'));

        if ($this->model->saveDataUser()) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteDataUser()) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }

    public function ajaxChangeStatus()
    {
        if ($this->model->updateData('user', ['is_active' => $this->request->getPost('type')], 'user_id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Status berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal mengubah status']);
        }
    }
}
