<?php

namespace App\Controllers;

use App\Models\DataTableModel;
use App\Models\LayananModel;

class Layanan extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new LayananModel;
        $this->addStyleBackend(base_url('public/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyleBackend(base_url('public/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyleBackend(base_url('public/bower_components/wdi/') . 'wdi-modal.css');
        $this->addStyleBackend(base_url('public/bower_components/wdi/') . 'wdi-fapicker.css');
        $this->addStyleBackend(base_url('public/bower_components/wdi/') . 'wdi-loader.css');

        $this->addScriptBackend(base_url('public/bower_components/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScriptBackend(base_url('public/bower_components/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScriptBackend(base_url('public/bower_components/bootbox/') . 'bootbox.min.js');
        $this->addScriptBackend(base_url('public/bower_components/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScriptBackend(base_url('public/bower_components/wdi/') . 'wdi-fapicker.js');
        $this->addScriptBackend(base_url('public/bower_components/js-yaml/') . 'js-yaml.min.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'nama_layanan' => [
                'label' => 'Nama Layanan',
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

        if ($validation->hasError('nama_layanan')) {
            $data['error_input'][] = 'nama_layanan';
            $data['error_string'][] = $validation->getError('nama_layanan');
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
        $this->data['title'] = 'Daftar Layanan';
        $this->view('backend', 'Layanan/index', $this->data);
    }

    public function ajaxGetData()
    {

        $req = $this->request->getPost();

        $table = 'layanan';
        $fields = array(
            'id',
            'nama_layanan',
            'url',
            'icon',
            'keterangan',
        );
        $get = $req;
        $orderBy = ['id', 'ASC'];
        $joins = [];
        // $joins[] = ['table_a', 'table_a.primary_key = table_b.primary_key', 'LEFT'];

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
                $this->data['layanan'] = $this->model->getLayananById($_GET['id']);
                if (!$this->data['layanan']) {
                    echo '<div class="alert alert-danger">Data layanan tidak ditemukan</div>';
                    exit;
                }
            }
        }

        echo view('Layanan/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate();

        $id = $this->request->getPost('id');

        $fields = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'url' => strtolower($_POST['url']),
            'icon' => $this->request->getPost('icon_class'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($id) {
            $result = $this->model->updateData('layanan', $fields, 'id', $id);
        } else {
            $result = $this->model->insertData('layanan', $fields);
        }


        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteData('layanan', 'id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
