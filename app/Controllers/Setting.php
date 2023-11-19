<?php

namespace App\Controllers;

use App\Models\SettingModel;

class Setting extends MyController
{
    public function __construct()
    {

        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new SettingModel;
        $this->addStyleBackend(base_url('public/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyleBackend(base_url('public/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        $this->addScriptBackend(base_url('public/bower_components/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScriptBackend(base_url('public/bower_components/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScriptBackend(base_url('public/bower_components/bootbox/') . 'bootbox.min.js');
        $this->addScriptBackend(base_url('public/bower_components/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScriptBackend(base_url('public/bower_components/ckeditor/') . 'ckeditor.js');
    }

    public function index()
    {
        // echo "<pre>";
        // print_r($this->data['setting_aplikasi']);
        // echo "</pre>";
        // die;
        $this->view('backend', 'Setting/index', $this->data);
    }

    public function ajaxSaveSettingApp()
    {
        $response = $this->model->saveSettingApp();

        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
        }
    }

    public function ajaxSaveSettingLayout()
    {
        $response = $this->model->saveSettingLayout();

        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
        }
    }

    public function ajaxSaveSettingProfile()
    {
        $response = $this->model->saveSettingProfile();

        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
        }
    }
}
