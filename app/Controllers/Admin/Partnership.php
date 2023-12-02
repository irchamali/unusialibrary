<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\DataTableModel;
use App\Models\PartnershipModel;

class Partnership extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new PartnershipModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyle(base_url('public/plugins/select2/dist/css/') . 'select2.min.css');
        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/plugins/select2/dist/js/') . 'select2.full.min.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'nama' => [
                'label' => 'Nama Partnership',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'link' => [
                'label' => 'Link',
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

        if ($validation->hasError('link')) {
            $data['error_input'][] = 'link';
            $data['error_string'][] = $validation->getError('link');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Partnership';
        $this->view('backend', 'partnership/index', $this->data);
    }

    public function form()
    {
        $this->data['title'] = 'Tambah Partnership';
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['title'] = 'Ubah Partnership';
                $this->data['partnership'] = $this->model->getPartnershipById($_GET['id']);
                if (!$this->data['partnership']) {
                    $this->errorDataNotFound();
                    exit;
                }
            }
        }
        $this->view('backend', 'partnership/form', $this->data);
    }

    public function ajaxGetData()
    {

        $req = $this->request->getPost();

        $table = 'partnership';
        $fields = array(
            'id',
            'nama',
            'link',
            'logo',
        );
        $get = $req;
        $orderBy = ['id', 'ASC'];
        $joins = [];

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

    public function ajaxSaveData()
    {
        $this->getValidate();

        echo json_encode($this->model->saveDataPartnership());
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteDataPartnership()) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
