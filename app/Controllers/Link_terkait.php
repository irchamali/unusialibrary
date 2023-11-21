<?php

namespace App\Controllers;

use App\Models\DataTableModel;
use App\Models\LinkTerkaitModel;

class Link_terkait extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new LinkTerkaitModel;
        $this->addStyleBackend(base_url('public/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyleBackend(base_url('public/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        $this->addScriptBackend(base_url('public/bower_components/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScriptBackend(base_url('public/bower_components/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScriptBackend(base_url('public/bower_components/bootbox/') . 'bootbox.min.js');
        $this->addScriptBackend(base_url('public/bower_components/sweetalert2/') . 'sweetalert2.min.js');
        // $this->addScriptBackend(base_url('public/dist/js/pages/') . 'Module.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'nama_terkait' => [
                'label' => 'Nama Terkait',
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

        if ($validation->hasError('nama_terkait')) {
            $data['error_input'][] = 'nama_terkait';
            $data['error_string'][] = $validation->getError('nama_terkait');
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
        $this->data['title'] = 'Daftar Link Terkait';
        $this->view('backend', 'Link_terkait/index', $this->data);
    }

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');

        $req = $this->request->getPost();

        $table = 'link_terkait';
        $fields = array(
            'id',
            'nama_terkait',
            'url',
            'target',
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
                $this->data['link_terkait'] = $this->model->getLinkTerkaitById($_GET['id']);
                if (!$this->data['link_terkait']) {
                    echo '<div class="alert alert-danger">Data link terkait tidak ditemukan</div>';
                    exit;
                }
            }
        }

        echo view('Link_terkait/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate();

        $id = $this->request->getPost('id');

        $fields = [
            'nama_terkait' => $this->request->getPost('nama_terkait'),
            'url' => strtolower($_POST['url']),
            'target' => $this->request->getPost('target'),
        ];

        if ($id) {
            $result = $this->model->updateData('link_terkait', $fields, 'id', $id);
        } else {
            $result = $this->model->insertData('link_terkait', $fields);
        }


        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteData('link_terkait', 'id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
