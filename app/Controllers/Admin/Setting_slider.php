<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\DataTableModel;
use App\Models\SettingModel;

class Setting_slider extends MyController
{
    public function __construct()
    {

        parent::__construct();
        $this->model = new SettingModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/plugins/ckeditor/') . 'ckeditor.js');
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
            'title' => [
                'label' => 'Title',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'sub_title' => [
                'label' => 'Sub Title',
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

        if ($validation->hasError('title')) {
            $data['error_input'][] = 'title';
            $data['error_string'][] = $validation->getError('title');
            $data['status'] = false;
        }

        if ($validation->hasError('sub_title')) {
            $data['error_input'][] = 'sub_title';
            $data['error_string'][] = $validation->getError('sub_title');
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

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');

        $req = $this->request->getPost();

        $table = 'slider';
        $fields = array(
            'title',
            'sub_title',
            'url',
            'image',
            'slider_id',
        );
        $get = $req;
        $orderBy = ['slider_id', 'ASC'];
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

    public function index()
    {
        $data = $this->data;
        $data['title'] = 'Pengaturan Slider Website';
        $this->view('backend', 'setting_slider/index', $data);
    }

    public function form()
    {
        $this->data['title'] = 'Tambah Slider Website';
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['title'] = 'Ubah Slider Website';
                $this->data['slider'] = $this->model->getSliderById($_GET['id']);
                if (!$this->data['slider']) {
                    $this->errorDataNotFound();
                    exit;
                }
            }
        }
        $this->view('backend', 'setting_slider/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate($this->request->getPost('method'));
        echo json_encode($this->model->saveDataSlider());
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteDataSlider()) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
