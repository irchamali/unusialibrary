<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\DataTableModel;
use App\Models\ModuleModel;

class Module extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new ModuleModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');

        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/dist/js/pages/') . 'module.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'module' => [
                'label' => 'Nama module',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'module_url' => [
                'label' => 'URL',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
        ]);

        if ($validation->hasError('module')) {
            $data['error_input'][] = 'module';
            $data['error_string'][] = $validation->getError('module');
            $data['status'] = false;
        }

        if ($validation->hasError('module_url')) {
            $data['error_input'][] = 'module_url';
            $data['error_string'][] = $validation->getError('module_url');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Module';
        $this->view('backend', 'module/index', $this->data);
    }

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');

        $req = $this->request->getPost();

        $table = 'module';
        $fields = array(
            'module.module',
            'module.nama_module',
            'module.module_url',
            'module.module_type',
            'module.is_login',
            'module_status.module_status',
            'module.module_id',
        );
        $get = $req;
        $orderBy = ['module.module', 'ASC'];
        $joins = [];
        $joins[] = ['module_status', 'module_status.module_status_id = module.module_status_id', 'LEFT'];

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
                $this->data['module'] = $this->model->getModuleById($_GET['id']);
                if (!$this->data['module']) {
                    echo '<div class="alert alert-danger">Data module tidak ditemukan</div>';
                    exit;
                }
            }
        }

        echo view('module/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate();

        $id = $this->request->getPost('id');

        $fields = [
            'module' => $this->request->getPost('module'),
            'nama_module' => strtolower($_POST['module_url']),
            'module_url' => strtolower($_POST['module_url']),
            'module_type' => $this->request->getPost('module_type'),
            'is_login' => $this->request->getPost('is_login'),
            'module_status_id' => $this->request->getPost('module_status_id'),
        ];

        if ($id) {
            $result = $this->model->updateData('module', $fields, 'module_id', $id);
        } else {
            $result = $this->model->insertData('module', $fields);
        }


        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteData('module', 'module_id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
