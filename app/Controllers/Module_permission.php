<?php

namespace App\Controllers;

use App\Models\DataTableModel;
use App\Models\ModulePermissionModel;

class Module_permission extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new ModulePermissionModel;
        $this->addStyleBackend(base_url('public/backend/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyleBackend(base_url('public/backend/bower_components/select2/dist/css/') . 'select2.min.css');
        $this->addScriptBackend(base_url('public/backend/bower_components/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/bootbox/') . 'bootbox.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScriptBackend(base_url('public/backend/bower_components/select2/dist/js/') . 'select2.full.min.js');
        $this->addScriptBackend(base_url('public/backend/dist/js/pages/') . 'Module_permission.js');
    }

    public function ajaxGetData($module_id = null)
    {

        // $this->hasPermission('read_all');

        $req = $this->request->getPost();

        $table = 'module_permission';
        $fields = array(
            'module.module_id',
            'module.module',
            'module.nama_module',
            'module_permission.nama_permission',
            'module_permission.judul_permission',
            'module_permission.keterangan',
            'module_permission.module_permission_id',
        );
        $get = $req;
        $orderBy = ['module.module', 'asc'];
        $joins = [];
        $joins[] = ['module', 'module.module_id = module_permission.module_id', 'LEFT'];

        $whereOnlyBefore = [];
        $whereBefore = [];
        $whereInBefore = [];
        $whereNotInBefore = [];
        $filtersBefore = [];
        $filtersBefore[] = ['module.module_id', trim($req['module_id'] ?? null)];
        // --------------------------------------------- AllResults
        $whereOnlyAfter = [];
        $whereAfter = [];
        $whereInAfter = [];
        $whereNotInAfter = [];
        $filtersAfter = [];
        $filtersAfter[] = ['module.module_id', trim($module_id ?? null)];

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
        $this->data['module'] = $this->model->getModuleByModulePermission();
        $this->view('backend', 'Module_permission/index', $this->data);
    }

    public function ajaxGetForm()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['module_permission'] = $this->model->getModulePermissionById($_GET['id']);
                if (!$this->data['module_permission']) {
                    echo '<div class="alert alert-danger">Data module permission tidak ditemukan</div>';
                    exit;
                }
            }
        }

        $this->data['module'] = $this->model->getResultModulePermission();

        echo view('Module_permission/form', $this->data);
    }

    public function ajaxSaveData()
    {
        if ($this->model->saveDataModulePermission()) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteData('module_permission', 'module_permission_id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
