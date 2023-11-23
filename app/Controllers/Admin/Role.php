<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\DataTableModel;
use App\Models\RoleModel;

class Role extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new RoleModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/dist/js/pages/') . 'Role.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'nama_role' => [
                'label' => 'Nama Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
        ]);

        if ($validation->hasError('nama_role')) {
            $data['error_input'][] = 'nama_role';
            $data['error_string'][] = $validation->getError('nama_role');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Role';
        $this->view('backend', 'role/index', $this->data);
    }

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');

        $req = $this->request->getPost();

        $table = 'role';
        $fields = array(
            'role.nama_role',
            'role.keterangan',
            'role.role_id',
        );
        $get = $req;
        $orderBy = ['role.role_id', 'ASC'];
        $joins = [];
        // $joins[] = ['table_a', 'table_a.key = table_this.key', 'LEFT'];

        $whereOnlyBefore = [];
        $whereBefore = [];
        $whereInBefore = [];
        $whereNotInBefore = [];
        $filtersBefore = [];
        // --------------------------------------------- AllResults
        $whereOnlyAfter = [];
        $whereAfter = [];
        $whereInAfter = [];
        $whereNotInAfter = [];
        $filtersAfter = [];

        $fieldOrder = $fields;
        $withDeleted = false; // true or false

        $dt = new DataTableModel();
        $res = $dt->getGenerateServerSide(
            $table,
            $fields,
            $get,
            $orderBy,
            $joins,

            $whereOnlyBefore,
            $whereBefore,
            $whereInBefore,
            $whereNotInBefore,
            $filtersBefore,
            // --------------------------------------------- AllResults
            $whereOnlyAfter,
            $whereAfter,
            $whereInAfter,
            $whereNotInAfter,

            $filtersAfter,
            $fieldOrder,
            $withDeleted
        );

        echo json_encode($res);
        exit();
    }

    public function ajaxGetForm()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['role'] = $this->model->getRoleById($_GET['id']);
                if (!$this->data['role']) {
                    echo '<div class="alert alert-danger">Data role tidak ditemukan</div>';
                    exit;
                }
            }
        }

        echo view('role/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate();

        $id = $this->request->getPost('id');

        $fields = [
            'nama_role' => $this->request->getPost('nama_role'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($id) {
            $result = $this->model->updateData('role', $fields, 'role_id', $id);
        } else {
            $result = $this->model->insertData('role', $fields);
        }


        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteData('role', 'role_id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
